<?php
    $url = "https://api.openweathermap.org/data/2.5/forecast?lat=23.710&lon=90.407&appid=c908b1113a2c788367ba7b7e051be74e";
    $content = file_get_contents($url);

    echo $content;
?>