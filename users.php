<?php
session_start();
if (! isset($_SESSION['user_logged_in'])) {
  header('Location: login.php');
  exit;
}

if (isset($_SESSION["message"])) {
  $message = $_SESSION["message"];
  unset($_SESSION["message"]);
}
require_once 'config.php';
require_once 'database.php';
include_once 'header.php';
?>
<body>
  <?php 
    if (isset($_SESSION['user_logged_in']) AND $_SESSION['user_logged_in'] === true) {
      $sql = "SELECT first_name FROM users WHERE id = " . $_SESSION['logged_in_user_id'] . " LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $user = mysqli_fetch_assoc($result);
      echo "<div>Hello " . $user['first_name'] . "</div>";
      ?>
      <div>
        <a href="logout.php">Logout</a>
      </div>
      <?php
    }
  ?>
  <?php if (isset($message)) { ?>
    <div class="alert alert-success">
      <?php echo $message ?>
    </div>
  <?php } ?>
  <div>
    <a href="add.php">Add User</a>
  </div>
  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $start = $page * 2 - 2;
  $totalSql = "SELECT COUNT(id) AS total FROM users";
  $totalResult = mysqli_query($conn, $totalSql);
  $totalRow = mysqli_fetch_assoc($totalResult);
  $total = $totalRow['total'];
  $lastPageNumber = ceil($total/USERS_PER_PAGE);

  $sql = "SELECT * FROM users LIMIT " . $start . ", " . USERS_PER_PAGE;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "Page: " . $page;
    ?>
    <ul class="pagination">
      <?php 
      if ($page != 1) { 
        ?>
        <li class="page-item"><a href="users.php?page=<?php echo $page - 1 ?>" class="page-link">Prev</a></li>
        <?php
      }

      for ($i=1; $i <= $lastPageNumber; $i++) { 
        ?>
        <li class="page-item">
          <a href="users.php?page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a>
        </li>
        <?php
      }
      if ($page != $lastPageNumber) {
        ?>
        <li class="page-item"><a href="users.php?page=<?php echo $page + 1 ?>" class="page-link">Next</a></li>
        <?php
      }
      ?>
    </ul>
    <table style="border: 1px solid black;">
      <thead>
        <tr>
          <th>Name</th>
          <th>DOB</th>
          <th>Gender</th>
          <th></th>
        </tr>    
      </thead>
      <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['first_name'] . ' ' . $row['last_name']  ?></td>
            <td><?php echo date('d/m/Y', strtotime($row['date_of_birth'])) ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td>
              <a href="user.php?id=<?php echo $row['id'] ?>">Details</a>
              <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
              <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirmDelete()">Delete</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <?php
  } else {
    echo "No users found!";
  }
  mysqli_close($conn);
  ?>
  <script type="text/javascript">
    function confirmDelete() {
      return confirm('Are you sure to delete?');
    }
  </script>
</body>
</html>