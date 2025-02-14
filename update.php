<?php
include ('conn.php');
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
   <?php
   $id = $_GET['id'];
   //$id is the normal variable called id
   //$GET['id']. Here, id is there other id in our update.php?id={$row['id']}. This id will call there other id in our index.php
$sql = "SELECT * FROM lambo WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "UPDATE lambo SET username='$username', email='$email', password='$password' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "
        <script>
        location.href='index.php';
        </script>
        ";
    }
        else{
            echo "
            <script>
            alert('failed to update data');
            location.href='update.php';
            </script>
            ";
        }
    }

   ?>
    <div class="all">
   <form action="" method="post">
   <div class="content"><h1>Edit account</h1></div>
        <label for="username">username:</label>
        
    <input type="text" name="username" id="username" autocomplete="off" value='<?php echo "{$row['username']}"; ?>' >
    <label for="ema">Email:</label>
    <input type="email" name="email" id="email" autocomplete="off"  value='<?php echo "{$row['email']}"; ?>'>
      <label for="password">Password:</label>
<input type="password" name="password" id="password" value='<?php echo "{$row['password']}"; ?>'>
<input type="submit" name="update" id="submit" value="Update">
<button  class="cancel"><a href="index.php">Cancel</button></a>

</form> 

</body>
</html>