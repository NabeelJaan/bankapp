<?php
include 'helper.php';
require_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $user->email = htmlspecialchars($_POST['email']);
    $user->password = htmlspecialchars($_POST['password']);

    $result = $user->login();
    // echo "<pre>";
    // print_r($result);
    // die;
    if (is_array($result) && isset($result['id'])) {
        
        header("Location: home.php");
        exit();
    } else {
        echo "Email or password is not correct!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bank</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <section>
        <div class="main">
            <h1 style="text-align: center;">AC Bank</h1>
            <div class="login-container">
                <h2>Login to your account</h2>
                <form method="POST" action="" style="text-align: left;">
                    <label class="label-l" for="email">Email address</label>
                    <input type="email" name="email" placeholder="Enter email" required>

                    <label class="label-l" for="Password">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                    <div>
                        <input type="checkbox" id="remember-me">
                        <label class="label-l" for="remember-me">Remember me</label>
                    </div>
                    <button type="submit">Sign in</button>
                </form>
            </div>
            <div class="signup">
                <p style="text-align: center; margin-top: 32px;">Don't have an account yet? <a href="<?php echo generateLink('register.php'); ?>">Sign up</a></p>
            </div>
        </div>
    </section>
</body>

</html>