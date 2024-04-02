<?php
require_once __DIR__ . '/lib/DataSource.php';
$database = new DataSource();
$sql = "SELECT lastname , firstname, job FROM users WHERE `job` LIKE 'police'";
$result = $database->select($sql);

?>
<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<style>
        .modiform {
    /* max-width: 200px; */
    z-index: 10;
    position: relative;
    margin: auto;
    align-items: center;
    text-align: center;
}
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
/*
.home {
    fill: #000000;
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
}*/
button, input[type=submit] {
    padding: 5px 5px;
    font-size: 1em;
    width: 132px;
    cursor: pointer;
    color: #000000;
    border-color: #000000 #000000 #000000;
    margin: 10px;
    border: none;
}
select{
    margin-top: 30px;
    margin-bottom: 40px;
	text-align: center;
	color: #585858;
}
.home {
    background-color: #000;
    position: fixed;
    bottom: 5px;
    left: 37.4%;
    height: 3px;
    width: 150px;
    border-radius: 2em;
}
#pds ,#fdc{
    background-color: #80d572;
}
#pdc{
    background-color: #d59272;
}
#fds{
    background-color: #d57272;
}
        </style>
	<body>
	<div class="header"><p class="left"><p id="p1"></p><p class="center"></p></p><p class="right">Spimods<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/>  </svg><a> 100%</a><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M544 160v64h32v64h-32v64H64V160h480m16-64H48c-26.51 0-48 21.49-48 48v224c0 26.51 21.49 48 48 48h512c26.51 0 48-21.49 48-48v-16h8c13.255 0 24-10.745 24-24V184c0-13.255-10.745-24-24-24h-8v-16c0-26.51-21.49-48-48-48zm-48 96H96v128h416V192z"/></svg></i></i></p></div>
<div class="modiform">
	

	<div>
		<div class="row">
			<select id="liste" name="liste" id='liste'>  
			<option value="">Nom</option>  

	<?php
if (is_array($result) || is_object($result)) {
    foreach ($result as $key => $value) {
            $name = $result[$key]["lastname"] ;
            $nom = $result[$key]["firstname"];
            $recap = "{$name}%20{$nom}"
    
        ?>
 	<?php
echo "<option value =".$recap.">".$nom ," ", $name."</option>";
?>
 <?php

    }
}
?>
</select>
		</div>

<button name="pds" id="pds" >Prise de service</button>
<button name="pdc" id="pdc" >Prise coupure</button>
<button name="fdc" id="fdc" >Fin de coupure</button>
<button name="fds" id="fds" >Fin de service</button>
</div>
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

<div class="home" onclick="window.location='prix.html'"></div>




<script>

function getSelectValue(selectId)
{
    var selectElmt = document.getElementById(selectId);
	return selectElmt.options[selectElmt.selectedIndex].value;
}

var element = document.getElementById('liste').value;

document.getElementById('pds').onclick = function () {
    var selectValue = getSelectValue('liste');
    if( selectValue == "" ){
    }else{
        window.location.href="prisedeservicebdd.php?liste=" + selectValue + "&type=prise"
}
}
document.getElementById('pdc').onclick = function () {
    var selectValue = getSelectValue('liste');
    if( selectValue == "" ){
    }else{
        window.location.href="prisedeservicebdd.php?liste=" + selectValue + "&type=pause"
}
}
document.getElementById('fdc').onclick = function () {
    var selectValue = getSelectValue('liste');
    if( selectValue == "" ){
    }else{
        window.location.href="prisedeservicebdd.php?liste=" + selectValue + "&type=reprise"
}
}
document.getElementById('fds').onclick = function () {
    var selectValue = getSelectValue('liste');
    if( selectValue == "" ){
    }else{
        window.location.href="prisedeservicebdd.php?liste=" + selectValue + "&type=fin"
}
}
</script>
</body>
</html>