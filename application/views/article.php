<?php
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 04.01.2016
 * Time: 20:59
 */
require_once(__DIR__."/../include/header.php");
?>

<!-- autorisation -->
<section class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2><? echo $article['news_header'] ?></h2>
            <img src="../../images/<?php echo $article['news_img'] ?>">

            <p><? echo $article['news_body'] ?></p>
            <label><? echo $article['news_date'] ?></label>
        </div>
    </div>
</section>


<?php require_once(__DIR__."/../include/footer.php"); ?>
