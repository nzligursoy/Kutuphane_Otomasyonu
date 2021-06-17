<?php
//mysql bağlantı
include ("baglan.php");
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/c20485228a.js"
    crossorigin="anonymous">
    </script>
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
</head>
<body>
  <a href="anasayfa.php"><div id="logo"><i class="fa fa-home" aria-hidden="true"></i><b>KÜTÜPHANE &nbsp;OTOMASYONU</b></div></a>
  <h2>Adres Ekleme</h2>
<form method="post" action="adresekle.php">
<table border="1" bgcolor="#fffacd" align="center">
<tr>
<td>Üye Adı</td>
<td><input type="text" name="uyeadi"></td>
</tr>
<tr>
<td>Üye Soyadı</td>
<td><input type="text" name="uyesoyadi"></td>
</tr>
<tr>
<td>İl</td>
<td><input type="text" name="il"></td>
</tr>
<tr>
<td>İlçe</td>
<td><input type="text" name="ilce"></td>
</tr>
<tr>
<td>Mahalle</td>
<td><input type="text" name="Mahalle"></td>
</tr>
<tr>
<td>Sokak</td>
<td><input type="text" name="Sokak"></td>
</tr>
<td>Kapı No</td>
<td><input type="text" name="KapiNo"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="KAYDET"></td>
</tr>
</table><br><br><br>
</form>
<?php
//mysql bağlantı
include ("baglan.php");
?>
<h2>Adres Güncelle</h2>
<?php
$sql="SELECT * FROM adresler";
$cevap=mysqli_query($baglanti,$sql);
echo '<table border=1 bordercolor=black bgcolor="#fffacd" align=center><tr>
<th>İl</th>
<th>İlçe</th>
<th>Mahalle</th>
<th>Sokak</th>
<th>Kapı No</th></tr>';

while($satir=mysqli_fetch_array($cevap)){
    echo '<tr>';
    echo '<td>'.$satir['il'].'</td>';
    echo '<td>'.$satir['ilce'].'</td>';
    echo '<td>'.$satir['Mahalle'].'</td>';
    echo '<td>'.$satir['Sokak'].'</td>';
    echo '<td>'.$satir['KapiNo'].'</td>';
    echo "<td><a href=adres_guncelle.php?ıd=";
    echo $satir['AdresID'];
    echo ">Güncelle</a></td>";
    echo '</tr>';
}
echo '</table><br><br>';
?>
</body>
</html>