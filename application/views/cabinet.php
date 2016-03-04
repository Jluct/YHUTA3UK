<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 14:07
 */

require_once(__DIR__."/../include/header.php"); ?>
    <!-- autorisation -->
    <section class="container">
    <div class="row">
        <div class="col-md-9">
            <h2>Личный кабинет</h2>

            <h3>Ваш статус:<? echo $_SESSION['user']->status?> !</h3>
            <hr>
            <? if($data) echo $data;?>

        </div>
        <div class="col-md-3">
            <?php require_once(__DIR__.'/../include/userMenu.php'); ?>

        </div>
    </div>
    </section>


<?php require_once(__DIR__."/../include/footer.php"); ?>