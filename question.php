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
    <title>Question Time! 🤨</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Sacramento&display=swap" rel="stylesheet">
    <style>
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
        h1 { font-family: 'Nunito', sans-serif; font-size: 2.2rem; color: #0984e3; margin-bottom: 30px; font-weight: bold;}
        
        .buttons { display: flex; gap: 20px; justify-content: center; }
        button {
            padding: 15px 30px; font-size: 18px; border: none; border-radius: 50px;
            cursor: pointer; font-weight: bold; transition: all 0.3s ease;
        }
        .yes { background: #00b894; color: white; box-shadow: 0 5px 15px rgba(0, 184, 148, 0.4); }
        .yes:hover { transform: scale(1.1); }
        .no { background: #ff7675; color: white; position: relative; }
        
    </style>
</head>
<body>

<div class="container">
    <div class="gif-container">
        <img src="babuy.jpg" alt="Funny pic"> 
    </div>

    <h1 id="mainText">Before you see your gift...<br>Admit it, am I your favorite sibling? 😎</h1>

    <form method="post">
        <div class="buttons">
            <button class="yes" name="yes" type="submit">Yes, obviously! 🙄</button>
            <button class="no" type="button" id="noBtn">No way</button>
        </div>
    </form>
</div>

<script>
    const noBtn = document.getElementById("noBtn");
    const yesBtn = document.querySelector(".yes");
    const mainText = document.getElementById("mainText");

    const texts = [
        "Lies! 🤨",
        "Admit it!",
        "I'm telling Mom",
        "Just click yes!",
        "You know I am",
        "Fine, no gift for you!",
        "Ate please 😂",
        "I'll eat your cake!",
        "Click YES na!"
    ];
    
    let count = 0;

    function dodge() {
        const x = Math.random() * (window.innerWidth - 200);
        const y = Math.random() * (window.innerHeight - 100);
        noBtn.style.position = "absolute";
        noBtn.style.left = x + "px";
        noBtn.style.top = y + "px";

        if (count < texts.length) {
            noBtn.innerText = texts[count];
            count++;
        } else {
            noBtn.innerText = "Fine, you win! 😆";
        }

        const currentSize = 1 + (count * 0.1);
        yesBtn.style.transform = `scale(${currentSize})`;
    }

    noBtn.addEventListener("mouseover", dodge);
    noBtn.addEventListener("click", dodge);
</script>

</body>
</html>