
    <style>
        .header {
            background-color: #123456; /* Blue color */
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .sidebar {
            width: 250px;
            background-color: #123456; /* Blue color */
            color: white;
            height: 100%;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            margin: 0 20px;
            font-size: 24px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #0056b3; /* Darker blue for hover */
            color: white;
        }
        .dropdown {
            position: relative;
        }
        .dropdown-content {
            display: none;
            background-color: #0056b3; /* Darker blue for dropdown */
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            color: white;
            padding: 10px 20px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Radiant Radios Dashboard</h1>
    </div>
    <div class="main-container">
        <div class="sidebar">
            <div>
                <a href="dashboard.php">Dashboard</a>
                <a href="https://www.radiantradios.xyz">Radio</a>
                <a href="#">Payroll</a>
                <a href="#">Invoices</a>
                <a href="#">Documents</a>
            </div>
            <div class="dropdown">
                <a>Settings</a>
                <div class="dropdown-content">
                    <a href="#">Profile Settings</a>
                    <a href="#">Account Settings</a>
                    <a href="logout.php" onclick="return confirmLogout();">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
