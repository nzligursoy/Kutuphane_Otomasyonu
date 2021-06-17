<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/c20485228a.js" 
crossorigin="anonymous">
</script>
<style>
    *{
        box-sizing: border-box;
    }
    body{
        font-family: Impact, 'Haettenschweiler', 'Arial Narrow Bold', sans-serif;
    margin: 0;
    background: url(kutuphane1.jpg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
    }
    #menu{
        height: 200px;
        padding: 0 30px;
    }
    #logo{
        text-align: center;
        font-size: 60px;
        line-height: 180px;
        color:white;
        font-weight: bold;
    }
    nav{
        text-align: center;
        line-height: 100px;
    }
    nav a:link{
        text-decoration: none;
        margin-right: 45px;
        color: white;
        font-weight: bolder;
    }
    nav a:hover{
        border-bottom: 5px solid black;
        
    }
    a:visited{
        color:white
    }
    .ikon{
        margin-right: 10px;
        font-size: 20px ;
    }
  a{
      font-size: 30px;
  }
 
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kütüphane Otomasyonu</title>
</head>
<body>
 <?php
 include "baglan.php";
 ?> 
<section id="menu">
<div id="logo">KÜTÜPHANE &nbsp;  &nbsp;OTOMASYONU</div>
<nav>
    <a href="kutuphane.php"><i class="fa fa-external-link  ikon" aria-hidden="true" ></i>Kütüphane İşlemleri</a>
    <a href="kitap.php"><i class="fa fa-book  ikon" aria-hidden="true"></i>Kitap İşlemleri</a>  </br>
    <a href="kategori.php"><i class="fa fa-newspaper-o  ikon" aria-hidden="true" ></i>Kategori İşlemleri</a>
    <a href="yazar.php"><i class="fa fa-user-circle-o  ikon" aria-hidden="true" ></i>Yazar İşlemleri</a>  </br>
    <a href="uye.php"><i class="fa fa-user ikon" aria-hidden="true" ></i>Üye İşlemleri</a></br>
    <a href="index.php"><i class="fa fa-sign-out ikon"  aria-hidden="true" ></i>Çıkış</a>
</nav>
</section>
</body>
</html>