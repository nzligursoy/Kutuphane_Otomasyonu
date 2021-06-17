<?php 
 include ("baglan.php");  
 session_start();
 extract($_POST);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kütüphane Otomasyonu</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/sourcesanspro-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v8">
	<div class="page-content">
		<div class="form-v8-content">
			<div class="form-left">
				<!--<img src="images/form-v8.jpg" alt="form">-->
			</div>
			<div class="form-right">
				<div class="tab">
					<div class="tab-inner">
						<button class="tablinks" onclick="openCity(event, 'sign-up')" id="defaultOpen">Kayıt Ol</button>
					</div>
					<div class="tab-inner">
						<button class="tablinks" onclick="openCity(event, 'sign-in')">Giriş Yap</button>
					</div>
				</div>
				<form class="form-detail" action="kayitol.php" method="post">
					<div class="tabcontent" id="sign-up">
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="UyeAdi" id="UyeAdi" class="input-text" required>
								<span class="label">Üye Adı</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="UyeSoyadi" id="UyeSoyadi" class="input-text" required>
								<span class="label">Üye Soyadı</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="Telefon" id="Telefon" class="input-text" required>
								<span class="label">Telefon No</span>
								<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="E_posta" id="E_posta" class="input-text" required>
								<span class="label">E_posta</span>
		  						<span class="border"></span>
							</label>
						</div>
									
						<div class="form-row-last">
							<input type="submit" name="register" class="register" value="Kayıt Ol">
						</div>
					</div>
				</form>
				<form class="form-detail" action="girisyap.php" method="post">
					<div class="tabcontent" id="sign-in">
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="UyeAdi" id="UyeAdi" class="input-text" required>
								<span class="label">Üye Adı</span>
		  						<span class="border"></span>
							</label>
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								<input type="text" name="Telefon_1" id="Telefon_1" class="input-text" required>
								<span class="label">Telefon No</span>
		  						<span class="border"></span>
							</label>
						</div>
						
						<div class="form-row-last">
							<input type="submit" name="register" class="register" value="Giriş Yap">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function openCity(evt, cityName) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>
</body>
</html>

