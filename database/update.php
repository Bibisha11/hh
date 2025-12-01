<!DOCTYPE html>
<html>

<head>
    <title>Update form</title>
    <style>
        .error {
            color: red;
            font-size: 11px;
        }
    </style>
</head>

<body>

<?php
require 'connect.php';

// Validate ID from GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid or missing user ID.");
}

$id = (int)$_GET['id'];
$name = $email = $password = $mobile = '';
$nameErr = $emailErr = $passwordErr = $mobileErr = '';

// Fetch existing data
$sql = "SELECT * FROM form WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("No record found for ID: $id");
}

$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$mobile = $row['mobile'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $mobile = trim($_POST['mobile']);

    // Validation
    if (empty($name)) {
        $nameErr = "Required";
    } elseif (strlen($name) < 2 || strlen($name) > 10) {
        $nameErr = "Name must be between 2 and 10 characters.";
    } elseif (!ctype_alpha($name)) {
        $nameErr = "Name must contain only letters.";
    }

    if (empty($email)) {
        $emailErr = "Required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    }

    if (empty($password)) {
        $passwordErr = "Required";
    }

    if (empty($mobile)) {
        $mobileErr = "Required";
    } elseif (!ctype_digit($mobile) || strlen($mobile) != 10) {
        $mobileErr = "Must be exactly 10 digits.";
    }

    // If no errors, update
    if (!$nameErr && !$emailErr && !$passwordErr && !$mobileErr) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE form SET name=?, email=?, password=?, mobile=? WHERE id=?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ssssi", $name, $email, $hashedPassword, $mobile, $id);

        if ($stmt->execute()) {
            header('Location: showdata.php');
            exit();
        } else {
            die("Update failed: " . $stmt->error);
        }
    }
}
?>
<div class="container">
    <form method="post">
        <table>
            <tr>
                <td><label>Name</label></td>
                <td>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" />
                    <span class="error">* <?php echo $nameErr; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td>
                    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" />
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td>
                    <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" />
                    <span class="error">* <?php echo $passwordErr; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Mobile</label></td>
                <td>
                    <input type="text" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>" />
                    <span class="error">* <?php echo $mobileErr; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
