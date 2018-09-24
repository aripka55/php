<?php
// check to see if session is started
if (!isset($_SESSION)) {
  session_start();
}
//if username not logged in, will move them to login page
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
}

//bring in database connections
//remember if your connection page is named different change
require('dbConnect.php');

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
  echo "</tr>";
}
?>
</table>

</body>
 </html>
