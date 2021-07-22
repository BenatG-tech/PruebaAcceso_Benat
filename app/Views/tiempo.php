<?= $this->extend('app') ?>

<?= $this->section('content') ?>

<?php
$apiKey = "35b7633f13c307ae8f1b5f73c253aa17";
$cityId = "3114472";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=es&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<section>
	<div class="report-container bg-light p-3">
        <h1>Tiempo en <?php echo $data->name; ?></h1>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("j F, Y",$currentTime); ?></div>
            <div>
                <?php echo ucwords($data->weather[0]->description); ?>
                <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon"/>
            </div>
        </div>
        <div class="weather-forecast">
            <span class="max-temperature"> T. máxima: <?php echo $data->main->temp_max; ?>°C</span>
            <span class="min-temperature"> T. mínima: <?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humedad: <?php echo $data->main->humidity; ?> %</div>
            <div>Viento: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>