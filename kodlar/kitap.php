<?php 
 include ("baglan.php");  
 session_start();
 extract($_POST);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kitap İşlemleri</title>
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
             text-align: justify;
             font-size: 25px;
             color:#551a8b;
             font-weight: bolder;
         }
        form{
             text-align: justify;
         }
        input{
            border-radius: 7px;
         } 
        table{
             background-color: #fffacd ;
         }        
     </style>
 </head>
 <body>
    <a href="anasayfa.php"><div id="logo"><i class="fa fa-home" aria-hidden="true"></i>
    KÜTÜPHANE &nbsp;OTOMASYONU </div></a>
    <div><p>Kitap Ekleme</p>   
    <form action="kitapekle.php" method="POST">
    Kitabın Yazarının Adı : <input type="text" name="YazarAdi"></br></br>
    Kitabın Yazarının Soyadı : <input type="text" name="YazarSoyadi"></br></br>
    Kitabın ISBN  : <input  type="text" name="ISBN"></br></br>
    Kitabın Adı : <input type="text" name="KitapAdi"></br></br>
    Kitabın Kütüphanesi : <input type="text" name="KutuphaneAdi"></br></br>
    Kitabın Kategori Adı  : <input type="text" name="KategoriAdi"></br></br>
    Kitabın Yayınevi Adı : <input type="text" name="YayineviAdi"></br></br>
    Kitabın Adet Sayısı  : <input type="text" name="Miktar">&nbsp; &nbsp; &nbsp;
    <input type="submit" value="KAYDET">
    </form> </div>
    <div><p>Kitap Arama</p><form action="kitaparama.php" method="POST">
         <input type="submit" value="Kitap Arama İşlemine git">
        </form></div>
    <div><p> Kitap Silme </p>
    <?php 
 include ("baglan.php");
 $sql="SELECT * FROM kitaplar ";
$sonuc=mysqli_query($baglanti,$sql); 
echo '<table border=1 bordercolor=black cellspacing=5 ><tr>
<th>ISBN</th>
<th>Kitap Adı</th></tr>';
while($satir=mysqli_fetch_array($sonuc))
{
echo '<tr>';
echo '<td>'.$satir['ISBN'].'</td>';
echo '<td>'.$satir['KitapAdi'].'</td>';
echo '<td> <a href="kitapsil.php?ISBN='.$satir['ISBN'].'" onclick="return uyari();">Sil</a> </td>';
echo '</tr>';
}
echo'</table>';
?>
</div>
<div> <p>Kitap Ödünç Alma</p>
<?php 
 include ("baglan.php");
 $sql="SELECT DISTINCT kitaplar.ISBN, kitaplar.KitapAdi, kitapkutuphane.Miktar ,
        kutuphaneler.KutuphaneAdi,kutuphaneler.KutuphaneID 
        FROM kitapkutuphane 
        INNER JOIN kitaplar ON kitapkutuphane.ISBN=kitaplar.ISBN
        INNER JOIN kutuphaneler ON kitapkutuphane.KutuphaneID=kutuphaneler.KutuphaneID";
$sonuc=mysqli_query($baglanti,$sql); 
echo '<table border=1 bordercolor=black cellspacing=5 ><tr>
<th>ISBN</th>
<th>Kitap Adı</th> 
<th>Miktar</th>
<th>Kütüphane Numarası</th>
<th>Kütüphane Adı</th>
<th></th></tr>';


while($satir=mysqli_fetch_array($sonuc))
{
echo '<tr>';
echo '<td>'.$satir['ISBN'].'</td>';
echo '<td>'.$satir['KitapAdi'].'</td>';
echo '<td>'.$satir['Miktar'].'</td>';
echo '<td>'.$satir['KutuphaneID'].'</td>';
echo '<td>'.$satir['KutuphaneAdi'].'</td>';
echo '<td><a href="Odunc.php?ISBN='.$satir['ISBN'].' " onclick="uyari()">
          Ödünç Al</a></td>';
echo '</tr>';
}
echo'</table>';
?>
</div>
 </body>
 </html>