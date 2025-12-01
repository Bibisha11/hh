<?php
require 'connect.php';

// Check for a valid ID in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Delete the form record
    $sql = "DELETE FROM Form WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect after successful deletion
        header('Location: showdata.php');
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No valid ID provided.";
}
?>
