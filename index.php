
<!DOCTYPE html>
<html lang="ru">
<head>

  <meta charset="utf-8">
  <title>Form</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> -->
  <!--Roboto-->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/main.css">

  <link rel="icon" type="image/png" href="images/newfavicon.png">

</head>
<body>
  
<div class="container">
<div class="row">
  <div class="one column hid">1</div>
  <div class="ten columns block"> 
  <h1>Форма добавления стран</h1>
   <h2>Список стран</h2>
   
    <form action = "index.php" method = "post">
  <div class="row">
    <div class="six columns">
      <label for="exampleEmailInput">Введите название страны:</label>
          <input class="u-full-width bottom" type="text" placeholder="Enter country name:" name="name">
    </div>
  </div>
 <p><input type="submit" class="gray" value="Добавить страну" name="submit">
  <input class="button-primary" type="submit" name="show" value="Показать все страны "></p>
</form>

<?php
  require_once('connect.php');

$option = [
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
];

  $pdo = new PDO($dsn,$dbuser,$pass,$option);


  if((isset($_POST['submit'])) && (!empty($_POST['name']))) {
      
    $pdo->query("INSERT INTO country_table (name) VALUES ('$_POST[name]')");
      
  } else {
      
     echo ' Введите название страны' ."<br>";
      
  }
   //вроде заработала вставка страны

  
if(isset($_POST['show'])){
   
    $data = $pdo->query("SELECT * FROM country_table")->fetchAll();
    
  foreach ($data as $row) {
      echo $row['name']."<br>\n";
  }
 
}

?>

 </div> 
  <div class="one column hid">1</div>
</div>
<br>
<br>
</div><!--//container-->
</body>
</html>
