<?php require_once(__DIR__."/../include/header.php"); ?>

    <div class="row">
        <div class="big_photo">
            <img src="images/shutterstock.jpg">

            <div class="hello">

                <div>Lorem Ipsum ! Is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="slider_section col-sm-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="slider_section carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="../../images/zwalls.ru-27962.jpg" alt="...">

                        <div class="carousel-caption">
                            <span class="slider_text">Талантливые педагоги!</span>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../../images/hdwallpapersimage.jpg" alt="...">

                        <div class="carousel-caption">
                            <span class="slider_text">Обширный материал!</span>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../../images/resize-img.jpg" alt="...">

                        <div class="carousel-caption">
                            <span class="slider_text" style="color: black;">Дружная компания!</span>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row news">
                <div class="col-sm-6 col-md-6">
                    <div class="actual_news">
                        <div>
                            <? echo "<h3><a href=\"?ctrl=news&action=GetArticle&article=" . $news[0]['id'] . "\">" . $news[0]['news_header'] . "</a></h3>" ?>
                            <? echo $news[0]['news_date'] ?>
                        </div>
                        <img src="/../../<? echo $news[0]['news_img'] ?>"/>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 small_news">
                    <div class="row">
                        <div class="col-xs-6">
                            <img src="/<? echo $news[1]['news_img'] ?>">
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[1]['id'] . "\">" . $news[1]['news_header'] . "</a>" ?>
                            <? echo $news[1]['news_date'] ?>
                        </div>
                        <div class="col-xs-6">
                            <img src="/<? echo $news[2]['news_img'] ?>">
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[2]['id'] . "\">" . $news[2]['news_header'] . "</a>" ?>
                            <? echo $news[2]['news_date'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <img src="/<? echo $news[3]['news_img'] ?>">
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[3]['id']. "\">" . $news[3]['news_header'] . "</a>" ?>
                            <? echo $news[3]['news_date'] ?>
                        </div>
                        <div class="col-xs-6">
                            <img src="/<? echo $news[4]['news_img'] ?>">
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[4]['id'] . "\">" . $news[4]['news_header'] . "</a>" ?>
                            <? echo $news[4]['news_date'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once(__DIR__."/../include/footer.php"); ?>
