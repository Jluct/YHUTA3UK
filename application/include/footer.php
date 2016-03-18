<?php
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 03.01.2016
 * Time: 16:09
 */
?>
</section>
<footer class="head">
    <div class="container container-footer">
        <div class="row">
            <div class="col-sm-6">
                <ul class="nav">
                    <?
                    $lightMenu->ul_tpl = "<ul class=\"footer\">";
                    $lightMenu->li_tpl = "<li><a href='%s'>%s%s</a>%s</li>";
                    $lightMenu->caret = "";
                    echo $lightMenu->render(); ?>
                </ul>

            </div>
            <div class="col-sm-6">
                <?
                $bigMenu->ul_tpl = "<ul class=\"footer\">";
                $bigMenu->li_tpl = "<li><a href='%s'>%s</a>%s%s</li>";
                $bigMenu->caret = "";
                echo $bigMenu->render(); ?>
            </div>
        </div>
    </div>

</footer>

</body>
</html>