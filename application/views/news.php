<?php require_once("/../include/header.php"); ?>
    <!-- autorisation -->
    <section class="content">
        <? echo $news; ?>

        <!-- content END-->

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <? $page = new pagination("news", 5, $page);
                $page->setTplElement("<li><a href=\"?ctrl=news&action=News&page=%s\">%s</a></li>");
                $page->setTplPrevious(" <li>
      <a href=\"?ctrl=news&action=News&page=%s\" aria-label=\"Previous\">
        <span aria-hidden=\"true\">&laquo;</span>
      </a>
    </li>");
                $page->setTplNext("<li>
      <a href=\"?ctrl=news&action=News&page=%s\" aria-label=\"Next\">
        <span aria-hidden=\"true\">&raquo;</span>
      </a>
    </li>");
                $page->responsePagination(3,'news');
                echo $page;

                ?>

            </div>
            <div class="col-sm-3"></div>
        </div>
    </section>
    <!-- footer begin -->

<?php require_once("/../include/footer.php"); ?>