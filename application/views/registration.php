<?php
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 10.01.2016
 * Time: 20:22
 */

require_once(__DIR__."/../include/header.php"); ?>
    <!-- autorisation -->
<section class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <? if($userDataArray){
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button><strong>Внимание!</strong> '.$message.'
                </div>';
            }
            ?>
            <form method="post" action="?ctrl=registration&action=AddUser">
                <input class="form-control" value="<? echo $userDataArray['login']? $userDataArray['login']:''; ?>" type="text" name="login" placeholder="Логин">
                <input class="form-control" value="<? echo $userDataArray['password']? $userDataArray['password']:''; ?>" type="password" name="password" placeholder="Пароль">
                <input class="form-control" value="<? echo $userDataArray['dblPassword']? $userDataArray['dblPassword']:''; ?>" type="password" name="dblPassword" placeholder="Повторите пароль">
                <input class="form-control" value="<? echo $userDataArray['email']? $userDataArray['email']:''; ?>" type="email" name="email" placeholder="Емаил">
                <input class="form-control" value="<? echo $userDataArray['user_name']? $userDataArray['user_name']:''; ?>" type="text" name="user_name" placeholder="Имя">
                <input class="form-control" value="<? echo $userDataArray['user_surname']? $userDataArray['user_surname']:''; ?>" type="text" name="user_surname" placeholder="Фамилия">
                <input class="btn btn-block btn-info" type="submit"/>
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>
</section>

<?php require_once(__DIR__."/../include/footer.php"); ?>