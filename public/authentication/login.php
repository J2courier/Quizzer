<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <!-- For Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- For Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="dark">
    <main>
        <section class="card-container">
            <form action="login.php" method="post">
                <div class="welcome-txt">
                    <h1>WELCOME USER</h1>
                </div>
                <div class="username-ctnr">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="example2201" autocomplete="username" required>
                </div>
                <div class="password-ctnr">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="********" autocomplete="current-password" required>
                </div>
               
                <button type="submit" name="loginBtn">LOGIN</button>
                <a href="signup.php" class="signup-btn">SIGNUP</a>
            </form>
        </section>
    </main>
    <script src="showpass.js"></script>
</body>
</html>

<?php
include "DatabaseConnection.php";
if (isset($_POST["loginBtn"])){
    //initialize the inputs
    $username = $_POST["username"];
    $password = $_POST["password"];
    //verify the username and password if existing
    $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    //for security purposes we need to bind the parameter
    $stmt->bind_param("ss", $username, $password);
    //then execute it
    $stmt->execute();
    $result = $stmt->get_result();
    // session_start();
    // $_SESSION['username'] = $username;
    // $_SESSION['password'] = $password;
    // header("Location: ../index.php");

    // validate the result of query if there is a match in accounts then redirect to index.php which is the dashboard
    if($result->num_rows > 0){
        session_start();//this is a built in function for starting a session
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: ../index.php");
    } else {
        echo"Invalid";
    }
    
}

?>
