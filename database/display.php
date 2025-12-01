<!DOCTYPE html>
<html>
<head>
    <title>Display Users</title>
    <link rel="stylesheet" href="your_styles.css"> <!-- Optional CSS -->
</head>
<body>
    <div>
        <a href="Form.php">
            <button class="btn btn-primary my-5">Add user</button>
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
include 'connect.php';

$sql = "SELECT * FROM form"; // or "user"
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
            <td>' . htmlspecialchars($row["id"]) . '</td>
            <td>' . htmlspecialchars($row["name"]) . '</td>
            <td>' . htmlspecialchars($row["email"]) . '</td>
            <td>' . htmlspecialchars($row["mobile"]) . '</td>
            <td>********</td>
            <td>
                <a href="update.php?id=' . urlencode($row["id"]) . '" class="btn btn-info">Update</a>
                <a href="delete.php?id=' . urlencode($row["id"]) . '" class="btn btn-danger">Delete</a>
            </td>
        </tr>';
    }
} else {
    echo "<tr><td colspan='6'>No data found.</td></tr>";
}
?>
        </tbody>
    </table>
</body>
</html>
