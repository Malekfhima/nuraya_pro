
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Done</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <style>
        :root{
            --bg1:#0f1724;
            --bg2:#071032;
            --accent:#4ee1a0;
            --accent2:#6ad7ff;
            --muted:rgba(255,255,255,0.08);
            --glass: rgba(255,255,255,0.06);
            --text: #e6f3ff;
        }
        html,body{height:100%}
        body{
            margin:0;
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: radial-gradient(1200px 600px at 10% 10%, rgba(76,211,255,0.06), transparent),
                                    linear-gradient(180deg,var(--bg1),var(--bg2));
            color:var(--text);
            display:flex;
            align-items:center;
            justify-content:center;
            -webkit-font-smoothing:antialiased;
            text-rendering:optimizeLegibility;
        }

        .card{
            padding:36px;
            border-radius:18px;
            background: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.02));
            box-shadow: 0 10px 30px rgba(2,6,23,0.6), inset 0 1px 0 rgba(255,255,255,0.02);
            display:grid;
            grid-template-columns: 180px 1fr;
            gap:24px;
            align-items:center;
            backdrop-filter: blur(6px) saturate(120%);
            border: 1px solid rgba(255,255,255,0.03);
        }

        .visual{
            width:160px;
            height:160px;
            display:flex;
            align-items:center;
            justify-content:center;
            position:relative;
            margin:auto;
        }

        /* circle & check */
        svg { width:140px; height:140px; display:block; }
        .circle {
            stroke: rgba(255,255,255,0.08);
            stroke-width:10;
            fill:none;
        }
        .ring {
            stroke: url(#g);
            stroke-width:10;
            fill:none;
            filter: drop-shadow(0 6px 18px rgba(20,255,180,0.12));
            stroke-linecap:round;
            stroke-linejoin:round;
            stroke-dasharray: 440;
            stroke-dashoffset: 440;
            animation: drawRing 1s forwards cubic-bezier(.2,.9,.2,1) 0.15s;
        }
        .check {
            stroke: white;
            stroke-width:10;
            fill:none;
            stroke-linecap:round;
            stroke-linejoin:round;
            stroke-dasharray: 80;
            stroke-dashoffset: 80;
            animation: drawCheck 0.6s forwards cubic-bezier(.2,.9,.2,1) 0.95s;
        }

        @keyframes drawRing {
            to { stroke-dashoffset: 0; }
        }
        @keyframes drawCheck {
            0% { stroke-dashoffset: 80; transform: translateY(0); }
            60% { transform: translateY(6px); }
            100% { stroke-dashoffset: 0; transform: translateY(0); }
        }

        /* subtle bounce and glow */
        .visual::after{
            content:"";
            position:absolute;
            width:220px;height:220px;
            border-radius:50%;
            background: radial-gradient(circle at 30% 20%, rgba(78,225,160,0.08), transparent 30%),
                                    radial-gradient(circle at 70% 80%, rgba(106,215,255,0.06), transparent 30%);
            filter: blur(18px);
            z-index:-1;
            transform: scale(0.92);
            opacity:0;
            animation: popGlow .9s ease forwards .6s;
        }
        @keyframes popGlow {
            to { opacity:1; transform: scale(1); }
        }

        /* confetti */
        .confetti {
            position:absolute;
            pointer-events:none;
            inset:0;
            overflow:visible;
        }
        .confetti span {
            position:absolute;
            width:10px;height:14px;
            border-radius:2px;
            transform-origin:center;
            opacity:0;
            will-change: transform, opacity;
            animation: fall 1.6s cubic-bezier(.2,.85,.2,1) forwards;
        }
        @keyframes fall {
            0% { transform: translateY(-20vh) rotate(0) scale(1); opacity:0; }
            12% { opacity:1; }
            60% { transform: translateY(40vh) rotate(720deg) scale(1.05); }
            100% { transform: translateY(70vh) rotate(1080deg) scale(0.9); opacity:0; }
        }

        /* content */
        .info h1{
            margin:0 0 6px 0;
            font-size:28px;
            letter-spacing:-0.02em;
        }
        .info p{
            margin:0 0 18px 0;
            color: rgba(230,243,255,0.82);
            opacity:0.9;
        }
        .actions{
            display:flex;
            gap:10px;
            align-items:center;
        }
        .btn{
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:10px 16px;
            border-radius:10px;
            border: none;
            cursor:pointer;
            font-weight:600;
            color: #052027;
            background: linear-gradient(90deg,var(--accent),var(--accent2));
            box-shadow: 0 6px 18px rgba(78,225,160,0.14);
            text-decoration:none;
        }
        .muted{
            background:transparent;
            color:rgba(230,243,255,0.86);
            padding:8px 12px;
            border-radius:8px;
            border:1px solid rgba(255,255,255,0.03);
            cursor:pointer;
        }

        /* small responsive */
        @media (max-width:600px){
            .card{ grid-template-columns: 1fr; padding:20px; gap:16px; }
            .visual{ width:120px; height:120px; }
            svg{ width:110px; height:110px; }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="visual" aria-hidden="true">
            <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Success">
                <defs>
                    <linearGradient id="g" x1="0" x2="1">
                        <stop offset="0" stop-color="#4EE1A0"/>
                        <stop offset="1" stop-color="#6AD7FF"/>
                    </linearGradient>
                </defs>
                <circle class="circle" cx="60" cy="60" r="52"/>
                <circle class="ring" cx="60" cy="60" r="52" stroke-linecap="round"/>
                <path class="check" d="M40 62 L54 76 L82 46" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <div class="confetti" id="confetti"></div>
        </div>
        <div class="info">
            <h1>Order Confirmed!</h1>
            <p>Thank you for your purchase. Your order has been successfully placed and will be processed shortly.</p>
            <div class="actions">
                <a href="../index.html" class="btn">Back to Store</a>
            </div>
        </div>
    </div>

    <script>
        // Confetti generator - lightweight and self-contained
        (function(){
            const container = document.getElementById('confetti');
            const colors = ['#FF7A7A','#FFD36A','#4EE1A0','#6AD7FF','#C285FF'];
            const pieces = 18;
            for(let i=0;i<pieces;i++){
                const el = document.createElement('span');
                const w = 8 + Math.random()*8;
                el.style.width = w + 'px';
                el.style.height = (10 + Math.random()*10) + 'px';
                el.style.left = (30 + Math.random()*100) + '%';
                el.style.top = (10 + Math.random()*10) + '%';
                el.style.background = colors[Math.floor(Math.random()*colors.length)];
                el.style.transform = 'rotate('+ (Math.random()*360) +'deg)';
                el.style.borderRadius = (Math.random()>0.6? '50%':'2px');
                el.style.animationDelay = (Math.random()*0.6 + 0.05) + 's';
                el.style.opacity = 0;
                el.style.boxShadow = '0 2px 6px rgba(2,6,23,0.18)';
                container.appendChild(el);
            }

            // small pulse on done to draw attention
            const ring = document.querySelector('.ring');
            ring.addEventListener('animationend', function(){
                ring.animate([
                    { transform: 'scale(1)', opacity:1 },
                    { transform: 'scale(1.06)', opacity:0.98 },
                    { transform: 'scale(1)', opacity:1 }
                ], { duration: 420, easing: 'ease-out' });
            });

            // focus for keyboard users
            window.addEventListener('load', ()=> {
                const btn = document.querySelector('.btn');
                if(btn) btn.focus();
            });
        })();
    </script>
</body>
</html>