<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 27.01.2016
 * Time: 13:31
 */

require_once(__DIR__."/../include/header.php"); ?>

    <section class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class=\"btn-group-vertical\" role=\"group\">
                    <? echo $typeMenu; ?>
                </div>
            </div>
            <div class="col-sm-10">
                <table class="table table-striped">
                    <tr>
                        <td>Категория</td>
                        <td>Субкатегория</td>
                        <td>Имя</td>
                        <td>Кол-во учеников</td>
                    </tr>
                    <? echo $wisdomData; ?>
                </table>
            </div>
        </div>
    </section>

<?php require_once(__DIR__."/../include/footer.php"); ?>