<?php
    $url = "https://api.openweathermap.org/data/2.5/forecast?lat=23.710&lon=90.407&appid=c908b1113a2c788367ba7b7e051be74e";
    $content = file_get_contents($url);
    $clima = json_decode($content);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Weather App</title>
</head>
<body>
    <div class="container my-5">
        <h1>App</h1>
    </div>
</body>
</html>