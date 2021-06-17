 <!DOCTYPE html>
 <html lang="en">
 <head>
 <script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kategori İşlemleri</title>
     <style>
        body{
            background: url(kitapresmi.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            color: #551a8b;
        }
        a{
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
    
    <?php 
     include ("baglan.php");
     session_start();
     ?>
      <div><p>Kategori Ekleme</p>   
    <form action="kategoriekle.php" method="POST">
     Kategori Adı  : <input type="text" name="KategoriAdi"></br></br>
    <input type="submit" value="KAYDET">
    </form> </div>
  <?php 
    $sql2="SELECT * FROM kategoriler ORDER BY KategoriAdi, KategoriID ASC";
    $cevap2=mysqli_query($baglanti,$sql2);  
    echo '<p>Sistemde Kayıtlı Kategoriler</p>
    <table border=1><tr>
    <th>Kategori Adı</th>
    <th>KategoriID</th></tr>';
while($sonuc=mysqli_fetch_array($cevap2)){
    echo '<tr><td>' .$sonuc["KategoriID"]. '</td>
    <td>' .$sonuc["KategoriAdi"]. '</td></tr>';
}
echo'</table>';
echo'<p>Kategori Arama</p>
    <font size="4px" color="black">(Sistemde kayıtlı kategorilerin ID ile o kategoriye ait kitapların aramasını yapabilirsiniz.)</font>
    <form action="" method="POST"></br> <input type="text" name="KategoriID" placeholder="KategoriID" />
    <input type="submit" value="ARA"/></form></br>';
    if (isset($_POST['KategoriID'])){
    $KategoriID=$_POST['KategoriID'];
$sql="SELECT DISTINCT kitaplar.KitapAdi ,kategoriler.KategoriAdi,kitaplar.ISBN
    FROM kitaplar,kategoriler,kitapkategori
    WHERE kategoriler.KategoriID='$KategoriID' AND kitapkategori.KategoriID='$KategoriID' AND
    kitaplar.ISBN=kitapkategori.ISBN "; 
   
   if($KategoriID == ""){
    echo('Boş arama yaptınız');
}  
$cevap=mysqli_query($baglanti,$sql);   
    echo'<center>Arama Sonucu :</br>';
    echo ' <table border=1>';
    echo ' <tr><th>Kategori Adı</th><th>ISBN</th><th>Kitap Adı</th></tr>';
if($cevap){
while($sonuc1=mysqli_fetch_array($cevap)){
   echo '<tr><td>' .$sonuc1["KategoriAdi"]. '</td>';
   echo '<td>' .$sonuc1["ISBN"]. '</td>';
    echo '<td>' .$sonuc1["KitapAdi"]. '</td></tr>';
}
}
else{
echo 'Arama yapılamadı';
}
echo '</table></center>';
}       
 mysqli_close($baglanti); 
?>
</body>
</html>