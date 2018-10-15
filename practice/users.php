<?php
//Check to see if session has started
if (!isset($_SESSION)){
  session_start();
}
//If user is not logged in, send them to login page
if (!isset($_SESSION['username'])){
  header('Location: login.php');
}

require('navbar.php');
echo "<hr />";
echo "<br />";

//Bring in database connection
require('dbconnection.php');

if (isset($_POST['id']) && isset($_POST['delete'])) {
  $sql = "DELETE FROM users WHERE userid = " . $_POST['id'];
  $result = $conn->query($sql);
}


//Create the SQL query
$sql = "SELECT * from users";

//Execute the SQL query
$result = $conn->query($sql);

//Close db connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

   <a href = "register.php">Register</a>
     <?php
     if (isset($_SESSION['username'])) {
     echo "<a href =\"upload.php\"> | Upload </a>";
     }
     if (isset($_SESSION['username'])) {
     echo "<a href =\"users.php\"> | Users </a>";
     }
      ?>

    <table>
      <tr>
        <th>User Id</th>
        <th>Username</th>
        <th>Password Hash</th>
        <th>Actions</th>
      </tr>



      <?php
      //Loop through all table records
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
          echo "<td>" . $row['userid'] . "</td>";
          echo "<td>" . $row['username'] . "</td>";
          echo "<td>" . $row['password'] . "</td>";
          echo "<td>
              <form action=\"edituser.php\" method=\"get\">
                <input type=\"hidden\" name=\"id\" value=\"" . $row['userid'] . "\">
                <input type=\"submit\" value=\"edit\" name=\"edit\">
              </form>
            </td>";

          echo "<td>
                  <form action=\"\" method=\"post\">
                    <input name=\"id\" type=\"hidden\" value=\"" . $row['userid'] . "\">
                    <input type=\"submit\" value=\"delete\" name=\"delete\">
                  </form>
                </td>";

        echo "</tr>";
      }
      ?>

    </table>

  </body>
</html>