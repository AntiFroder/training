<?php

$countries = $databaseCountry->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить страну</title>
</head>

<body>
    <a href='/'>Главная</a><br><br>

    <form name="insert_country_form" method="post">
        <input type="text" name="country_insert">
        <input type="submit" value="Добавить">
    </form>
    <?php
    $name_country = $_POST['country_insert'];

    if ($name_country != NULL) {
        $databaseCountry->create($name_country);
        header("Location: /countries");
    }

    foreach ($countries as $key => $country) {
    ?>
        <form name="delete_country_form" method="post">
            <input type="hidden" name="id" value="<?php echo $country[0] ?>">
            <label><?php echo $country[1] ?></label>
            <input type="submit" name="delete_country" value="Удалить">
        </form>
        <br>
    <?php
    }
    if (isset($_POST["delete_country"])) {

        $databaseCountry->delete('country_id', $country[0]);
        header("Location: /countries");
    }
    ?>

</body>

</html>