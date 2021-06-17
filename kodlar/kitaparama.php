<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Arama</title>
    <style>
    body{
    background-color: #eeaeee;
    }
    </style>
</head>
<body>
<center><a href="kitap.php"><div id="logo"><i class="fa fa-book  ikon" aria-hidden="true"></i>
    Kitap &nbsp;İşlemleri </div></a></center>
    <?php 
    include ("baglan.php");
    session_start();
    extract($_POST);
    $sql2="SELECT * FROM kitaplar ORDER BY KitapAdi, ISBN ";
    $cevap2=mysqli_query($baglanti,$sql2);  
    if(! $cevap2){
        echo 'Hata:'.mysqli_error($baglanti);
    }
    echo '<center><h3>Sistemdeki kitaplar</h3>
    <table border=1><tr>
    <th>ISBN</th>
    <th>Kitap Adı</th></tr>';
  
while($sonuc=mysqli_fetch_array($cevap2)){
    echo '<tr><td>' .$sonuc['ISBN']. '</td>
    <td>' .$sonuc['KitapAdi']. '</td></tr>';
}

echo'</table></center>';
        echo'<center>
        <h3>Kitap Arama</h3>(Sistemde kayıtlı kitapların ISBN ile arama yapabilirsiniz.)<form action="" method="POST"></br>
        <input type="text" name="ISBN" placeholder="ISBN" />
        <input type="submit" value="ARA"/></form></br>';
    if (isset($_POST['ISBN'])){
    $ISBN=$_POST['ISBN'];
    $sql="SELECT DISTINCT kitaplar.KitapAdi ,yazarlar.YazarAdi,yazarlar.YazarSoyadi,kategoriler.KategoriAdi,yayinevleri.YayineviAdi
                     FROM kitaplar,yazarkitap,yazarlar,kitapkategori,kategoriler,yayinevleri
                        WHERE kitaplar.ISBN='$ISBN'  
                            AND yazarkitap.ISBN='$ISBN'
                            AND yazarlar.YazarNo=yazarkitap.YazarNo
                            AND kitapkategori.ISBN='$ISBN' 
                            AND kategoriler.KategoriID=kitapkategori.KategoriID
                            AND yayinevleri.YayineviID=kitaplar.YayineviID";
    $cevap=mysqli_query($baglanti,$sql);   
if($ISBN == ""){
        echo('Boş arama yaptınız');
}
        echo'<center>Arama Sonucu :</br>';
        echo ' <table border=1>';
        echo ' <tr><th>Kitap Adı</th><th>Yazar Adı</th><th>Yazar Soyadı</th><th>Kategori</th><th>YayınEvi</th></tr>';
if($cevap){
    while($sonuc=mysqli_fetch_array($cevap)){
        echo '<tr><td>' .$sonuc["KitapAdi"]. '</td>';
        echo '<td>' .$sonuc["YazarAdi"]. '</td>';
        echo '<td>' .$sonuc["YazarSoyadi"]. '</td>';
        echo '<td>' .$sonuc["KategoriAdi"]. '</td>';
        echo '<td>' .$sonuc["YayineviAdi"]. '</td></tr>';
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

