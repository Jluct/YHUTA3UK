<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 12.02.2016
 * Time: 14:12
 */

require_once(__DIR__ . "/../include/header.php"); ?>

    <section class="container">
        <div class="row">
            <div class="col-sm-2 category">
                <form>
                    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Поиск</button>
      </span>
                        <input type="text" class="form-control" placeholder="Поиск...">
                    </div>
                </form>
                <? echo $categoryList; ?>
            </div>
            <div class="col-sm-10">
                <? echo $wisdom; ?>

                <? $page = new pagination($count_data, 10, $page);
                                $page->setTplElement("<li><a href='".$path."&page=%s'>%s</a></li>");
//                $page->setTplPrevious(" <li>
//      <a href=\"?ctrl=news&action=News&page=%s\" aria-label=\"Previous\">
//        <span aria-hidden=\"true\">&laquo;</span>
//      </a>
//    </li>");
//                $page->setTplNext("<li>
//      <a href=\"?ctrl=news&action=News&page=%s\" aria-label=\"Next\">
//        <span aria-hidden=\"true\">&raquo;</span>
//      </a>
//    </li>");
                //                $page->responsePagination(3);
                echo $page;

                ?>

            </div>
        </div>
    </section>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>