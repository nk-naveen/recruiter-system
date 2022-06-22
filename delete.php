<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'signup');

if(isset($_POST['deletion']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM company_databse WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:index.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>