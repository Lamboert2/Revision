<?php
//include conn.php to make sure  you  have a connection to your database
include ('conn.php');
include ('insert.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lambert</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="all">
   <form action="" method="post">
        <div class="content"><h1>Create account</h1></div>
        <label for="username">username:</label>
    <input type="text" name="username" id="username" autocomplete="off">
    <label for="ema">Email:</label>
    <input type="email" name="email" id="email" autocomplete="off">
    <label for="password">Password:</label>
<input type="password" name="password" id="password">
<input type="submit" name="submit" id="submit" value="Register">
</form> 

<div id="table">
    <table border="2">
<tr>
<td>ID</td>
<td>USERNAME</td>
<td>EMAIL</td>
<td>PASSWORD</td>
<td>ACTIONS</td>
</tr>
<?php

//write a php query to retrieve data from the database to table
$sql = "SELECT * FROM lambo";
$query = mysqli_query($conn, $sql);
$n = 1;
while($row = mysqli_fetch_assoc($query)){
    echo "
    <tr>
<td> {$n} </td>
<td> {$row['username']} </td>
<td> {$row['email']} </td>
<td> {$row['password']} </td>
<td>
<button class='one'><a name='delete' href='delete.php?delete={$row['id']}'>Delete</a> </button>
<button class='one'><a name='update' href='update.php?id={$row['id']}'>Edit</a> </button>
</td>
    </tr>
    ";
    //we use href='delete.php?delete={$row['id']}' because we want to show our program that we are deleting a file with that id
    //we use href='update.php?id={$row['id']}' because we want to show our program that we are updating a file with that id
    $n++;
}
?>
  </div>
</div>
</table>
</body>
</html>