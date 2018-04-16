<?php
include('db.php');
$file = find::get_file();
$get_limit = find::limit_articles_on_pages($_GET["page"]);
$start = $get_limit['start'];
$end = $get_limit['end'];
?>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>title</th>

    </tr>
    </thead>
    <tbody>

    <?php

    for ($i = $start; $i <= $end;$i++):?>

        <?php if(!$file[$i]): ?>
            <tr>
                <td>
                    <input class="readonly" readonly type="text" name="array" placeholder="Введите значение" ondblclick="input()">
                </td>
            </tr>
        <?php
            break;
        endif?>
        <tr>
            <td>
                <input class="change" data_id="<? echo $i; ?>" readonly type="text" name="array" value="<? echo $file[$i]; ?>" >
            </td>
        </tr>


    <?php
    endfor
    ?>



    </tbody>
</table>
