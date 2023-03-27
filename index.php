<?php

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!empty($_GET['save'])) {
    print('Спасибо, результаты сохранены.');
  }
  include('form.php');
  exit();
}

$errors = FALSE;
if (empty($_POST['fio']) || preg_match("/^[А-ЯЁ][а-яё]*$/", $_POST['fio'])) {
  print('Корректно заполните имя.<br/>');
  $errors = TRUE;
}

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  print('Корректно заполните email.<br/>');
  $errors = TRUE;
}

if (empty($_POST['year']) || !is_numeric($_POST['year']) || !preg_match('/^\d+$/', $_POST['year'])) {
  print('Корректно заполните год.<br/>');
  $errors = TRUE;
}

if (strlen($_POST['biography'] || preg_match("/^[А-ЯЁ][а-яё]*$/", $_POST['fio']))==0){
  print('Корректно заполните биографию.<br/>');
  $errors = TRUE;
}

if (!isset($_POST['check'])){
  print('Примите условия контракта!<br/>');
  $errors = TRUE;
}

if ($errors) {
  exit();
}


$user = 'u52858'; 
$pass = '6454527'; 
$db = new PDO('mysql:host=localhost;dbname=u52858', $user, $pass,
  [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 


try {
  $stmt = $db->prepare("INSERT INTO req (name, year, email, gender, limbs, biography) VALUES (:name, :year, :email, :gender, :limbs, :biography)");
  $stmt->bindParam(':name', $_POST['fio']);
  $stmt->bindParam(':year', $_POST['year']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':gender', $_POST['gender']);
  $stmt->bindParam(':limbs', $_POST['limbs']);
  $stmt->bindParam(':biography', $_POST['biography']);
  echo('запись1<br/>');
  $stmt->execute();

  $temp = $db->lastInsertId();

  foreach ($_POST['abilities'] as $ability){
    $stmt1 = $db->prepare("INSERT INTO conn (reqID, abilities) VALUES (:reqID, :abilities)");
    $stmt1->bindParam(':reqID', $temp);
    $stmt1->bindParam(':abilities', $ability);
    
    $stmt1->execute();
    echo('запись2<br/>');
  }
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

header('Location: ?save=1');
?>