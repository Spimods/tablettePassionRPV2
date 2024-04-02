<?php
if (count($_POST) > 0) {
    require_once __DIR__ . '/lib/DataSource.php';
    $database = new DataSource();
    $sql = "INSERT INTO users (signup_name,userName,firstName, lastName) VALUES (?,?,?,?)";
    $paramType = 'ssss';
    $paramValue = array(
        $_POST["signup-name"],
        $_POST["userName"],
        $_POST["firstName"],
        $_POST["lastName"]
    );
    $database->insert($sql, $paramType, $paramValue);
}
?>

<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./css/form.css">
		<link rel="stylesheet" href="./css/style.css">
	</head>
	<style>
            body{
background-image: url(backtable.jpg);
background-repeat:no-repeat ;
background-position-x: center;
background-size: cover;
}
.header {
    color: #ffffff;
    font-family: 'Rubik', sans-serif;
    width: 100%;
    top: 0;
    position: fixed;
    height: 25px;
    font-size: 6px;
	fill:#ffffff;
    margin-left: 6px;
}
.left p {
	display: inline-block;
	left: 0;
	position: relative;
	left: 2px;
    top: -2000px;
}
svg{
	color: #fff;
	margin-top: 0.3em;
    margin-left: 0.5em;
}
.center{
	display: inline-block;
	left: 0;
	position: relative;
    left: 230px;
	top: -18px;
}
.right{
	fill:#ffffff;
	display: inline-block;
	left: 0;
	position: relative;
	left: 510px;
	top: -42px;
}
.right a{
	margin-left: 0.5em;
	fill:#ffffff;
	text-decoration: none;
	color: #ffffff;

}
.home {
    display: flex;
    top: 50px;
    width: 30px;
    margin-top: -36px;
    padding: 0;
    height: auto;
    position: relative;
    flex-wrap: nowrap;
}
.home:hover{
    fill: #72D5CA;
}
        </style>
	<body>
	<div class="header"><p class="left"><p id="p1"></p><p class="center"></p></p><p class="right">Spimods<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/>  </svg><a> 100%</a><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M544 160v64h32v64h-32v64H64V160h480m16-64H48c-26.51 0-48 21.49-48 48v224c0 26.51 21.49 48 48 48h512c26.51 0 48-21.49 48-48v-16h8c13.255 0 24-10.745 24-24V184c0-13.255-10.745-24-24-24h-8v-16c0-26.51-21.49-48-48-48zm-48 96H96v128h416V192z"/></svg></i></i></p></div>
<div class="home" onclick="window.location='citoyen.php'"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"/></svg></div>
<div class="modiform">
	<form name="frmUser" method="post" action="">
	<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
	<p>
	<div>
		<div class="row">
			<label for="signup-name">Nom <span class="error-color"
				id="signup-name_error"></span>
			</label><input type="text" name="signup-name" id="signup-name"
				required>
		</div>
		<div class="row">
			<label>Prénom</label><input type="text" name="userName"
				class="txtField" required>
		</div>
		<div class="row">
			<label>Facture</label><input type="text" name="firstName"
				class="txtField">
		</div>
		<div class="row">
			<label>N° de téléphone</label><input type="text" name="lastName"
				class="txtField">
		</div>
		<div class="row">
			<input type="submit" name="submit" value="Ajouter" class="btnSubmit">
		</div>
	</div>
</form>
</div>
<script type="text/javascript">
        var myDate = new Date();
        var myDay = myDate.getDay();
        day = myDate.getDate()
        var weekday = ['Sun', 'Mon', 'Tue','Wed', 'Thur', 'Fri', 'Sat'];

        const months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];

        let month = months[myDate.getMonth()];

        var hours = myDate.getHours();
        
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12;
        
        var minutes = myDate.getMinutes();
        minutes = minutes < 10 ? '0' + minutes : minutes;
        
        var myTime = hours + " : " + minutes +  " " + ampm +  " " +  " " + weekday[myDay]+  " " +  " " + month +  " " + day;
        var current_date = myTime
        
        document.getElementById("p1").innerHTML = current_date;
</script>
	</body>
</html>