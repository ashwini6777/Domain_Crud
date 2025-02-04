<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD']=== 'POST'){
    $dmn_no = $_POST['dmn_no'];

    $sql = "DELETE FROM DOMAIN WHERE dmn_no=$dmn_no";

    if (mysqli_query($conn,$sql)){
        echo "Record deleted successfully!";
    } else {
        echo "Error: " .$sql . "<br>" . mysqli_error($conn);
    }
}

?>
