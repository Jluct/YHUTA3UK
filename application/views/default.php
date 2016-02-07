<?php require_once(__DIR__."/../include/header.php"); ?>
<!-- header end -->
<!-- content -->


<? //require_once ("load.php") ?>
<!-- SLIDER -->
<section class="container">
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
                        <img src="images/PhotoTest.png" alt="...">

                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/PhotoTest.png" alt="...">

                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/PhotoTest.png" alt="...">

                        <div class="carousel-caption">
                            ...
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
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[0]['news_id'] . "\">" . $news[0]['news_header'] . "</a>" ?>
                            <? echo $news[0]['news_date'] ?>
                        </div>
                        <img src="/../../images/<? echo $news[0]['news_img'] ?>"/>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 small_news">
                    <div class="row">
                        <div class="col-xs-6">
                            <img src="/../../images/<? echo $news[1]['news_img'] ?>">
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[1]['news_id'] . "\">" . $news[1]['news_header'] . "</a>" ?>
                            <? echo $news[1]['news_date'] ?>
                        </div>
                        <div class="col-xs-6">
                            <img src="/../../images/<? echo $news[2]['news_img'] ?>">
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[2]['news_id'] . "\">" . $news[2]['news_header'] . "</a>" ?>
                            <? echo $news[2]['news_date'] ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <img src="/../../images/<? echo $news[3]['news_img'] ?>">
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[3]['news_id'] . "\">" . $news[3]['news_header'] . "</a>" ?>
                            <? echo $news[3]['news_date'] ?>
                        </div>
                        <div class="col-xs-6">
                            <img src="/../../images/<? echo $news[4]['news_img'] ?>">
                            <? echo "<a href=\"?ctrl=news&action=GetArticle&article=" . $news[4]['news_id'] . "\">" . $news[4]['news_header'] . "</a>" ?>
                            <? echo $news[4]['news_date'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer begin -->
<?php require_once(__DIR__."/../include/footer.php"); ?>
