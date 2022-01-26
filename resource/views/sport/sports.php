<?php
$sports = $databaseSport->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить вид спорта</title>
</head>

<body>
    <a href='/'>Главная</a><br><br>
    <form method="post">
        <input type="text" name="sport">
        <input type="submit" value="Добавить">
    </form>
    <?php

    $name_sport = $_POST['sport'];

    if ($name_sport != NULL) {
        $databaseSport->create($name_sport);
        header("Location: /sports");
    }
    foreach ($sports as $key => $sport) {
    ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php $sport[0] ?>">
            <label><?php echo $sport[1] ?></label>
            <input type="submit" name="delete_sport" value="Удалить">
        </form>
        <br>
    <?php
    }
    if (isset($_POST["delete_sport"])) {
        $databaseSport->delete('sport_id', $sport[0]);
        header("Location: /sports");
    }
    ?>
</body>
</html>