<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday Ate! 🎉</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&family=Nunito:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* --- BACKGROUND & LAYOUT --- */
        body {
            margin: 0;
            padding: 0;
            /* Soft, dreamy gradient */
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Nunito', sans-serif;
            overflow: hidden;
        }

        /* --- MUSIC BUTTON (The Safety Net) --- */
        .music-control {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: white;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
            color: #0984e3;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: 0.3s;
            border: 2px solid #0984e3;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .music-control:hover { transform: scale(1.1); }

        /* --- ENVELOPE STYLES --- */
        .envelope-wrapper {
            position: relative;
            cursor: pointer;
            transition: transform 0.3s;
            animation: float 3s ease-in-out infinite;
        }
        .envelope-wrapper:hover { transform: scale(1.05); }

        .envelope {
            width: 300px;
            height: 200px;
            background: #0984e3;
            position: relative;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 20;
        }

        /* The Triangle Flap */
        .flap {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            border-left: 150px solid transparent;
            border-right: 150px solid transparent;
            border-top: 110px solid #74b9ff; 
            transform-origin: top;
            transition: 0.6s;
            z-index: 30;
        }
        
        /* Animation class for opening */
        .envelope.open .flap {
            transform: rotateX(180deg);
            z-index: 10;
        }

        .pocket {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border-left: 150px solid #005f73;
            border-right: 150px solid #0a3d62;
            border-top: 100px solid transparent;
            border-radius: 0 0 10px 10px;
            z-index: 25;
        }

        .heart-seal {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px;
            transition: 0.3s;
            z-index: 40;
            text-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .envelope.open .heart-seal { opacity: 0; }

        .click-text {
            color: #333;
            margin-top: 30px;
            font-weight: bold;
            font-size: 1.2rem;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
            text-align: center;
        }

        /* --- THE LETTER CARD --- */
        .card {
            display: none;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            width: 85%;
            max-width: 450px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            position: relative;
            z-index: 50;
        }

        /* Animation for card appearing */
        .card.pop-up {
            animation: slideUp 1s ease forwards;
            display: block;
        }

        @keyframes float { 0%,100% {transform:translateY(0);} 50% {transform:translateY(-10px);} }
        @keyframes slideUp { from {opacity:0; transform:translateY(50px);} to {opacity:1; transform:translateY(0);} }
        
        h1 {
            font-family: 'Sacramento', cursive;
            color: #0984e3;
            font-size: 2.8rem;
            margin: 0 0 10px 0;
        }
        
        p {
            color: #555;
            line-height: 1.6;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        
        button {
            padding: 12px 30px;
            border: none;
            background: #0984e3;
            color: white;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(9, 132, 227, 0.3);
        }
        button:hover { background: #74b9ff; transform: scale(1.05); }

    </style>
</head>
<body>

    <audio id="bgMusic" loop>
        <source src="music.mp3" type="audio/mpeg">
    </audio>

    <div class="music-control" onclick="toggleMusic()">
        🎵 Play Music
    </div>

    <div class="envelope-wrapper" id="envelopeWrapper" onclick="openLetter()">
        <div class="envelope" id="envelope">
            <div class="flap"></div>
            <div class="pocket"></div>
            <div class="heart-seal">🎂</div>
        </div>
        <div class="click-text">For my favorite Ate... <br>(Tap to Open)</div>
    </div>

    <div class="card" id="mainCard">
        <h1>Happy Birthday!</h1>
        <p>
            Hi Ate,<br><br>
            Another year older, another year wiser (hopefully)! 😂<br>
            I may not say it often, but thank you for being the best sister.<br><br>
            I made this little surprise just for you! Ready?
        </p>
        <a href="question.php"><button>Let's go! 🎁</button></a>
    </div>

    <script>
        function openLetter() {
            var music = document.getElementById('bgMusic');
            var btn = document.querySelector('.music-control');
            
            var playPromise = music.play();
            
            if (playPromise !== undefined) {
                playPromise.then(_ => {
                    music.volume = 0.5;
                    btn.innerHTML = "⏸️ Pause Music";
                })
                .catch(error => {
                    console.log("Auto-play blocked. User must click the music button.");
                });
            }

            const envelope = document.getElementById('envelope');
            const wrapper = document.getElementById('envelopeWrapper');
            const card = document.getElementById('mainCard');
            
            envelope.classList.add('open');
            
            setTimeout(() => {
                wrapper.style.display = 'none';
                card.classList.add('pop-up');
            }, 800);
        }

        function toggleMusic() {
            var music = document.getElementById('bgMusic');
            var btn = document.querySelector('.music-control');
            
            if (music.paused) {
                music.play();
                btn.innerHTML = "⏸️ Pause Music";
            } else {
                music.pause();
                btn.innerHTML = "🎵 Play Music";
            }
        }
    </script>
</body>
</html>