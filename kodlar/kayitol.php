<?php 
 include ("baglan.php");  
 session_start();
 extract($_POST);

$UyeAdi=$_POST["UyeAdi"];
$UyeSoyadi=$_POST["UyeSoyadi"];
$Telefon=$_POST["Telefon"];
$E_posta=$_POST["E_posta"];

if (!$UyeAdi){
    echo "Üye Adı alanını boş bırakmayınız.";
}
else if (!$UyeSoyadi){
    echo "Üye Soyadı alanını boş bırakmayınız.";
}
else if (!$Telefon){
    echo "Telefon alanını boş bırakmayınız.";
}
else if (!$E_posta){
    echo "E-posta alanını boş bırakmayınız.";
}

else{
    $sql="INSERT INTO uyeler".
    "(UyeAdi , UyeSoyadi , Telefon , E_posta )".
    "VALUES ('$UyeAdi' , '$UyeSoyadi' , '$Telefon' , '$E_posta')";
    $cevap = mysqli_query($baglanti,$sql);

if(!$cevap){
    echo "Hata:" .mysqli_error($baglanti);
    echo "Bir hata oluştu yeniden giriş için yönlediriliyorsunuz.";
    header('Refresh:3 ; index.php');
}
else{
    echo "Kayıt olma işleminiz başarı ile tamamlandı. Giriş için yönlendiriliyorsunuz.";
    header('Refresh:3 ; index.php');
}
}
 ?>