<?php
$total_pages = find::get_paginator();

if(empty($page)) $page = 1;
if(!empty($total_pages)):
    for($i=1; $i<=$total_pages; $i++):
        if($i == $page):?>
            <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
        <?php else:?>
            <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
        <?php endif;?>
    <?php endfor;
endif;
?>