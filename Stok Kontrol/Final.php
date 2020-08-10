<!DOCTYPE html>
<html>
<head >
	<title>YENER TOPTAN GIDA A.Ş</title>
	<link rel="stylesheet" href="menustyle.css">
</head>
<body>
	<ul class="menu">
		<li>
			<a href="Final.php" style="color: white">Ürün Stok Kontrol</a>
		</li>
		<li>
			<a href="Ürün Ekle.php">Ürün Ekle</a>
		</li>
		<li>
			<a href="Ürün Sil.php">Ürün Sil</a>
		</li>
		<li>
			<a href="Ürün Güncelle.php">Ürün Güncelle</a>
		</li>
		<li>
			<a href="Ürün Ara.php"><img src="ara.png"></a>
		</li>
		<li>
			<a href="Final.php" style="padding-left: 512px"><img src="yg.png"></a>
		</li>
		<li><a href="a-z.php">A-Z Sıralama</a></li>
		<li><a href="miktar.php">Miktara Göre Sıralama</a></li>
		</li>
	    </ul>


<?php
$servername = "localhost";
$username = "root";
$password = "ybs312ybs";
$dbname = "ek_data";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo('<table border="10" cellspacing="10" cellpadding="10" width="100%" align="center" bgcolor="white">
	<tr bgcolor="#AC6DA8">
				<th style="color: white;" width="90" height="40">Ürün NO:</th>
				<th style="color: white;"width="500" height="40">Ürün Adı:</th>
				<th style="color: white;"width="150" height="40">Miktarı</th>
	</tr>');
$sql="SELECT * FROM urun";
$sorgu=mysqli_query($conn,$sql);
while( $sonuc=mysqli_fetch_row($sorgu) ){
    echo '<tr><td align="center">'.$sonuc[0].'</td>'; 
    echo '<td align="center">'.$sonuc[1].'</td>';    
    echo '<td align="left">'.$sonuc[2]; 
    echo '&emsp;'.$sonuc[3].'</td></tr>'; 
}
echo "</table>";
$conn->close();
?>
</body>
</html>