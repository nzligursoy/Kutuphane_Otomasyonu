<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödünç İşlemi</title>
    <script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
    <style>
    body{
    background-color: #eeaeee;
    text-align: center;
    }
    </style>
</head>
<body>
<center>
    <a href="kitap.php"><div id="logo"><i class="fa fa-book  ikon" aria-hidden="true"></i>
    Kitap &nbsp;İşlemleri </div></a>
<h2>Ödünç İşlemi</h2></br>
<?php 
    include ("baglan.php");
    session_start();
 $sql="SELECT * FROM kitaplar WHERE ISBN=".$_GET['ISBN'];
$cevap2 = mysqli_query($baglanti,$sql);     
if(!$cevap2 ){
    echo '<br>Hata:' . mysqli_error($baglanti);
}
$gelen=mysqli_fetch_array($cevap2);
?>
<form action="<?php $_PHP_SELF ?>" method="POST">
Üye Adı<input type="text" name="UyeAdi" />    <br /><br />
Üye Soyadı:<input type="text" name="UyeSoyadi" /> <br /><br />
Telefon :<input type="text" name="Telefon" /> <br /></br>
E_posta  : <input type="email" name="E_posta" />  <br /></br>
Alış Tarihi : <input type="date" name="AlisTarihi"></br></br>
Teslim Tarihi  : <input type="date" name="TeslimTarihi"></br></br>
ISBN :<input type="text" name="ISBN" value=<?php echo $gelen['ISBN'] ; ?> />  </br></br >
<input type="submit" value="KAYDET"/>
</form>
</center>
</body>
</html>

<?php    
include "baglan.php";
if( (isset($_POST['AlisTarihi']) && isset($_POST['TeslimTarihi']))){
$AlisTarihi=$_POST["AlisTarihi"];
$TeslimTarihi=$_POST["TeslimTarihi"];
$ISBN=$_GET['ISBN'];
$sql4="INSERT INTO islemler  (TeslimTarihi,AlisTarihi) VALUES ('$TeslimTarihi','$AlisTarihi')";
$cevap15=mysqli_query($baglanti,$sql4);

$ISBN=$gelen['ISBN'];
$sql12="UPDATE islemler SET ISBN='$ISBN' WHERE AlisTarihi='$AlisTarihi' AND TeslimTarihi='$TeslimTarihi' ";
$cevap12=mysqli_query($baglanti,$sql12);

if(! ($cevap15  && $cevap12)){
    echo "Hata:" .mysqli_error($baglanti);
}
else{
    echo "<center><h3>Ödünç alma işleminiz başarı ile yapıldı.</h3></center>";  
   
}
}
 ?>