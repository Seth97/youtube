<!doctype html>
<html lang="ru">
<head>

    <link rel="stylesheet" href="/css/style.css">

    <style>



    </style>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>


<?php


$select_choice = $_POST['choise'];
$count = $_POST['count'];
$key = "AIzaSyDdu2ZBRB7ZWvLYnArIvrUCqqYA7ES9zYg"; // Ваш ключ... или мой
$search = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$_POST['video'].'&key='.$key.'&maxResults='.$count.'&type=video&order='.$select_choice; // Первоначальная информация с запросом, чтобы уменьшить количество кода


if( $curl = curl_init() and $_POST['search']) {
    curl_setopt($curl, CURLOPT_URL, $search);  // maxResults - количество материала order - сортировка по: viewCount - число просмотров, Date - дата загрузки type = video только видео
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $out = curl_exec($curl);

    $obj = json_decode($out,true);









    echo "<div class='accordion'>";



for($i = 0; $i < $count; $i++) {



        $video_name = $obj ['items'][$i]['snippet']['title'] . "<br>";
        $date =  $obj ['items'][$i]['snippet']['publishedAt'] . "<br>";
        $author = $obj ['items'][$i]['snippet']['channelTitle'] . "<br>";
        $video_id = $obj['items'][$i]['id']['videoId'];





print <<<HERE


        <section id="$i">
         <h2><a href="#$i">$video_name, автор этого видео: $author, выложено в $date</a></h2>
        <div>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/$video_id" frameborder="0" allowfullscreen>
            </iframe>

         </div>
       </section>


HERE;
            

        
        





    }



echo "</div>";

    curl_close($curl);


}

?>



<body>

<form action = "index.php" method = "post">

    <input type = "text" name = "video" pattern = "[A-Za-zА-Яа-яЁё]+?" placeholder = "Введите название ролика/роликов" required>

    <input type = "submit" name = 'search' value = "искать">

</form>



</body>
</html>