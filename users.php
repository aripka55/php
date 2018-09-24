<?php
// Check to see if session has started
if (!isset($_SESSION)) {
  session_start();
}

// If user is not logged in, send them to login page
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
}

// Bring in database connection
require('dbconnection.php');

if (isset($_POST['id']) && isset($_POST['delete'])){
    $sql = "DELETE FROM users WHERE userid = " $_POST['id'];
    $result = $conn->query($sql);
}

//create the sql Query
$sql = "SELECT * from users;";

//exacute the sql query
$result = $conn->query($sql);

//close db connection
$conn->close();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

<table>
<tr>
  <!--key names-->
  <th>User id </th>
  <th>Username </th>
  <th>Password Hash</th>
<tr>

<?php
//loop through all table records
while($row = $result->fetch_assoc()){
  echo "<tr>";
  echo "<td>" . $row['userid'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>
            <form action=\"\" method=\"post\">
                <input name=\"id\" type=\"hidden\" value=\"" . $row['userid'] . "\">
                <input type=\"submit\" value=\"delete\" name=\"delete\">
            </form> </td>";
  echo "</tr>";
}
?>
</table>

</body>
 </html>
