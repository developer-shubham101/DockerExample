<?php
$servername = "db";
$username = "testuser";
$password = "testpassword";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$result = $conn->query(
"CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL
);"
);


$sql = "SHOW TABLES";
$result = $conn->query($sql);

/* if ($result->num_rows > 0) {
  echo "<h2>Tables in $dbName:</h2>";
  while ($row = $result->fetch_array()) {
    echo $row[0] . "<br>";
  }
} else {
  echo "No tables found.";
} */


// Handle form submission for Add, Update, Delete
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $conn->query($sql);
  } elseif (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$id'";
    $conn->query($sql);
  } elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id='$id'";
    $conn->query($sql);
  }
}

// Fetch all users
$result = $conn->query("SELECT * FROM users");
print_r($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <style>
    form {
      margin-bottom: 20px;
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 10px;
    }
  </style>
</head>

<body>
  <h2>User Management</h2>

  <!-- Form for adding and updating users -->
  <form method="POST" action="">
    <input type="hidden" name="id" value="<?php if (isset($_GET['edit'])) echo $_GET['id']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" required value="<?php if (isset($_GET['edit'])) echo $_GET['name']; ?>">
    <br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required value="<?php if (isset($_GET['edit'])) echo $_GET['email']; ?>">
    <br><br>
    <label for="phone">Phone:</label>
    <input type="text" name="phone" required value="<?php if (isset($_GET['edit'])) echo $_GET['phone']; ?>">
    <br><br>
    <button type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'add'; ?>">
      <?php echo isset($_GET['edit']) ? 'Update User' : 'Add User'; ?>
    </button>
  </form>

  <!-- Table showing all users -->
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td>
            <a href="?edit&id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&email=<?php echo $row['email']; ?>&phone=<?php echo $row['phone']; ?>">Edit</a>
            <form method="POST" action="" style="display:inline-block;">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="delete">Delete</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>

<?php
$conn->close();
?>