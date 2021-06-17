<?php
//mysql bağlantı
include("baglan.php");
session_start();
extract($_POST);

//girilen veriler alınır
 $il = $_POST['il'];
 $ilce = $_POST['ilce'];
 $Mahalle = $_POST['Mahalle'];
 $Sokak = $_POST['Sokak'];
 $KapiNo = $_POST['KapiNo'];

 //eğer veriler girilmediyse boş ise uyarır
if(empty($il) or empty($ilce) or empty($Mahalle) or empty($Sokak) or empty($KapiNo)){
    echo "Boş alan bırakmayınız";
}
else{
    //adres ekleme için sql sorgu kodu
  $sql="INSERT INTO adresler".
  "(il,ilce,Mahalle,Sokak,KapiNo)".
  "VALUES('$il','$ilce','$Mahalle','$Sokak','$KapiNo')";

  //adres ekleme için yazılan sorgu kodları veri tabanına gönderilir
  $cevap=mysqli_query($baglanti,$sql);
  //cevap doğru değilse hata verir
  if(!$cevap){
    echo "Hata:" .mysqli_error($baglanti);
}
//cevap doğruysa ekleme işlemi tamamlanmış olur
else{
    echo "<script>alert('Adres ekleme işlemi başarı ile tamamlandı.')</script>";
    header("Refresh:3;uye.php");
}
}
?>