<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
            justify-content: center;
        }
        .card {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .card img {
            width: 100%;
            border-radius: 10px;
            cursor: pointer;
        }
        .card h2 {
            font-size: 1.5em;
            margin: 15px 0;
        }
        .card p {
            font-size: 1em;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <a href="https://azura.typicalmedia.net/dashboard" target="_blank">
                <img src="pages/images.html/auzuracast.jpg" alt="AuzuraCast">
            </a>
            <h2>AuzuraCast</h2>
            <p>Auzuracast for djs.</p>
        </div>
        <div class="card">
            <a href="https://mixxx.org/" target="_blank">
                <img src="pages/images.html/mixxlogo.png" alt="MIXX LOGO">
            </a>
            <h2>mixx</h2>
            <p>USED FOR LIVEBROADCASTS.</p>
        </div>
        <div class="card">
            <a href="" target="_blank">
                <img src="" alt="">
            </a>
            <h2>brand</h2>
            <p>descripton</p>
        </div>
        <div class="card">
            <a href="" target="_blank">
                <img src="" alt="">
            </a>
            <h2>title</h2>
            <p>descripton</p>
        </div>
    </div>
</body>
</html>';
?>
