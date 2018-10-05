<?php
    require_once("db.php");

    $id     = $_GET['id'];
    $delete = "DELETE FROM siswa WHERE id=$id";

    if (mysqli_query($conn, $delete)) {
        echo "<script> 
                alert('Data berhasil dihapus!'); 
                location='list.php';
             </script>";
    }else {
        echo "Error: " . $delete . "<br?" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>