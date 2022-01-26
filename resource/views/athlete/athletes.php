<?php

$athletes = $databaseAthlete->get();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить спортсмена</title>
</head>

<body>
    <a href='/'>Главная</a><br><br>
    <form method="post">
        <input type="text" name="athletes">
        <input type="submit" value="Добавить">
    </form>
    <?php
    $nameAthlete = $_POST['athletes'];

    if ($nameAthlete != NULL) {
        $databaseAthlete->create($nameAthlete);
        header("Location: /athletes");
    }
    foreach ($athletes as $key => $athlete) {
    ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php $athlete[0] ?>">
            <label><?php echo $athlete[1] ?></label>
            <input type="submit" name="delete_athlete" value="Удалить">
        </form>
        <br>
    <?php
    }
    if (isset($_POST["delete_athlete"])) {
        $databaseAthlete->delete('athlete_id', $athlete[0]);
        header("Location: /athletes");
    }
    ?>
</body>

</html>