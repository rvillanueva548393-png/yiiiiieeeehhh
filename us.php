<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sister Memories</title>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #ffeaa7;
            font-family: 'Nunito', sans-serif;
            min-height: 100vh; padding: 40px 0;
            background-image: radial-gradient(#fdcb6e 1px, transparent 1px);
            background-size: 20px 20px;
        }
        h1 {
            text-align: center; font-family: 'Sacramento', cursive;
            font-size: 4rem; color: #d63031; margin-bottom: 40px;
            text-shadow: 2px 2px 0px rgba(255,255,255,0.5);
        }
        .gallery {
            display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;
            max-width: 1200px; margin: 0 auto;
        }
        .polaroid {
            background: white; padding: 15px 15px 50px 15px;
            box-shadow: 5px 10px 15px rgba(0,0,0,0.1);
            transform: rotate(-2deg); transition: 0.3s;
            cursor: pointer; position: relative;
        }
        .polaroid:nth-child(even) { transform: rotate(2deg); }
        .polaroid:hover { transform: scale(1.1) rotate(0deg); z-index: 10; box-shadow: 0 15px 30px rgba(0,0,0,0.2); }
        
        .polaroid img {
            width: 220px; height: 220px; object-fit: cover;
            border: 1px solid #eee;
        }
        .caption {
            position: absolute; bottom: 10px; width: 100%; text-align: center;
            font-family: 'Sacramento', cursive; color: #636e72; font-size: 1.6rem;
            left: 0;
        }
        .next-btn {
            display: block; margin: 50px auto; padding: 15px 50px;
            background: #e17055; color: white; font-size: 1.2rem; border: none;
            border-radius: 30px; cursor: pointer; box-shadow: 0 5px 15px rgba(225, 112, 85, 0.4);
            transition: 0.3s;
        }
        .next-btn:hover { transform: scale(1.05); background: #d63031; }
        
        /* Overlay */
        .overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.85); display: none;
            justify-content: center; align-items: center; flex-direction: column; z-index: 100;
        }
        .overlay img { max-width: 90%; max-height: 60vh; border: 10px solid white; border-radius: 5px; }
        .overlay-msg {
            color: white; font-family: 'Nunito', sans-serif; margin-top: 20px;
            font-size: 1.5rem; text-align: center; max-width: 80%;
        }
    </style>
</head>
<body>

    <h1>Best Sister Ever</h1>

    <div class="gallery">
        <div class="polaroid" onclick="show(this, 'Throwback to this fun day!')">
            <img src="pic1.jpg" alt="Memory">
            <div class="caption">Good Times</div>
        </div>
        
        <div class="polaroid" onclick="show(this, 'You looking older every year! Jk 😂')">
            <img src="pic2.jpg" alt="Memory">
            <div class="caption">Getting Old</div>
        </div>
        
        <div class="polaroid" onclick="show(this, 'Always stealing...')">
            <img src="pic3.jpg" alt="Memory">
            <div class="caption">The Thief</div>
        </div>

        <div class="polaroid" onclick="show(this, 'But seriously, thank you for always being there for me.')">
            <img src="pic4.jfif" alt="Memory">
            <div class="caption">Support System</div>
        </div>

        <div class="polaroid" onclick="show(this, 'Love you, Ate! Have the best birthday today!')">
            <img src="pic5.jfif" alt="Memory">
            <div class="caption">Happy Bday!</div>
        </div>
    </div>

    <button class="next-btn" onclick="location.href='forever.php'">
        One Last Surprise... 👉
    </button>

    <div class="overlay" id="overlay" onclick="this.style.display='none'">
        <img id="bigImg">
        <div class="overlay-msg" id="bigMsg"></div>
        <small style="color:#ccc; margin-top:10px;">(Tap to close)</small>
    </div>

    <script>
        function show(el, msg) {
            const src = el.querySelector('img').src;
            document.getElementById('bigImg').src = src;
            document.getElementById('bigMsg').innerText = msg;
            document.getElementById('overlay').style.display = 'flex';
        }
    </script>
</body>
</html>