<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Ekleme</title>
    <script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
<style>
    body{
    background-color: #eeaeee;
    }
    </style>
</head>
<body>
<?php
echo '<center>';
    include ("baglan.php");
    session_start();
    $ISBN=$_POST["ISBN"];
    $KitapAdi=$_POST["KitapAdi"];
    $KategoriAdi=$_POST["KategoriAdi"];
    $YazarAdi=$_POST["YazarAdi"];
    $YazarSoyadi=$_POST["YazarSoyadi"];
    $YayineviAdi=$_POST["YayineviAdi"];
    $KutuphaneAdi=$_POST["KutuphaneAdi"];
    $Miktar=$_POST["Miktar"];
if(empty($ISBN) or empty($KitapAdi) or empty($YazarAdi) or empty($YazarSoyadi) or empty($KategoriAdi) or empty($YayineviAdi) or empty($KutuphaneAdi) ){
    echo "<h3>Boş alan bırakmayınız !</h3>";
}

else{
    $sql="INSERT INTO kitaplar".
    "(ISBN,KitapAdi)".
    "VALUES ('$ISBN','$KitapAdi')";
    $cevap=mysqli_query($baglanti,$sql);
if(!$cevap){
    echo "Hata:" .mysqli_error($baglanti);
}
else{
}

$sql6="INSERT INTO kitapkutuphane".
"(ISBN,Miktar)".
"VALUES ('$ISBN','$Miktar')";
$cevap6=mysqli_query($baglanti,$sql6);
if(!$cevap6){
echo "Hata:" .mysqli_error($baglanti);
}
else{
}

$sql1="INSERT INTO yazarlar".
"(YazarAdi,YazarSoyadi)".
"VALUES ('$YazarAdi','$YazarSoyadi')";
 
$cevap1=mysqli_query($baglanti,$sql1);
if(!$cevap1){
echo "Hata:" .mysqli_error($baglanti);
}
else{
}
 
$sql2="INSERT INTO kategoriler".
"(KategoriAdi)".
"VALUES ('$KategoriAdi')";
 
$cevap2=mysqli_query($baglanti,$sql2);
if(!$cevap2){
echo "Hata:" .mysqli_error($baglanti);
}
else{

}
 
$sql3="INSERT INTO yayinevleri".
"(YayineviAdi)".
"VALUES ('$YayineviAdi')";
 
$cevap3=mysqli_query($baglanti,$sql3);
if(!$cevap3){
echo "Hata:" .mysqli_error($baglanti);
}
else{
}
 
$sql4="INSERT INTO kutuphaneler".
"(KutuphaneAdi)".
"VALUES ('$KutuphaneAdi')";
 
$cevap4=mysqli_query($baglanti,$sql4);
if(!$cevap4){
echo "Hata:" .mysqli_error($baglanti);
}
else{
}
echo "<h3>Kitap ekleme başarı ile yapıldı. &nbsp; </br>";
}
echo "<a href='kitap.php'><div id='logo'><i class='fa fa-book  ikon'
aria-hidden='true'></i>Kitap &nbsp;İşlemleri </div></a> </h3>";  
?>
    
</body>
</html>