<?php
$servername = "localhost";
$database = "lspd";
$username = "code";
$password = "root";
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


try { 
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
} catch (PDOException $error) {
}
$name = $_GET['liste'];
$total = $_GET['total'];
$msg = $_GET['message'];

    $my_Insert_Statement = $my_Db_Connection->prepare("SELECT firstName FROM fiche WHERE `signup_name`= :name ;");
    $my_Insert_Statement->bindParam(":name", $name);


    $name = $_GET['liste'];


    $my_Insert_Statement->execute();
    $donnees = $my_Insert_Statement->fetch();


    if ($my_Insert_Statement->execute()) {

        $my_Insert_Statement2 = $my_Db_Connection->prepare("UPDATE   set firstName = :totaldirect WHERE signup_name = :name");

        $totaldirect = $donnees['firstName'] + $total;
        $my_Insert_Statement2->bindParam(":name", $name);
        $my_Insert_Statement2->bindParam(":totaldirect", $totaldirect);

        $my_Insert_Statement2->execute();


        if ($my_Insert_Statement2->execute()) {
            $my_Insert_Statement3 = $my_Db_Connection->prepare("INSERT INTO dépôts (nom, element, prix) VALUES (:name, :msg , :total)");
            $my_Insert_Statement3->bindParam(":name", $name);
            $my_Insert_Statement3->bindParam(":msg", $msg);
            $my_Insert_Statement3->bindParam(":total", $total);

            $my_Insert_Statement3->execute();
        } else {
        }
    }else{

    }
    
?>
<meta http-equiv="refresh" content="1; url=index.html" />
