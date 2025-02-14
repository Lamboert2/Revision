<?php
include ('conn.php');
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];
//this $delete is a normal variable called delete
// $GET['delete'] this is there other delete we used in delete.php?delete={$row['id']}. This delete will call there other delete in our index.php
    $sql = "DELETE FROM lambo WHERE id='$delete'";
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
        alert('failed to delete data from database');
       location.href='index.php'; 
        </script>
        ";
    }
}
?>