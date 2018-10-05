<?php
    require_once("db.php");
    
    $id     = $_GET['id'];
    $edit   = "SELECT * FROM siswa WHERE id = '$id'";
    $sql    = mysqli_query($conn,$edit); 
    $row    = mysqli_fetch_assoc($sql);
?>
<h2>Silahkan Edit Data anda</h2>
    <pre>
        <form method="post">
            Nama            : <input type="text" name="nama" value="<?php echo $row['nama'] ?>">
            
            NIM             : <input type="text" name="nim" value="<?php echo $row['nim'] ?>">
            
            Tanggal Lahir   : <input type="date" name="tgl_lahir" value="<?php echo $row['tgl_lahir'] ?>">
            
            <input type="submit" name="submit" value="Simpan">
        </form>
    </pre>
<?php
    if (isset($_POST['nama'])) {
        $nama       = $_POST['nama'];
        $nim        = $_POST['nim'];
        $tgl_lahir  = $_POST['tgl_lahir'];

        $sql = "UPDATE siswa SET nama='$nama', nim='$nim', tgl_lahir='$tgl_lahir' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
                echo "<script> 
                        alert('Data berhasil diubah!'); 
                        location='list.php';
                     </script>";
        }else {
            echo "Error: " . $sql . "<br?" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
?>