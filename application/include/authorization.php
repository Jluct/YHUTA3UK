<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 04.01.2016
 * Time: 8:31
 */

?>
<a href="#" data-toggle="modal" data-target="#myModal">Авторизуйтесь</a>
или <a href="?ctrl=registration&action=Registration">Зарегистрируйтесь</a>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Авторизация</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="?ctrl=authorization&action=StartSession" target="_parent">
                    <input type="text" class="form-control" name="login" placeholder="Имя"/>
                    <input type="password" class="form-control" name="password" placeholder="Пароль"/>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--</form>-->
<!--<a href="?ctrl=registration&action=Registration"><button class="btn btn-block btn-success">Регистрация</button></a>-->