<?php
$sort_list = array (
    'country_name_asc' => '`country_name`',
    'country_name_desc' => '`country_name` DESC',
    'gold_asc' => '`gold`',
    'gold_desc' => '`gold` DESC',
    'silver_asc' => '`silver`',
    'silver_desc' => '`silver` DESC',
    'bronze_asc' => '`bronze`',
    'bronze_desc' => '`bronze` DESC',
    'medal_count_asc' => '`medal_count`',
    'medal_count_desc' => '`medal_count` DESC'
);
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
    $sort_sql = $sort_list[$sort];
} else {
    $sort_sql = reset($sort_list);
}
$countMedal = $databaseMedal->countMedal($sort_sql);




function sort_link_th($title, $a, $b) {
    $sort = $_GET['sort'];

    if ($sort == $a) {
        return '<a class="activate" href="?sort=' .$b. '">' .$title. '<i>▲</i></a>';
        
    } elseif ($sort == $b){
        return '<a class="activate" href="?sort=' .$a. '">' .$title. '<i>▼</i></a>';
        
    }
    else {
        return '<a href="?sort=' .$a. '">' .$title. '</a>';
        
    }    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympiad</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr align="center">
                <th>Место</th>
                <th><?php echo sort_link_th('Страна', 'country_name_asc', 'country_name_desc'); ?></td>
                <th><?php echo sort_link_th('1 место', 'gold_asc', 'gold_desc'); ?></td>
                <th><?php echo sort_link_th('2 место', 'silver_asc', 'silver_desc'); ?></td>
                <th><?php echo sort_link_th('3 место', 'bronze_asc', 'bronze_desc'); ?></td>
                <th><?php echo sort_link_th('Всего медалей', 'medal_count_asc', 'medal_count_desc'); ?></td>
            </tr>
        </thead>
        <?php
        $i = 0;        
        foreach ($countMedal as $row): $i++;?>
        <tr>
            <td><?php print_r ($i); ?></td>
            <td><?php print_r ($row[0]); ?></td>            
            <td><a href="/statistic?id=gold"><?php print_r ($row[1]); ?></a></td>
            <td><a href="/statistic?id=silver"><?php print_r ($row[2]); ?></a></td>
            <td><a href="/statistic?id=bronze"><?php print_r ($row[3]); ?></a></td>
            <td><?php print_r ($row[4]); ?></a></td>
        </tr>
        <?php endforeach; ?>
        
                <!-- <td> Вывод нескольких фамилий
                    <?php                    
                    foreach ($medalInnerMany as $key => $medal) {                        
                        if ($medal1[$i][0] == $medal[0]) {
                            print_r($medal[1] . ' ');
                        }                        
                    }             
                    print($medalInner[$i][3]);
                    ?>
                </td>
            </tr> -->
        <?php
        #} 
        ?>
    </table>
    <br>
    <a href="/countries"> Добавить страну <br>
        <a href="/medals"> Добавить медаль <br>
            <a href="/sports"> Добавить вид спорта <br>
                <a href="/athletes"> Добавить спортсмена <br>

</body>

</html>