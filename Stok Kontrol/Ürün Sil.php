<!DOCTYPE html>
<html>
<head >
	<title>YENER TOPTAN GIDA A.Ş</title>
	<link rel="stylesheet" href="menustyle.css">
</head>
<body>
	<ul class="menu">
		<li>
			<a href="Final.php ?>">Ürün Stok Kontrol</a>
		</li>
		<li>
			<a href="Ürün Ekle.php" >Ürün Ekle</a>
		</li>
		<li>
			<a href="Ürün Sil.php" style="color: white">Ürün Sil</a>
		</li>
		<li>
			<a href="Ürün Güncelle.php">Ürün Güncelle</a>
		</li>
		<li>
			<a href="Ürün Ara.php" ><img src="ara.png"></a>
		</li>
		<li>
			<a href="Final.php" style="padding-left: 512px"><img src="yg.png"></a>
		</li> </ul>

<?php 
$servername = "localhost";
$username = "root";
$password = "ybs312ybs";
$dbname = "ek_data";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$ad ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ad = test_input($_POST["ad"]);

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  if($data==""){
  	echo "Alanları doldurduğunuza emin olun!";
  	exit;}
  else
  	return $data;
}
?>
<form method="post" action="
<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table border="1" cellspacing="20" cellpadding="20" width="30%" align="center" bgcolor="gray">
	<tr align="center">
		<td style="color: White">Silinmek İstenilen Ürünün Adı:<input type="text" name="ad"></td>
		<td><input type="submit" name="submit" value="Ürünü Sil"></td></tr></table></form>
<?php
$sayac="2";
$silinecek="";
if($ad!="")
{
$sql="SELECT * FROM urun";
$sorgu=mysqli_query($conn,$sql);
while( $sonuc=mysqli_fetch_row($sorgu) ){
	if($sonuc[1]==$ad){
		echo '<table border="10" cellspacing="10" cellpadding="10" width="100%" align="center" bgcolor="white">
	<tr bgcolor="#AC6DA8">
				<th style="color: white;" width="90" height="40">Ürün NO:</th>
				<th style="color: white;"width="500" height="40">Ürün Adı:</th>
				<th style="color: white;"width="150" height="40">Miktarı</th>
	</tr>';
	$silinecek=$sonuc[0];
	echo '<tr><td align="center">'.$sonuc[0].'</td>'; 
    echo '<td align="center">'.$sonuc[1].'</td>';    
    echo '<td align="left">'.$sonuc[2]; 
    echo '&emsp;'.$sonuc[3].'</td></tr>';
		$sayac=1;

		break;
		}
	else
		$sayac=0;
	}

}
	if($sayac==0)
		echo "Ürün bulunamadı!";
	if($sayac==1)
		{
		$sql = "DELETE FROM urun WHERE id='$silinecek'";
		if ($conn->query($sql) === TRUE) { echo "Ürün başarıyla silindi!"; } 
		else { echo "Error: " . $conn->error; } 
		}

?>

</body>
</html>