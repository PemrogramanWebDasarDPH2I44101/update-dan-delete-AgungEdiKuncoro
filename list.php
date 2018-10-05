<?php
    require_once("db.php");
?>

<table border=1 style="border-spacing: 0; text-align: center;">
	<thead>
		<td>Nama</td>
		<td>NIM</td>
		<td>Tanggal</td>
		<td>Opsi</td>
	</thead>
	<tbody>
		<?php
		$sql = "SELECT * FROM siswa";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			//output datanya
			while ($row = mysqli_fetch_assoc($result)) {
				?>
					<tr>
						<td><?php echo $row['nama']?></td>
						<td><?php echo $row['nim']?></td>
						<td><?php echo $row['tgl_lahir']?></td>
						<td><a href="edit.php?id=<?php echo $row['id']?>">Edit</a> | <a href="delete.php?id=<?php echo $row['id']?>">Hapus</a></td>
					</tr>
				<?php
			}
		}else {
			echo "<script> 
					alert('Tidak ada data!'); 
					location='form.php';
		 		 </script>";
		}
		mysqli_close($conn);
		?>
	</tbody>
</table>
<a href="form.php">Tambah Data</a>
