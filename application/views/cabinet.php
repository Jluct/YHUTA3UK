<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 14:07
 */

require_once("/../include/header.php"); ?>
    <!-- autorisation -->
    <section class="container">
    <div class="row">
        <div class="col-md-9">
            <h1>Личный кабинет</h1>

            <h2>Ваш статус:<? echo $_SESSION['user']['user_status']?> !</h2>
            <table class="table table-striped">
                <tr>
                    <td>Кафедра</td>
                    <td><?echo $_SESSION['student']['courses_name']?></td>
                </tr>
                <tr>
                    <td>Специальность</td>
                    <td><?echo $_SESSION['student']['specialty_name']?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-3">
            <?php require_once($userMenu); ?>

        </div>
    </div>
    </section>


<?php require_once("/../include/footer.php"); ?>