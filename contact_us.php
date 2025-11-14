<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--accent:#667eea;--accent2:#764ba2}
        body{font-family:'Montserrat',sans-serif;margin:0;background:linear-gradient(180deg,#f5f7ff 0%, #eef2ff 100%)}
        .page-wrap{max-width:1100px;margin:36px auto;padding:20px}
        .contact-card{background:white;border-radius:12px;padding:24px;box-shadow:0 10px 30px rgba(15,23,42,0.06);display:grid;grid-template-columns:1fr 360px;gap:24px;align-items:start}
        .hero{margin-bottom:18px}
        h1{font-size:24px;margin:0 0 8px;color:#0f1724}
        p.lead{margin:0 0 18px;color:#374151}

        /* Form */
        form .field{margin-bottom:12px}
        label{display:block;font-weight:600;color:#334155;margin-bottom:6px}
        input[type="text"],input[type="email"],input[type="tel"],textarea{width:100%;padding:12px;border:1px solid #e6e9ef;border-radius:8px;font-size:14px}
        textarea{min-height:120px;resize:vertical}
        .btn-submit{background:linear-gradient(90deg,var(--accent),var(--accent2));color:white;padding:12px 18px;border-radius:10px;border:none;font-weight:700;cursor:pointer}

        /* Aside */
        .contact-aside{background:linear-gradient(180deg,#fbfcff,#f8fafc);padding:18px;border-radius:10px;border:1px solid #eef2ff}
        .contact-item{display:flex;gap:12px;align-items:flex-start;margin-bottom:14px}
        .contact-item i{font-size:20px;color:var(--accent);min-width:26px}
        .contact-item div{color:#334155}

        /* Responsive */
        @media (max-width:900px){.contact-card{grid-template-columns:1fr;}.page-wrap{padding:16px}}
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="page-wrap">
        <div class="hero">
            <h1>Contactez-nous</h1>
            <p class="lead">Vous avez une question ? Envoyez-nous un message — nous vous répondrons rapidement.</p>
        </div>

        <div class="contact-card">
            <div>
                <form method="POST" action="send.php">
                    <div class="field">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="field">
                        <label for="phone">Téléphone</label>
                        <input type="tel" name="phone" id="phone">
                    </div>
                    <div class="field">
                        <label for="comment">Message</label>
                        <textarea name="comment" id="comment" required></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn-submit">Envoyer le message</button>
                    </div>
                </form>
            </div>

            <aside class="contact-aside">
                <div style="margin-bottom:12px">
                    <strong>Informations</strong>
                    <div style="color:#6b7280;font-size:14px;margin-top:6px">Nous sommes disponibles du lundi au vendredi de 9h à 18h. Réponse généralement sous 24 heures.</div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <div style="font-weight:700">Adresse</div>
                        <div style="font-size:13px;color:#6b7280">123 Rue Exemple, Ville, Pays</div>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <div style="font-weight:700">Téléphone</div>
                        <div style="font-size:13px;color:#6b7280">+216 00 000 000</div>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <div style="font-weight:700">Email</div>
                        <div style="font-size:13px;color:#6b7280">support@nuraya.example</div>
                    </div>
                </div>

                <div style="margin-top:18px;font-size:13px;color:#6b7280">Suivez-nous sur les réseaux pour les dernières nouveautés.</div>
            </aside>
        </div>
    </div>
</body>
</html>
