<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Ekleme</title>
    <script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
<style>
    body{
        text-align: center;
    }
</style>
</head>
<body>
    
</body>
</html>
<?php 
    include ("baglan.php");
    extract($_POST);
    if( empty($KategoriAdi) ){
        echo "Boş alan bırakmayınız !";
    }
    else{
        $sql="INSERT INTO kategoriler".
        "(KategoriAdi)".
        "VALUES ('$KategoriAdi')";
        $cevap=mysqli_query($baglanti,$sql);
    if(!$cevap){
        echo "Hata:" .mysqli_error($baglanti);
    }
    else{
    }
}
echo "<h3>Kategori Adı ekleme başarı ile yapıldı. &nbsp; </br><a href='kategori.php'><div id='logo'><i class='fa fa-newspaper-o  ikon'
             aria-hidden='true'></i>Kategori &nbsp;İşlemleri </div></a> </h3>"; 

  ?>