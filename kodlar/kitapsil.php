<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Silme</title>
    <script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
<style>
    body{
    background-color: #eeaeee;
    text-align: center;
    }
    </style>
</head>
<body>
<?php 
include ("baglan.php");
session_start();
$silinecekID= $_GET['ISBN'];
$sql12="DELETE FROM kitaplar WHERE ISBN=' $silinecekID'";
$sonuc=mysqli_query($baglanti,$sql12);

$sql2="DELETE FROM kitapkategori WHERE ISBN= '$silinecekID' ";
$sonuc2=mysqli_query($baglanti,$sql2);

$sql3="DELETE FROM kitapkutuphane WHERE ISBN= '$silinecekID' ";
$sonuc3=mysqli_query($baglanti,$sql3);

$sql4="DELETE FROM islemler WHERE ISBN= '$silinecekID' ";
$sonuc4=mysqli_query($baglanti,$sql4);

$sql5="DELETE FROM yazarkitap WHERE ISBN= '$silinecekID' ";
$sonuc5=mysqli_query($baglanti,$sql5);

if($sonuc || $sonuc2 || $sonuc3 || $sonuc4 || $sonuc5 ){
   echo "Kitap Başarıyla Silindi";
 }
else{
    echo "Bir sorun oluştu silinemedi" . mysqli_error($baglanti);
}
    echo "<h3><a href='kitap.php'><div id='logo'><i class='fa fa-book  ikon'
    aria-hidden='true'></i>Kitap &nbsp;İşlemleri </div></a> </h3>";
    mysqli_close($baglanti);
?>
</br> 
    
</body>
</html>






