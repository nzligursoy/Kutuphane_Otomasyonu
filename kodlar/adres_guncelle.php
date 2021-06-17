<?php
//mysql bağlantı
include ("baglan.php");
$AdresID= $_GET['ıd'];
$sql="SELECT * FROM adresler WHERE AdresID=".$_GET['ıd'];
$cevap=mysqli_query($baglanti,$sql);

if(!$cevap){
    echo '<br>Hata' . mysqli_error($baglanti);
}

$gelen=mysqli_fetch_array($cevap);
?>


<html>
<head>
    <style>
    body{
              background: url(kitapresmi.jpg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
             text-align: center;
        }
    </style>
    <script src="https://kit.fontawesome.com/c20485228a.js"
    crossorigin="anonymous">
    </script>
</head>
<body>
<a href="uye.php"><div ><i class="fa fa-user-circle-o" aria-hidden="true"></i> Üye &nbsp;İşlemleri</div></a><br><br>
<h2>Adres Güncelleme</h2>
<form action="adresguncelle.php?ıd=<?php echo $_GET['ıd']?>"  method="post">
<table border="1" bgcolor="#fffacd" align="center">
<tr>
<td>İl</td>
<td><input type="text" name="il" value="<?php echo $gelen['il']?>"></td>
</tr>
<tr>
<td>İlçe</td>
<td><input type="text" name="ilce" value="<?php echo $gelen['ilce']?>"></td>
</tr>
<tr>
<td>Mahalle</td>
<td><input type="text" name="Mahalle" value="<?php echo $gelen['Mahalle']?>"></td>
</tr>
<tr>
<td>Sokak</td>
<td><input type="text" name="Sokak" value="<?php echo $gelen['Sokak']?>"></td>
</tr>
<tr>
<td>Kapı No</td>
<td><input type="text" name="KapiNo" value="<?php echo $gelen['KapiNo']?>"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="KAYDET"></td>
</tr>
</table>
</form></br></br>