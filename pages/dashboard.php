<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radiant Radios | Dashboard</title>
     <link rel="icon" href="https://us-east-1.tixte.net/uploads/cdn.radiantradios.xyz/smallLOGO.png" type="images/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: white;
            background-color: black;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        
        .main-container {
            display: flex;
            flex: 1;
        }
        
      
        .content {
            flex: 1;
            padding: 20px;
        }
        .profile {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .profile img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }
     .greeting {
    position: absolute;
    padding: 10px;
    color: white;
}
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
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to logout?");
        }
    </script>
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
                <a href="invoices.php">Invoices</a>
                <a href="documents.php">Documents</a>
            </div>
            <div class="dropdown">
                <a>Settings</a>
                <div class="dropdown-content">
                    <a href="profile.php">Profile Settings</a>
                    <a href="admin.php">Admin</a>
                    <a href="logout.php" onclick="return confirmLogout();">Logout</a>
                </div>
            </div>
        </div>
    </div>
   
        <div class="content">
            <div class="profile">
                <img src="https://us-east-1.tixte.net/uploads/cdn.radiantradios.xyz/smallLOGO.png" alt="Profile Picture">
                <div>
                    <p class="greeting">Hi, Radiant Radios</p>
                    <p>Radiant Radios OWner</p>
                    

                </div>
            </div>
        </div>
    </div>
</body>
</html>
