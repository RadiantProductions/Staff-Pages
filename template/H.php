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
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <div class="user-info">
            Hello, User
            <div class="dropdown">
                <a href="/Manage/profile.php">Profile Settings</a>
                <a href="logout.php" onclick="confirm('Are you sure you want to log out?')">Log Out</a>
            </div>
        </div>
    </header>
</body>
</html>

