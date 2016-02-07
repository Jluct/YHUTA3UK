<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 11.01.2016
 * Time: 15:30
 */

require_once(__DIR__."/../include/header.php"); ?>
    <section class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                        <? $message ?>
                </div>
                <button class="btn btn-block btn-info">Назад</button>
            </div>
            <div class="col-md-3"></div>
        </div>
    </section>
<?php require_once(__DIR__."/../include/footer.php"); ?>