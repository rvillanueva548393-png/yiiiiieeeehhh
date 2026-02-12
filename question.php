<?php
if (isset($_POST['yes'])) {
    header("Location: us.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please? 🥺</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Sacramento&display=swap" rel="stylesheet">
    <style>
        /* Keeping your style but softening the white box */
        body {
            margin: 0; height: 100vh; display: flex;
            justify-content: center; align-items: center;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            font-family: 'Nunito', sans-serif; overflow: hidden;
        }
        .container {
            text-align: center; position: relative; z-index: 10;
        }
        .gif-container img { width: 180px; border-radius: 15px; margin-bottom: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        h1 { font-family: 'Sacramento', cursive; font-size: 3rem; color: #ff4d88; margin-bottom: 30px; }
        
        .buttons { display: flex; gap: 20px; justify-content: center; }
        button {
            padding: 15px 30px; font-size: 18px; border: none; border-radius: 50px;
            cursor: pointer; font-weight: bold; transition: all 0.3s ease;
        }
        .yes { background: #ff4757; color: white; box-shadow: 0 5px 15px rgba(255, 71, 87, 0.4); }
        .yes:hover { transform: scale(1.1); }
        .no { background: #ced6e0; color: #2f3542; position: relative; }
        
        /* Floating hearts in background */
        .bg-hearts { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
    </style>
</head>
<body>

<div class="container">
    <div class="gif-container">
        <img src="tomato.jpeg" alt="Cute Tomato"> 
    </div>

    <h1 id="mainText">Can we start over? Will you be my Valentine?</h1>

    <form method="post">
        <div class="buttons">
            <button class="yes" name="yes" type="submit">Yes, let's fix this 💖</button>
            <button class="no" type="button" id="noBtn">No</button>
        </div>
    </form>
</div>

<script>
    const noBtn = document.getElementById("noBtn");
    const yesBtn = document.querySelector(".yes");
    const mainText = document.getElementById("mainText");

    // The "Win Her Back" text sequence
    const texts = [
        "No? 😢",
        "Are you sure?",
        "But I miss you...",
        "Don't do this to me",
        "I'm really sorry",
        "Please forgive me",
        "Give me a chance",
        "Just one date?",
        "Have a heart 💔",
        "Kamatis please...",
        "I won't stop asking",
        "Okay, I'm crying now 😭"
    ];
    
    let count = 0;

    function dodge() {
        // Move the button
        const x = Math.random() * (window.innerWidth - 200);
        const y = Math.random() * (window.innerHeight - 100);
        noBtn.style.position = "absolute";
        noBtn.style.left = x + "px";
        noBtn.style.top = y + "px";

        // Change text
        if (count < texts.length) {
            noBtn.innerText = texts[count];
            count++;
        } else {
            noBtn.innerText = "Okay fine, YES na! 🥺";
            // Eventually make it unclickable or super fast
        }

        // Make the YES button bigger every time she tries to say no
        const currentSize = 1 + (count * 0.1);
        yesBtn.style.transform = `scale(${currentSize})`;
    }

    noBtn.addEventListener("mouseover", dodge);
    noBtn.addEventListener("click", dodge);
</script>

</body>
</html>