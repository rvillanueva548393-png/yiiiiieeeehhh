<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forever</title>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; background: #000; overflow: hidden; color: white; font-family: 'Nunito', sans-serif; }
        canvas { position: absolute; top: 0; left: 0; }
        
        .content {
            position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
            text-align: center; z-index: 10; width: 90%; max-width: 600px;
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(5px);
            padding: 40px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.2);
        }
        h1 { font-family: 'Sacramento', cursive; font-size: 4rem; color: #ff4d88; margin: 0; text-shadow: 0 0 20px #ff4d88; }
        p { font-size: 1.2rem; line-height: 1.6; margin: 20px 0; color: #f1f2f6; }
        
        button {
            padding: 15px 40px; background: #ff4d88; color: white; border: none;
            border-radius: 50px; font-size: 1.2rem; cursor: pointer;
            box-shadow: 0 0 20px rgba(255, 77, 136, 0.5); animation: pulse 2s infinite;
        }
        @keyframes pulse { 0% {box-shadow: 0 0 0 0 rgba(255, 77, 136, 0.7);} 70% {box-shadow: 0 0 0 20px rgba(255, 77, 136, 0);} 100% {box-shadow: 0 0 0 0 rgba(255, 77, 136, 0);} }
        
        .final-msg { display: none; font-size: 2rem; color: #fff; text-shadow: 0 0 10px #ff4d88; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); z-index: 20; width: 100%;}
    </style>
</head>
<body>

<canvas id="canvas"></canvas>

<div class="content" id="card">
    <h1>It's Always You</h1>
    <p>
        I'm sorry for the mistakes, but I'm never sorry for loving you.<br>
        You are my Kamatis, my best friend, and my favorite person.<br>
        Let's leave the bad days behind and start fresh?
    </p>
    <button onclick="accept()">Let's Date Again? 💖</button>
</div>

<div class="final-msg" id="final">
    <h1>Thank you, Kamatis! <br> I love you! ❤️</h1>
</div>

<script>
    // Simple Firework Logic
    const canvas = document.getElementById('canvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    let particles = [];

    function accept() {
        document.getElementById('card').style.transition = 'opacity 1s';
        document.getElementById('card').style.opacity = '0';
        setTimeout(() => {
            document.getElementById('card').style.display = 'none';
            document.getElementById('final').style.display = 'block';
        }, 1000);
        
        // Launch intense fireworks
        setInterval(() => createFirework(Math.random() * canvas.width, Math.random() * canvas.height / 2), 200);
    }

    function createFirework(x, y) {
        const colors = ['#ff4d88', '#fffa65', '#65ff96', '#65d5ff', '#ffffff'];
        for (let i = 0; i < 30; i++) {
            particles.push({
                x: x, y: y,
                vx: (Math.random() - 0.5) * 10,
                vy: (Math.random() - 0.5) * 10,
                alpha: 1,
                color: colors[Math.floor(Math.random() * colors.length)]
            });
        }
    }

    function animate() {
        ctx.fillStyle = 'rgba(0, 0, 0, 0.1)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        particles.forEach((p, index) => {
            p.x += p.vx; p.y += p.vy; p.alpha -= 0.02;
            p.vy += 0.1; // gravity
            ctx.fillStyle = p.color;
            ctx.globalAlpha = p.alpha;
            ctx.beginPath();
            ctx.arc(p.x, p.y, 3, 0, Math.PI * 2);
            ctx.fill();
            if (p.alpha <= 0) particles.splice(index, 1);
        });
        requestAnimationFrame(animate);
    }
    animate();
</script>

</body>
</html>