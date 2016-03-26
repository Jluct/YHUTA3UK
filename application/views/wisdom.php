<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 12.02.2016
 * Time: 14:12
 */

require_once(__DIR__ . "/../include/header.php"); ?>

        <div class="row">
            <div class="col-sm-2 category">
                <? echo $categoryList; ?>
            </div>
            <div class="col-sm-10">
                <? echo $wisdom;

                $page = new pagination($count_data, 10, $page);
                    $page->setTplElement("<li><a href='".$path."&page=%s'>%s</a></li>");
                    echo $page;
                ?>

            </div>
        </div>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>