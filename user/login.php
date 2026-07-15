<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <div id="message"></div>
        <form id="loginForm">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">
                Login
            </button>
        </form>
        <br>

        <div class="text-center">
            Don't have an account?
            <a href="registration.php">
                Register
            </a>
        </div>
    </div>
    <script src="../assets/js/login.js"></script>
</body>
</html>