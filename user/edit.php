<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Profile</h2>
        <div id="message"></div>
        <form id="editForm">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label>Forenames</label>
                <input type="text" name="forenames" id="forenames" required>
            </div>

            <div class="form-group">
                <label>Surname</label>
                <input type="text" name="surname" id="surname" required>
            </div>

            <div class="form-group">
                <label>Title</label>
                <select name="title" id="title">
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
                <input type="date" name="date_of_birth" id="date_of_birth" required>
            </div>

            <div class="form-group">
                <label>Mobile Phone</label>
                <input type="text" name="mobile_phone" id="mobile_phone" required>
            </div>

            <div class="form-group">
                <label>Other Phone</label>
                <input type="text" name="other_phone" id="other_phone">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" readonly>
            </div>

            <button type="submit">
                Update Profile
            </button>
        </form>
    </div>
    <script src="../assets/js/edit.js"></script>
</body>
</html>