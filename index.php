<!doctype html>
<html lang="ru">
<head>

    <style>

        .accordion {
            background-color: #eee;
            border: 1px solid #ccc;
            width: 600px;
            padding: 10px;
            margin: 50px auto;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -moz-box-shadow: 0 1px 0 #999;
            -webkit-box-shadow: 0 1px 0 #999;
            box-shadow: 0 1px 0 #999;
        }
        .accordion section {
            border-bottom: 1px solid #ccc;
            margin: 5px;
            background-color: #fff;
            background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
            background-image: -webkit-linear-gradient(top, #fff, #eee);
            background-image:    -moz-linear-gradient(top, #fff, #eee);
            background-image:     -ms-linear-gradient(top, #fff, #eee);
            background-image:      -o-linear-gradient(top, #fff, #eee);
            background-image:         linear-gradient(top, #fff, #eee);
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }
        .accordion h2, .accordion p {
            margin: 0;
        }
        .accordion p {
            padding: 10px;
        }
        .accordion h2 a {
            display: block;
            position: relative;
            font: 14px/1 'Trebuchet MS', 'Lucida Sans';
            padding: 10px;
            color: #333;
            text-decoration: none;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }
        .accordion h2 a:hover {
            background: #fff;
        }
        .accordion h2 + div {
            height: 0;
            overflow: hidden;
            -moz-transition: height 0.3s ease-in-out;
            -webkit-transition: height 0.3s ease-in-out;
            -o-transition: height 0.3s ease-in-out;
            transition: height 0.3s ease-in-out;
        }
        .accordion :target h2 a:after {
            content: '';
            position: absolute;
            right: 10px;
            top: 50%;
            margin-top: -3px;
            border-top: 5px solid #333;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
        }
        .accordion :target h2 + div {
            height: 315px;
            width: 560px;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>


<?php

error_reporting(E_ALL);

$key = "AIzaSyDdu2ZBRB7ZWvLYnArIvrUCqqYA7ES9zYg"; // Ваш ключ
$search = $_POST['video']; // Первоначальная информация с запросом, чтобы уменьшить количество кода


if( $curl = curl_init() and $_POST['search']) {
    curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=кулинария&key=AIzaSyDdu2ZBRB7ZWvLYnArIvrUCqqYA7ES9zYg&maxResults=20'); // maxResults - количество материала order - сортировка по: viewCount - число просмотров, Date - дата загрузки type = video только видео
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $out = curl_exec($curl);

    $obj = json_decode($out,true);


    echo "<pre>";
    var_dump($obj);
    echo "</pre>";

    $video_id = $obj['items'][1]['id']['videoId'];
    $video_id = $obj['items'][2]['id']['videoId'];

    echo "<div class='accordion'>";


for($i = 0; $i < 20; $i++) {


        $video_id = $obj['items'][$i]['id']['videoId'];
        $author = $obj['items'][$i]['channelTitle'];
        echo $video_id;





print <<<HERE


        <section id="$i">
         <h2><a href="#$i">Заголовок $i</a></h2>
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