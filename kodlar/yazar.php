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
<!--veri tabanına kaydetmek için yazar adı, yazar soyadı ve yazar no kullanıcıdan alma-->
<h2>Yazar Ekleme</h2>
<form method="post" action="yazarekle.php">
<table border="1" bgcolor="#fffacd" align="center">
<tr>
<td>Yazar Adı</td>
<td><input type="text" name="YazarAdi"></td>
</tr>
<tr>
<td>Yazar Soyadı</td>
<td><input type="text" name="YazarSoyadi"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="KAYDET"></td>
</tr>
</table>
</form></br></br>
<h2>Yazar Silme</h2>
<?php
$sql="SELECT * FROM yazarlar";
$cevap=mysqli_query($baglanti,$sql);
echo '<table border=1 bordercolor=black cellspacing=5 bgcolor=#fffacd align=center><tr>
<th>Yazar No</th>
<th>Yazar Adı</th>
<th>Yazar Soyadı</th></tr>';

while($satir=mysqli_fetch_array($cevap)){
    echo '<tr>';
    echo '<td>'.$satir['YazarNo'].'</td>';
    echo '<td>'.$satir['YazarAdi'].'</td>';
    echo '<td>'.$satir['YazarSoyadi'].'</td>';
    echo '<td> <a href="yazarsilme.php?YazarNo='.$satir['YazarNo'].'"onclick="return uyari();">Sil</a></td>';
    echo '</tr>';
}
echo '</table><br><br>';
?>
<h2>Yazar Arama<h2>
<h3>Yazar No'ya göre kitap arama</h3>
<form method="post" action="yazararama.php">
<table border="1" bgcolor="#fffacd" align="center">
<tr>
<td><input type="text" name="YazarNo"></td>
</tr>
<td align="center"><input type="submit" value="ARA"></td>
</tr>
</table>
</form>
<?php
?>
</body>
</html>