<!DOCTYPE html>
 <html lang="tr">
 <head>
 <script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kütüphane Listeleme</title>
     <style>
        body{
            background: url(kitapresmi.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            text-align: center;
        }
        p{
            text-align: center;
            font-size: 25px;
            color:#551a8b;
            font-weight: bolder;
        }
        table{
            background-color: #fffacd;
            text-align: center;
        } 
        a:link{
            text-decoration: none;
            color: #551a8b;
        }  
        a:visited{
            text-decoration: none;
            color: #551a8b;
        }     
        a:hover{
            color: #800000;
        }
    </style>
 </head>

<body>
<a href="anasayfa.php"><div id="logo"><i class="fa fa-home" aria-hidden="true"></i><b>KÜTÜPHANE &nbsp;OTOMASYONU </b></div></a>
<?php 
include ("baglan.php");

//Veritabanında kütüphaneler ve adresler tablosunu birleştiren sorgu 
$sql="SELECT DISTINCT kutuphaneler.KutuphaneID , kutuphaneler.KutuphaneAdi , adresler.il , adresler.ilce 
FROM kutuphaneler
INNER JOIN adresler ON kutuphaneler.AdresID = adresler.AdresID";
$sonuc=mysqli_query($baglanti,$sql); 

echo "<p>Kütüphanelerdeki Kitap Listesi</p>";
echo '<table align="center" border=1 bordercolor=black cellspacing=5 ><tr>
<th>Kütüphane Adı</th>
<th>İl</th>
<th>İlçe</th>
<th></th></tr>';

//Veritabanından Kütüphane Adı, il ve ilçeyi listeliyor.
while($satir = mysqli_fetch_array($sonuc))
{
echo '<tr>';
echo '<td>'.$satir['KutuphaneAdi'].'</td>';
echo '<td>'.$satir['il'].'</td>';
echo '<td>'.$satir['ilce'].'</td>';
echo '<td> <a href="kutuphaneara.php?KutuphaneID='.$satir['KutuphaneID'].'" onclick="return uyari();"><b>Git</b></a> </td>';
echo '</tr>';
}
echo'</table>';
?>

</body>
</html>