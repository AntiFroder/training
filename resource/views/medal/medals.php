<?php

$country_fetch = $databaseCountry->get();
$athlete_fetch = $databaseAthlete->get();
$sport_fetch = $databaseSport->get();
$type_fetch = $databaseTypeMedal->get();
$medal_fetch = $databaseMedal->get();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить медаль</title>
</head>

<body>
    <a href='/'>Главная</a><br><br>
    <br>
    <form action="/createMedal" method="post">
        <select name="medalsID">
            <option>Выберите медаль</option>
            <?php
            foreach ($type_fetch as $typeKey => $type) {

                echo "<option value='$type[0]'>$type[1]</option>";
            }
            ?>
        </select>
        <select name="countriesID">
            <option>Выберите страну</option>
            <?php
            foreach ($country_fetch as $countryKey => $country) {

                echo "<option value='$country[0]'>$country[1]</option>";
            }
            ?>
        </select>
        <select name="sportsID">
            <option>Выберите спорт</option>
            <?php
            foreach ($sport_fetch as $sportKey => $sport) {

                echo "<option value='$sport[0]'>$sport[1]</option>";
            }
            ?>
        </select>
        <select  name='athletesID[]' multiple>
            <option>Выберите спортсмена</option>
            <?php
            foreach ($athlete_fetch as $athleteKey => $athlete) {

                echo "<option value='$athlete[0]'>$athlete[1]</option>";
            }
            ?>
        </select>
        <input type="submit" value="Отправить" name="insert_medal">
    </form>

</body>

</html>