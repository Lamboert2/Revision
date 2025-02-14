<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($email) && !empty($password)){
        //if all Fields are not empty , the program checks for the email and username.
     $emailcheck = "SELECT email,username FROM lambo WHERE email = '$email' OR username='$username'";
     $emailquery = mysqli_query($conn, $emailcheck);
     if(mysqli_num_rows($emailquery) > 0){
        echo "
        <script>
        alert('Username Or email already exists');
        </script>
        ";
     }
else{
    $insert = "INSERT INTO lambo(username,email,password) VALUES('$username','$email','$password')";
    $query= mysqli_query($conn, $insert);

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
        confirm('Data failed to insert');
        location.href='index.php';
        </script>
        ";
    } 
}  
    }
    else{
        echo "
         <script>
        confirm('All fields are required');
        location.href='index.php';
        </script>
        
        ";
    }

}
?>