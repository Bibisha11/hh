<!DOCTYPE html>
<html>

<head>
    <title>Show data.php</title>

<body>
    <div>
    <div>
        <a href="Form.php">
            <button class="btn btn-primary my-5">Add user</button>
        </a>
    </div>
        <table>
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th> 
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            include 'connect.php';

            
            $sql = "SELECT * FROM form"; 
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $name = $row["Username"]; // Ensure this matches the column name in your table
                    $email = $row["Email"];
                    $password = $row["Password"];
                    $mobile = $row["mobile"];

                    echo '<tr>
                           <th scope="row">' . $id . '</th>
                                <td>' . $name . '</td>
                                <td>' . $email . '</td>
                                <td>' . $mobile . '</td>
                                <td>' . $password . '</td>
                                <td>
                                    <a href="update.php?id=' . $id . '">
                                        <button class="btn btn-info">Update</button>
                                    </a>
                                    <a href="delete.php?id=' . $id . '">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                        </tr>';
                }
            } else {
                echo '<tr><td colspan="6">No data found.</td></tr>';
            }
            ?>

                <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
            </tbody>
        </table>
    </div>
</body>
</html>

