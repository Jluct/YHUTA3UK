<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 9:16
 */

require_once(__DIR__."/../include/header.php"); ?>
    <!-- autorisation -->
    <section class="container">
        <div class="row">
            <div class="col-sm-9">
                <? echo $specialty[0] ?>
            </div>

        </div>
        <section class="row">
            <div class="col-sm-12">
                <?php echo $specialty[1] ?>
            </div>
        </section>
    </section>

<?php require_once(__DIR__."/../include/footer.php"); ?>