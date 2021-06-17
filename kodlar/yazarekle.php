<?php
//mysql bağlantı
include("baglan.php");
session_start();
extract($_POST);

//girilen veriler alınır
 $YazarAdi = $_POST['YazarAdi'];
 $YazarSoyadi = $_POST['YazarSoyadi'];

 //eğer veriler girilmediyse boş ise uyarır
if(empty($YazarAdi) or empty($YazarSoyadi)){
    echo "Boş alan bırakmayınız";
}
else{
 //yazar ekleme için sql sorgu kodu
  $sql="INSERT INTO yazarlar".
  "(YazarAdi,YazarSoyadi)".
  "VALUES('$YazarAdi','$YazarSoyadi')";

  //yazar ekleme için yazılan sorgu kodları veri tabanına gönderilir
  $cevap=mysqli_query($baglanti,$sql);
  //cevap doğru değilse hata verir
  if(!$cevap){
    echo "Hata:" .mysqli_error($baglanti);
}
//cevap doğruysa ekleme işlemi tamamlanmış olur
else{
    echo "<script>alert('Yazar ekleme işlemi başarı ile tamamlandı.')</script>";
    header("Refresh:3;yazar.php");
}
}
?>


