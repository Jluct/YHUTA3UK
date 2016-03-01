<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 26.02.2016
 * Time: 10:58
 */
require_once(__DIR__."/../include/header.php"); ?>

<section class="container">
    <div class="row">
        <div class="col-sm-12">
            <? echo $data; ?>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <a href="?ctrl=subscription&action=SubscriptionById&id=<? echo $id; ?>"><button class="btn btn-success btn-block">Записаться!</button></a>
        </div>
        <div class="col-sm-3"></div>
    </div>
</section>

<?php require_once(__DIR__."/../include/footer.php"); ?>
