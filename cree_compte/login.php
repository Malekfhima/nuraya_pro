<?php
session_start();

// Redirection si déjà connecté
if (isset($_SESSION['authenticated'])) {
    header("Location: index.php");
    exit();
}

// Vérification des données de session nécessaires
if (!isset($_SESSION['email'], $_SESSION['verification_code'], $_SESSION['code_expires'])) {
    $_SESSION['error'] = "Session invalide ou expirée";
    header("Location: index.php");
    exit();
}

// Vérification expiration du code (15 minutes)
if (time() > $_SESSION['code_expires']) {
    unset($_SESSION['verification_code']);
    $_SESSION['error'] = "Le code a expiré (valable 15 minutes)";
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification - Nuraya</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="verify-container">
        <h2>Vérification du code</h2>
        <p>Entrez le code envoyé à <?php echo htmlspecialchars($_SESSION['email']); ?></p>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <div class="time-remaining" id="countdown">
            <?php
            $remaining = $_SESSION['code_expires'] - time();
            $minutes = floor($remaining / 60);
            $seconds = $remaining % 60;
            echo "Temps restant : $minutes min $seconds sec";
            ?>
        </div>

        <form action="verify_code_handler.php" method="POST" id="verificationForm">
            <div class="form-group">
                <input type="text" name="verification_code" placeholder="Entrez le code à 6 chiffres" pattern="\d{6}"
                    maxlength="6" required title="Veuillez entrer le code reçu par email">
            </div>

            <button type="submit">Vérifier</button>
        </form>

        <div class="resend-link">
            <a href="resend_code.php">Renvoyer le code</a>
        </div>
    </div>

    <script>
        // Fonction pour mettre à jour le compte à rebours
        function updateCountdown() {
            const countdownElement = document.getElementById('countdown');
            const form = document.getElementById('verificationForm');
            let remaining = <?php echo $_SESSION['code_expires'] - time(); ?>;

            if (remaining <= 0) {
                countdownElement.textContent = "Le code a expiré";
                // Redirection immédiate lorsque le temps est écoulé
                window.location.href = "index.php?expired=1";
                return;
            }

            const minutes = Math.floor(remaining / 60);
            const seconds = remaining % 60;

            countdownElement.textContent = `Temps restant : ${minutes} min ${seconds} sec`;

            // Mise à jour toutes les secondes
            setTimeout(updateCountdown, 1000);
        }

        // Démarrer le compte à rebours au chargement de la page
        document.addEventListener('DOMContentLoaded', function () {
            updateCountdown();

            // Empêcher le formulaire de se soumettre si le temps est écoulé
            const form = document.getElementById('verificationForm');
            form.addEventListener('submit', function (e) {
                const remaining = <?php echo $_SESSION['code_expires'] - time(); ?>;
                if (remaining <= 0) {
                    e.preventDefault();
                    alert("Le code a expiré. Veuillez demander un nouveau code.");
                    window.location.href = "index.php?expired=1";
                }
            });
        });
    </script>
</body>

</html>