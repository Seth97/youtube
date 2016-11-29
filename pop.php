<?php


$name = trim($_POST['video']);

$name = explode(" ", $name);
$name = implode("+", $name);

echo "<pre>";
var_dump($name);
echo "</pre>";


function send_req($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT,				"Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 		FALSE);
curl_setopt($ch, CURLOPT_HEADER,				false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,		true);
curl_setopt($ch, CURLOPT_URL,					$url);
curl_setopt($ch, CURLOPT_REFERER,				$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,		TRUE);
$out = curl_exec($ch);
curl_close($ch);
return $out;
}

$url = "https://www.googleapis.com/youtube/v3/search?sp=CAM%253D&part=snippet&q=$name&type=video&maxResults=3&key=AIzaSyDdu2ZBRB7ZWvLYnArIvrUCqqYA7ES9zYg";
$res = json_decode(send_req($url));

echo "<pre>";
print_r($res);
echo "</pre>";

print <<<HERE

<object id="youtubeColorRu" width="460" height="370"><param name="movie" value="http://www.youtube.com/v/1QhIalNU4wo?version=2&color1=0x3D6894&color2=0x3C0108&border=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/1QhIalNU4wo?version=2&color1=0x3D6894&color2=0x3C0108&border=0" type="application/x-shockwave-flash" width="460" height="370" allowscriptaccess="always" allowfullscreen="true" ></embed></object>

HERE;

echo "название ролика, автор, дата публикации";

?>


<!doctype html>
<html lang="ru">
<head>

    <link href = "style.css">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action = "pop.php" method = "post">

    <input type = "text" name = "video" pattern = "[A-Za-zА-Яа-яЁё]+?" placeholder = "Введите название ролика/роликов" required>

    <input type = "submit" value = "искать">




</form>

<ul class="accordion">
    <li class="accordion_item">
        <input type="radio" class="accordion_toggle" name="accordion-01" id="toggle-01" checked hidden>
        <label class="accordion_trigger" for="toggle-01">Заголовок панели 1</label>
        <div class="accordion_target">
            <p>
                Здесь размещаете любое содержание....
            </p>
        </div>
    </li>
    <li class="accordion_item">
        <input type="radio" class="accordion_toggle" name="accordion-01" id="toggle-02" hidden>
        <label class="accordion_trigger" for="toggle-02">Заголовок панели 2</label>
        <div class="accordion_target">
            <p>
                Здесь размещаете любое содержание....
            </p>
        </div>
    </li>
    <li class="accordion_item">
        <input type="radio" class="accordion_toggle" name="accordion-01" id="toggle-03" hidden>
        <label class="accordion_trigger" for="toggle-03">Заголовок панели 3</label>
        <div class="accordion_target">
            <p>
                Здесь размещаете любое содержание....
            </p>
        </div>
    </li>
    <li class="accordion_item">
        <input type="radio" class="accordion_toggle" name="accordion-01" id="toggle-04" hidden>
        <label class="accordion_trigger" for="toggle-04">Заголовок панели 4</label>
        <div class="accordion_target">
            <p>
                Здесь размещаете любое содержание....
            </p>
        </div>
    </li>
</ul>


</body>
</html>