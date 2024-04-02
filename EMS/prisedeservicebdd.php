<?php
$servername = "185.200.246.160";
$database = "esxlegacy_182ae5";
$username = "code";
$password = "!P@Ss10nRP!";
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


try { 
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
} catch (PDOException $error) {
}
$name = $_GET['liste'];

if ($_GET['type'] == "prise"){
    $my_Insert_Statement = $my_Db_Connection->prepare("UPDATE prisedeservice set nom = :liste WHERE id = 1");
}
else if ($_GET['type'] == "fin"){
    $my_Insert_Statement = $my_Db_Connection->prepare("UPDATE prisedeservice set nom = :liste WHERE id = 7");
}
else if ($_GET['type'] == "pause"){
    $my_Insert_Statement = $my_Db_Connection->prepare("UPDATE prisedeservice set nom = :liste WHERE id = 13");
}
else if ($_GET['type'] == "reprise"){
    $my_Insert_Statement = $my_Db_Connection->prepare("UPDATE prisedeservice set nom = :liste WHERE id = 15");
}
$my_Insert_Statement->bindParam(":liste", $name);
$my_Insert_Statement->execute();
   
?>
<meta http-equiv="refresh" content="1; url=index.html" />
