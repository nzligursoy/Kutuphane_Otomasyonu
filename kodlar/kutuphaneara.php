<!DOCTYPE html>
 <html lang="tr">
 <head>
 <script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kütüphane Ara</title>
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
            font-weight: bolder;
        }
        table{
            background-color: #fffacd ;
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

<?php
include ("baglan.php");
session_start();

//kutuphane.php sayfasında tıklanan kütüphanenin ID 'si 
$listelenecekkutuphane= $_GET['KutuphaneID'];

//Kitap adları sorgusu
$sql1 = "SELECT DISTINCT kitaplar.KitapAdi , kutuphaneler.KutuphaneAdi 
FROM kitaplar , kutuphaneler , kitapkutuphane
WHERE kitapkutuphane.KutuphaneID = $listelenecekkutuphane
AND kitapkutuphane.ISBN = kitaplar.ISBN
AND kutuphaneler.KutuphaneID = $listelenecekkutuphane";
$sonuc1 = mysqli_query($baglanti,$sql1); 

//Kütüphane adı sorgusu
$sql3 = "SELECT KutuphaneAdi FROM kutuphaneler
WHERE kutuphaneler.KutuphaneID = $listelenecekkutuphane";
$sonuc3 = mysqli_query($baglanti,$sql3); 

//Veritabanından tıklanan kütüphanenin adını getiriyor.
while($satir3 = mysqli_fetch_array($sonuc3))
{
echo "<h1>" .$satir3['KutuphaneAdi']. "</h1>";
echo '<br>';
}

echo '<table align="center" border=1 bordercolor=black cellspacing=5><tr>
<th>Kitap Adı</th>';

//Veritabanından kütüphanede bulunan kitapları listeliyor.
while($satir1 = mysqli_fetch_array($sonuc1))
{
echo '<tr>';
echo '<td>'.$satir1['KitapAdi'].'</td>';
echo '</tr>';
}
echo "</table>"; 
?>
<p>Kütüphane listesine dönmek için <a href="kutuphane.php">tıklayınız.</a></p>
</body>
</html>
