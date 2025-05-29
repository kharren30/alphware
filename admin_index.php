<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AlphaWare</title>
    <link rel="icon" href="img/logo.jpg" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
        }

        /* Header */
        #header {
            display: flex;
            align-items: center;
            padding: 15px 30px;
            background-color: #007bff;
            color: white;
        }

        #header img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        #header label {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Admin Login Form */
        #admin {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        form.well {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form legend {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="header">
        <img src="../img/logo.jpg" alt="Logo">
        <label>AlphaWare</label>
    </div>

    <?php include('../function/admin_login.php'); ?>

    <div id="admin">
        <form method="post" class="well">
            <center>
                <legend>Administrator</legend>
                <table>
                    <tr><td><input type="text" name="username" placeholder="Username"></td></tr>
                    <tr><td><input type="password" name="password" placeholder="Password"></td></tr>
                    <tr><td><input type="submit" name="enter" value="Enter" class="btn btn-primary"></td></tr>
                </table>
            </center>
        </form>
    </div>
</body>
</html>
