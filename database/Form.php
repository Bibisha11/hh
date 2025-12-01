<!DOCTYPE html>
<html>
<head>
    <title>form.php</title>
    <style>
        .error {
            color: red;
            font-size: 11px;
        }
    </style>
</head>

<body>

<?php
$name = $email = $password = $mobile = '';
$nameErr = $emailErr = $passwordErr = $mobileErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $mobile = trim($_POST['mobile']);

    // Validate name
    if (empty($name)) {
        $nameErr = "Required";
    } elseif (strlen($name) < 2 || strlen($name) > 10) {
        $nameErr = "Name must be between 2 and 10 characters.";
    } elseif (!ctype_alpha($name)) {
        $nameErr = "Name must contain only letters.";
    }

    // Validate email
    if (empty($email)) {
        $emailErr = "Required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    }

    // Validate password
    if (empty($password)) {
        $passwordErr = "Required";
    }

    // Validate mobile
    if (empty($mobile)) {
        $mobileErr = "Required";
    } elseif (!ctype_digit($mobile)) {
        $mobileErr = "Mobile must contain only numbers.";
    } elseif (strlen($mobile) != 10) {
        $mobileErr = "Mobile must be exactly 10 digits.";
    }

    // If all validation is OK
    if ($nameErr == '' && $emailErr == '' && $passwordErr == '' && $mobileErr == '') {

        include 'connect.php';

        // Check duplicate name
        $stmtCheck = $conn->prepare("SELECT * FROM form WHERE name = ?");
        if (!$stmtCheck) {
            die("Prepare failed: " . $conn->error);
        }

        $stmtCheck->bind_param("s", $name);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            $nameErr = "Name already exists.";
        } else {

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert
            $stmt = $conn->prepare("INSERT INTO form (name, email, password, mobile) VALUES (?, ?, ?, ?)");
            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("ssss", $name, $email, $hashedPassword, $mobile);

            if ($stmt->execute()) {
                header("Location: Form.php");
                exit();
            } else {
                die("Error inserting data: " . $conn->error);
            }
        }
    }
}
?>

<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>

            <tr>
                <td><label>Name</label></td>
                <td>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <span class="error">* <?php echo $nameErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label>Email</label></td>
                <td>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label>Password</label></td>
                <td>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                    <span class="error">* <?php echo $passwordErr; ?></span>
                </td>
            </tr>

            <tr>
                <td><label>Mobile</label></td>
                <td>
                    <input type="text" name="mobile" value="<?php echo $mobile; ?>">
                    <span class="error">* <?php echo $mobileErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <button type="submit" name="submit">Submit</button>
                </td>
            </tr>

        </table>
    </form>
</div>

</body>
</html>
