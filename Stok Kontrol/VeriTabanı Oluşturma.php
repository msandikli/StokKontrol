<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$servername = "localhost";
$username = "root";
$password = "ybs312ybs";
$dbname = "ek_data";

$conn = new mysqli($servername, $username, $password);
$sql = "CREATE DATABASE ek_data";
if ($conn->query($sql) === TRUE) { echo "Veri Tabanı başarıyla kuruldu"; } else { echo "Veri tabanı kurulumunda sorun var: " . $conn->error; }
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE urun(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ad VARCHAR(30) NOT NULL ,
miktar INT(6) NOT NULL,
tur VARCHAR(30) NOT NULL)";

mu
$sql="INSERT INTO urun(id,ad,miktar,tur)
VALUES('1','Pirinç','20','KG');";
$sql .="INSERT INTO urun(id,ad,miktar,tur)
VALUES('2','Bulgur','20','KG');";
$sql .="INSERT INTO urun(id,ad,miktar,tur)
VALUES('3','Ülker Petibör Bisküvi','30','Paket');";
$sql .="INSERT INTO urun(id,ad,miktar,tur)
VALUES('4','CocaCola 2.5L','10','Koli');";
$sql .="INSERT INTO urun(id,ad,miktar,tur)
VALUES('4','CocaCola 2L','10','Koli');";
if ($conn->multi_query($sql) === TRUE) 
	{ echo "Yeni kayıt başarılı"; } 
else { echo "Error: " . $sql . "<br>" . $conn->error; };
?>
<a href="Final.php">ANASAYFAYA DÖN</a>
</body>
</html>