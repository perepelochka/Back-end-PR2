<?php
$apikey = "AIzaSyB9_gWUS1fSvxxOdVB8KbtkXi9gzz_OrOk";
$cx = "8038a0b86bd654016";
$search = "php";

if (isset($_GET['search'])) {
    $search = $_GET['search'];

}
$url = "https://www.googleapis.com/customsearch/v1?key={$apikey}&cx={$cx}&q={$search}";
$ch = curl_init ( ) ; // відкрити сеанс cURL
curl_setopt ($ch , CURLOPT_URL , $url ); // встановити параметр $ url
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Повернути відповідь в рядок
$resultJson = curl_exec ($ch ); // Виконати запит
curl_close ($ch); // Закрити сеанс cURL
$arr = json_decode($resultJson, true);
//var_dump($resultJson);
//die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Поиск информации</title>
    <link rel="stylesheet" href="search.css">

</head>
<body>
  <div class="container">

    <h1> Mоя поисковая система </h1>
    <form method="GET" action="/main.php" class="search">
        <label for="search" ></label>
        <input type="text" id="search" name="search" placeholder="Поиск..." class="input"/>
        <button type="submit" class=button/>Перейти</button>


    </form>

  </div>

  <?php
     foreach ($arr['items'] as $item) {
         echo '<h2>'.$item['title'] . '</h2>';
         echo "<a href='{$item['link']}'>".$item['link'] . '</a>';

     }


  ?>

</body>
</html>

