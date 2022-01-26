<?php
$medal = $_GET['id'];
$Medal = $databaseMedal->countMedal();
print_r($Medal);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <?php     
    if ($medal == 'gold') {
        print_r('Золотые медали страны ');
    }
    elseif ($medal == 'silver') {
        print_r('Серебряные медали страны ');
    }
    else {
        print_r('Бронзовые медали страны ');
    }
    ?>
    </h1>

</body>
</html>