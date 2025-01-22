<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #000;
            color: #fff;
            font-size: 16px;
            line-height: 1.5;
        }

        header {
            background-color: #111;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #444;
            position: relative;
        }

        header h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .user-info {
            font-size: 14px;
            position: relative;
            cursor: pointer;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 20px;
            background-color: #222;
            border: 1px solid #444;
            border-radius: 8px;
            overflow: hidden;
            width: 150px;
        }

        .dropdown a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            text-align: center;
        }

        .dropdown a:hover {
            background-color: #333;
        }

        .user-info:hover .dropdown {
            display: block;
        }

        .container {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #222;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            background-color: #333;
        }

        .card img {
            max-width: 50px;
            margin-bottom: 10px;
        }

        .card p {
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <div class="user-info">
            Hello, User
            <div class="dropdown">
                <a href="#">Profile Settings</a>
                <a href="#" onclick="confirm('Are you sure you want to log out?')">Log Out</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="grid">
            <div class="card">
                <img src="https://via.placeholder.com/50" alt="Icon">
                <p>Domain Setup</p>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/50" alt="Icon">
                <p>Subdomain Management</p>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/50" alt="Icon">
                <p>DNS Management</p>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/50" alt="Icon">
                <p>FTP Management</p>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/50" alt="Icon">
                <p>MySQL Management</p>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/50" alt="Icon">
                <p>Site Redirection</p>
            </div>
        </div>
    </div>
</body>
</html>
