<?php
/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 06.01.2016
 * Time: 14:07
 */

require_once(__DIR__ . "/../include/header.php"); ?>
    <!-- autorisation -->

    <div class="row">
        <div class="col-md-9">
            <h2>Личный кабинет</h2>

            <h3>Ваш статус : <? if ($_SESSION['user']->status === 'student') {
                    echo "студент";
                } elseif ($_SESSION['user']->status === 'teacher') {
                    echo "преподаватель";
                } ?> </h3>
            <hr>
                        <? if($data){ echo $data;}else{
            echo "<h4>Вы имеете следующие права:</h4>
            <ul>";

              if($_SESSION['user']->status === 'student') {
                    echo "<li>Запись на учебный материал</li>
                            <li>Изучение учебного материала</li>
                            <li>Просмотр пройденного материала</li>
                            <li>Редактирование личных данных</li>
";
                } elseif ($_SESSION['user']->status === 'teacher') {
                    echo "<li>Создание учебного материала</li>
                            <li>Редактирование учебного матрериала</li>
                            <li>Редактирование личных данных</li>";
                }} ?>
            </ul>

        </div>
        <div class="col-md-3">
            <?php require_once(__DIR__ . '/../include/userMenu.php'); ?>

        </div>
    </div>


<?php require_once(__DIR__ . "/../include/footer.php"); ?>