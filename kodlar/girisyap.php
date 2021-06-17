<?php 
 include ("baglan.php");  
 session_start();
 extract($_POST);

$UyeAdi = $_POST["UyeAdi"];
$Telefon = $_POST["Telefon_1"];

if (!$UyeAdi){
    echo "Kullanıcı adınızı giriniz.";
}
elseif (!$Telefon){
    echo "Telefon numaranızı giriniz.";
}
else{
    $sql = "SELECT * FROM uyeler WHERE UyeAdi = '$UyeAdi' AND Telefon = '$Telefon'";
    $cevap = mysqli_query($baglanti,$sql);
    $say = mysqli_num_rows($cevap);

    if ($say == 1){
        $_SESSION['UyeAdi'] = $UyeAdi;
        echo "Başarı ile giriş yaptınız, yönlendiriliyorsunuz.";
        header('Refresh:1 ; anasayfa.php');
    }
    else {
        echo "Bir hata oluştu yeniden giriş için yönlediriliyorsunuz.";
        header('Refresh:5 ; index.php');
    }

}