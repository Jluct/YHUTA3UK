<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 12.02.2016
 * Time: 8:09
 */

 require_once("/../include/header.php"); ?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Авторизация
            </div>
            <div class="panel-body">
                <form method="post" action="?ctrl=cabinet&action=Authorisation" target="_parent">
                    <input type="text" class="form-control" name="login" placeholder="Имя"/>
                    <input type="password" class="form-control" name="password" placeholder="Пароль"/>

                <div class="row">
                    <div class="col-xs-6">
                        <input type="button" value="Забыл пароль" class="btn btn-block btn-info">
                    </div>
                    <div class="col-xs-6">
                        <input type="submit" class="btn btn-block btn-primary">
                </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-block btn-success">Регистрация</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>

<?php require_once("/../include/footer.php"); ?>
