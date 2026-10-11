<?php
include '../include/koneksi.php';
// memulai session

session_start();
error_reporting(0);
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['level'])) {

	header('location:../login');
	exit();
}
 ?>
<!DOCTYPE html>
<html>

<script>
												function printContent(el){
												var restorepage = document.body.innerHTML;
												var printcontent = document.getElementById(el).innerHTML;
												document.body.innerHTML = printcontent;
												window.print();
												document.body.innerHTML = restorepage;
												}
												</script>

<body onLoad="printContent('detail')">
  <script language=javascript>
setTimeout("location.href='karyawan'", 2000);
</script>
  
<div id="detail">
    
		<?php 
		$image = mysqli_query($GLOBALS["___mysqli_ston"], "select* from karyawan");
		$a = 1;
echo '<table align="center" width="100%"><tr>';
while($row = mysqli_fetch_assoc($image)){
    if($a <= 8){ //number of cells in row
    echo '<td><img src="./controller/barcode.php?text='.$row['nik'].'&print=true" width="50%" alt="'.$row['nik'].'"</td>';
    }
    else {
    echo '</tr>\n<tr>'.'<td>'.$row['nik'].'</td>';
    }
$a++;
}
echo '</tr></table>' ?>		
    
</div>
    <?php
		include 'include/script.php' 
		?>

</body>

</html>