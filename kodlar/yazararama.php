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
<a href="yazar.php"><div ><i class="fa fa-user-circle-o" aria-hidden="true"></i> Yazar &nbsp;İşlemleri</div></a><br><br>
</body>
</html>
<?php
//mysql bağlantı
include ("baglan.php");
//aranacak yazarın adı alınır
$YazarNo=$_POST["YazarNo"];

echo "<h2>Yazarın Kitapları</h2><br>";
//sql sorgu kodu
$sql="SELECT DISTINCT kitaplar.KitapAdi,yazarlar.YazarAdi,kitaplar.ISBN FROM kitaplar,yazarlar,yazarkitap
WHERE yazarlar.YazarNo='$YazarNo' AND yazarkitap.YazarNo='$YazarNo'
AND kitaplar.ISBN=yazarkitap.ISBN";
   
   $cevap=mysqli_query($baglanti,$sql);
   //cevap doğru değilse hata verir
   if(!$cevap){
       echo "Hata:" .mysqli_error($baglanti);
   }
   
   echo "<table border=1 bgcolor=#fffacd align=center>";
   echo "<tr>";
   echo "<th>ISBN</th>";
   echo "<th>Kitap Adı</th>";
   echo "</tr>";

   //veri tabanından çekilen değerler ile tablo oluşturulur
   while($gelen=mysqli_fetch_array($cevap)){
    echo "<tr><td>".$gelen['ISBN']."</td>";
    echo "<td>".$gelen['KitapAdi']."</td></tr>";
}
echo "</table>";
?>