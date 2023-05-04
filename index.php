<?php
    class Weather {
        public $date;
        public $temp;
        public $name;
        public $description;
        public $icon;

        function set_date($date) {
            $this->date = $date;
        }
        function set_temp($temp) {
            $this->temp = round($temp-273.15);
        }
        function set_name($name) {
            $this->name = $name;
        }
        function set_description($description) {
            $this->description = $description;
        }
        function set_icon($icon) {
            $this->icon = "https://openweathermap.org/img/wn/$icon@4x.png";
        }
    }

    $forecast = array();

    $url = "https://api.openweathermap.org/data/2.5/forecast?lat=23.710&lon=90.407&appid=c908b1113a2c788367ba7b7e051be74e";
    $content = file_get_contents($url);
    $clima = json_decode($content);

    $list = $clima->list;

    $dateTest = "";
    

    foreach ($list as $weather) {
        $dateTemp = explode(" ", trim($weather->dt_txt))[0];
        if ($dateTemp != $dateTest) {
            
            $currentWeather = new Weather ();
            $currentWeather->set_date(date("d M, Y", $weather->dt));
            $currentWeather->set_temp($weather->main->temp); 
            $currentWeather->set_name($weather->weather[0]->main); 
            $currentWeather->set_description($weather->weather[0]->description); 
            $currentWeather->set_icon($weather->weather[0]->icon); 

            array_push($forecast, $currentWeather);

            $dateTest = $dateTemp;
        }
    }

    $today = array_shift($forecast);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Weather App</title>
</head>
<body class="background-dark">
    <div class="row container-fluid p-0 m-0 min-vh-100">
    <div class="col-12 col-md-4 background-light d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="img">
            <img src="<?=$today->icon?>" alt="">
        </div>
        <div class="py-5 text-white">
            <span class="temp-text"><?=$today->temp?></span>
            <span class="h1">&#8451;</span>
        </div>
        <div class="pb-5 text-white-50 h1">
            <?=$today->name?>
        </div>
        <div class="pb-5 text-white-50 h6 fw-normal">
            <span class="pe-3">Today</span> <?=$today->date?>
        </div>
    </div>
        <div class="mx-auto col-12 col-md-8 container row p-md-5 text-white pe-0">
            <div class="row">
                <div class="col-12 col-sm-4 my-3">
                    <div class="p-4 background-light h-100 d-flex justify-content-center align-items-center flex-column">
                        <div><?=$forecast[0]->date?></div>
                        <div>
                            <img src="<?=$forecast[0]->icon?>" alt="">
                        </div>
                        <div class="h4"><?=$forecast[0]->temp?> &#8451;</div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 my-3">
                    <div class="p-4 background-light h-100 d-flex justify-content-center align-items-center flex-column">
                        <div><?=$forecast[1]->date?></div>
                        <div>
                            <img src="<?=$forecast[1]->icon?>" alt="">
                        </div>
                        <div class="h4"><?=$forecast[1]->temp?> &#8451;</div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 my-3">
                    <div class="p-4 background-light h-100 d-flex justify-content-center align-items-center flex-column">
                        <div><?=$forecast[2]->date?></div>
                        <div>
                            <img src="<?=$forecast[2]->icon?>" alt="">
                        </div>
                        <div class="h4"><?=$forecast[2]->temp?> &#8451;</div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 my-3">
                    <div class="p-4 background-light h-100 d-flex justify-content-center align-items-center flex-column">
                        <div><?=$forecast[3]->date?></div>
                        <div>
                            <img src="<?=$forecast[3]->icon?>" alt="">
                        </div>
                        <div class="h4"><?=$forecast[3]->temp?> &#8451;</div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 my-3">
                    <div class="p-4 background-light h-100 d-flex justify-content-center align-items-center flex-column">
                        <div><?=$forecast[4]->date?></div>
                        <div>
                            <img src="<?=$forecast[4]->icon?>" alt="">
                        </div>
                        <div class="h4"><?=$forecast[4]->temp?> &#8451;</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>