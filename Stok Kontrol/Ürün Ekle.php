<!DOCTYPE html>
<html>
<head >
	<title>YENER TOPTAN GIDA A.Ş</title>
	<link rel="stylesheet" href="menustyle.css">
</head>
<body>
	<ul class="menu">
		<li>
			<a href="Final.php>" >Ürün Stok Kontrol</a>
		</li>
		<li>
			<a href="Ürün Ekle.php" style="color: white">Ürün Ekle</a>
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
			<a href="Final.php" style="padding-left: 512px"><img src="yg.png"> </a>
		</li>
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
$miktar="";
$tur="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ad = test_input($_POST["ad"]);
  $miktar = test_input($_POST["miktar"]);
  $miktar=sayi($_POST["miktar"]);
  $tur=$_POST["tur"];
}
function sayi($data)
{
	if($data!="")
	{
  if(is_numeric($data))
  {
  	return $data;
  }
  else
  {
  	echo "Girilen miktar değeri SAYISAL bir değer olmalıdır!";
  	exit;
  }
	}
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
} ?>
<form method="post" action="
<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table border="1" cellspacing="20" cellpadding="20" width="30%" align="center" bgcolor="gray">
	<tr align="center">
		<td style="color: White">Ad:<input type="text" name="ad"></td>
		<td style="color: White">Miktar:<input type="text" name="miktar"></td>
		<td style="color: White">Tür:<br>KG<input type="radio" name="tur" value="KG" checked="">KOLİ<input type="radio" name="tur" value="KOLİ">PAKET<input type="radio" name="tur" value="PAKET"></td>
	</tr>
	<tr align="center">
		<td colspan="3" align="center"style="color: White"><input type="submit" name="submit" value="Ürünü Ekle" ></td>
	</tr></table></form>
<?php 
$servername = "localhost";
$username = "root";
$password = "ybs312ybs";
$dbname = "ek_data";
$id="";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT * FROM urun";
$sorgu=mysqli_query($conn,$sql);
while( $sonuc=mysqli_fetch_row($sorgu) ){
	$id=$sonuc[0];
	if($sonuc[1]==$ad){
		echo "Ürün Zaten Ekli!";
		exit;}
}
$id+=1;
if($ad!=""||$miktar!="")
{
$sql="INSERT INTO urun(id,ad,miktar,tur)
VALUES('$id','$ad','$miktar','$tur');";
if ($conn->multi_query($sql) === TRUE) 
	{ echo "Yeni kayıt başarılı"; } 
else { echo "Error: " . $sql . "<br>" . $conn->error; };}

 ?>



</form>
</body>
</html>