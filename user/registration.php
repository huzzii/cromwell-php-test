<!DOCTYPE html>
<html>

<head>

    <title>User Registration</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <div class="container">
        <h2>User Registration</h2>
        <div id="message"></div>
        <form id="registrationForm">
            <div class="form-group">
                <label>Forenames</label>
                <input type="text" name="forenames" required>
            </div>
            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" required>
            </div>
            <div class="form-group">
                <label>Title</label>
                <select name="title">
                    <option value="">Select</option>
                    <option>Mr</option>
                    <option>Mrs</option>
                    <option>Miss</option>
                    <option>Ms</option>
                    <option>Dr</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label>Mobile Phone</label>
                <input type="text" name="mobile_phone" required>
            </div>
            <div class="form-group">
                <label>Other Phone</label>
                <input type="text" name="other_phone">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" required>
            </div>
            <button type="submit">
                Register
            </button>
        </form>
        <br>
        <div class="text-center">
            Already Registered?
            <a href="login.php">
                Login
            </a>
        </div>
    </div>
    <script src="../assets/js/registration.js"></script>
</body>
</html>