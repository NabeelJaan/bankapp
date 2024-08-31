<?php
require_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $user->name = htmlspecialchars($_POST['name']);
    $user->email = htmlspecialchars($_POST['email']);
    $user->password = htmlspecialchars($_POST['password']);

    if ($user->register()) {
        echo "Registration successful! Please check your email for verification.";
    } else {
        echo "Registration failed.";
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
    <section class="main">
        <div class="signup-container">
            <h2>Create new account</h2>
            <form method="POST" action="">
                <label class="label-l" for="name">Name</label>
                <input type="text" id="name" placeholder="Enter name" name="name" required>

                <label class="label-l" for="email">Email address</label>
                <input type="email" id="email" placeholder="Enter email" name="email" required>

                <label class="label-l" for="password">Password</label>
                <input type="password" id="password" placeholder="Password" name="password" required>

                <div class="terms">
                    <input type="checkbox" id="terms">
                    <label class="" for="terms">Agree the <a href="#">terms and policy</a></label>
                </div>

                <button type="submit">Create new account</button>
            </form>
            <div class="signin">
                <p>Already have an account? <a href="<?php echo generateLink('index.php'); ?>">Sign in</a></p>
            </div>
        </div>
    </section>
</body>

</html>