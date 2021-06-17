<?php
//mysql bağlantı
include ("baglan.php");
session_start();

//girilen veriler alınır
$silinecekID=$_GET['YazarNo'];


$sql="DELETE  FROM yazarlar WHERE YazarNo=".$silinecekID;
$sql1="DELETE FROM yazarkitap WHERE YazarNo=".$silinecekID;

//yazar silme için yazılan sorgu kodları veri tabanına gönderilir

$cevap=mysqli_query($baglanti,$sql);
$cevap1=mysqli_query($baglanti,$sql1);

  //cevap doğru değilse hata verir
   if(!$cevap&&!$cevap1){
    echo "Hata:" .mysqli_error($baglanti);
  }
   //cevap doğruysa silme işlemi tamamlanmış olur
   else{
    echo "<script>alert('Yazar silme işlemi başarı ile tamamlandı.')</script>";
    header("Refresh:3;yazar.php");
  }
?>