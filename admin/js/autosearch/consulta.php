<?php
$pdo = new PDO('mysql:host=localhost;dbname=outsourcing;charset-utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$like = "'"."%".$_GET["query"]."%"."'";
$sql = "SELECT * FROM proveedores WHERE ruc_proovedor LIKE $like";

$stm = $pdo->prepare($sql);
$stm->execute();
$res = $stm->fetchAll(PDO::FETCH_OBJ);

echo json_encode($res);
?>