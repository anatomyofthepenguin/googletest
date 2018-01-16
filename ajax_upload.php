<?php 
require_once 'db_connect.php';

$name = htmlspecialchars($_POST['first_name']);
$fam = htmlspecialchars($_POST['second_name']);
$age = htmlspecialchars($_POST['age']);

$result1 = $link->prepare("INSERT INTO users VALUES (NULL, ?, ?, ?)");
if (!$result1->bind_param("ssd", $name, $fam, $age)){
	echo $link->error;
};  
if(!$result1->execute()){
	echo $link->error;
}
else {
	echo "Данные успешно добавлены!";
}
echo $link->error;
$result1->close();
$link->close();
?>