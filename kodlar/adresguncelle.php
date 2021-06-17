<?php

include ("baglan.php");
?>
<?php
extract($_POST);

$AdresID= $_GET['ıd'];
$sql="UPDATE adresler SET il='$il',ilce='$ilce',Mahalle='$Mahalle',Sokak='$Sokak',KapiNo='$KapiNo' WHERE AdresID=".$_GET['ıd'];

 $cevap=mysqli_query($baglanti,$sql);

 if(!$cevap){
   echo "Hatali:" .mysqli_error($baglanti);
}

else{
   echo "<script>alert('Adres güncelleme başarı ile tamamlandı.')</script>";
   header("Refresh:3;uye.php");
}

?>