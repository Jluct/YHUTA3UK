<?php

/**
 * Created by PhpStorm.
 * User: Listopadov
 * Date: 03.02.2016
 * Time: 10:55
 */



class pagination
{
    private $table, $number, $element_out, $out;

    private $tpl_parent = "<nav><ul class=\"pagination\">%s</ul></nav>";
    private $tpl_element = "<li><a href=\"%s\">%s</a></li>";

    private $tpl_previous = " <li>
      <a href=\"?page=%s\" aria-label=\"Previous\">
        <span aria-hidden=\"true\">&laquo;</span>
      </a>
    </li>";

    private $tpl_next = "<li>
      <a href=\"?page=%s\" aria-label=\"Next\">
        <span aria-hidden=\"true\">&raquo;</span>
      </a>
    </li>";

    private $pagination_control = false;

    private $count_element;

    private $hidden_element;

    /*
     * @int - текуцая страница пагинации
     */
    private $page_number;

    /**
     * pagination constructor.
     * @param $table - имя таблицы, строки которой будет подсчитывать метод getPaginationNumber.
     * По умолчанию подсчёт ведётся по полю имя_таблицы+"_id"
     * @param $number - число элементов, которое будет на странице
     * @param $page_number - текущая страница, не обязательный параметр,
     * если отсутствует необъодимость в элементах управления
     */
    function __construct($table, $number, $page_number = 0)
    {
        if (!isset($table) || !isset($number))
            return false;


        if($page_number==0) {
            $this->tpl_previous = "";
            $this->tpl_next = "";
        }

        $this->table = (string)$table;
        $this->number = intval($number);
        $this->page_number = (int)$page_number;


    }

    /**
     * @param string $tpl_parent - шаблон родителя, который будет содержать элемент пагинации.
     * В нём производится одна замена, на элементы пагинации
     * @return pagination
     */
    public function setTplParent($tpl_parent)
    {
        $this->tpl_parent = $tpl_parent;
        return $this;
    }

    /**
     * @param string $tpl_element - шаблон элемента пагинации. В нём производится 2 замены:
     * 1. Ссылка
     * 2. Номер элемента пагинации
     * @return pagination
     */
    public function setTplElement($tpl_element)
    {

        $this->tpl_element = $tpl_element;
        return $this;
    }

    /**
     * @param string $tpl_previous - шаблон эл. управления "Назад"
     * @return pagination
     */
    public function setTplPrevious($tpl_previous)
    {
        $this->page_number?$this->tpl_previous = $tpl_previous:'';
        return $this;
    }

    /**
     * @param string $tpl_next - шаблон эл. управления "Вперёд"
     * @return pagination
     */
    public function setTplNext($tpl_next)
    {
        $this->page_number?$this->tpl_next = $tpl_next:'';
        return $this;
    }

    /**
     * @param boolean $pagination_control - указывает использование контроля пагинации
     * false - не использовать (по умолчанию)
     * true - использовать
     * @return pagination
     */
    public function setPaginationControl($pagination_control)
    {
        $this->pagination_control = $pagination_control;
        return $this;
    }

    /**
     * @param mixed $count_element - определяет максимально число элементов пагинации. По умолчанию - все
     * Автоматически изменяет значение setPaginationControl на true
     * Принимает целое число. Построение пагинации идёт по следующему образцу:
     * [элемент управления][1][...][4][5][6][...][10][элемент управления]
     * @param string $hidden_element - не обязательный параметр, шаблон скрытых элементов пагинации
     * @return pagination
     */
    public function responsePagination($count_element, $hidden_element = "<li><a href=\"#\">...</a></li>")
    {
        $this->count_element = (int)$count_element;
        $this->hidden_element = (string)$hidden_element;
        $this->pagination_control = true;
        return $this;
    }

    /**
     * Подсчитывает элементы в таблице, по полю имя_таблицы + "_id"
     * @return int - число страниц по формуле число_записей_в_таблице/$number,
     * округлённое до целого в наибольшую сторону
     * если текущая_страница/-1 =0 || >$number елемент управления пагинацией удаляется
     */
    private function getPaginationNumber()
    {

        $table = new db_connect();
        $data = $table->getDb()->query("SELECT COUNT( " . $this->table . "_activ ) FROM  " . $this->table . "")->fetch();
        $count_table = $data[0];

        $number = (int)ceil($count_table / $this->number);

        if($this->page_number>=$number || $number===1){
            $this->tpl_next = '';
        }
        if(($this->page_number-1)<=0 || $number===1){
            $this->tpl_previous = '';
        }

        return $number;
    }


    /**
     * Генерирует элементы пагинации.
     * Если включён контроль пагинации, добавляет элементы управления в начало и конец
     * @count - не обязательный параметр, кол-во страниц
     */
    private function element($count = 0)
    {
        $number = $count ? $number = $count : $this->getPaginationNumber();
        $this->pagination_control ? $this->element_out .= sprintf($this->tpl_previous,$this->page_number-1): '';
        for ($i = 0; $i < $number; $i++) {
            $this->element_out .= sprintf($this->tpl_element, $i + 1, $i + 1);
        }
        $this->pagination_control ? $this->element_out .= sprintf($this->tpl_next,$this->page_number+1 ): '';

    }

    /**
     * Генерирует элементы пагинации, скрывая лишнии элементы. Вместо лишних элементов оставляет 1 элемент с точками
     * или элемент-шаблон
     */
    private function chantingNumberElement()
    {
        $number = $this->getPaginationNumber();
        if ($number <= $this->count_element + 2) {
            $this->element($number);
            return;
        }

        $min_visible_elem = ceil($this->page_number - $this->count_element / 2);
        $max_visible_elem = floor($this->page_number + $this->count_element / 2);

        $this->element_out .= sprintf($this->tpl_previous,$this->page_number-1);
        $flags = true;
        for ($i = 1; $i < $number + 1; $i++) {

            if ($i === 1 || $i === $number) {
                $this->element_out .= sprintf($this->tpl_element, $i, $i);
                $flags = true;
            } elseif ($i >= $min_visible_elem && $i <= $max_visible_elem) {
                $this->element_out .= sprintf($this->tpl_element, $i, $i);
                $flags = true;
            } else {
                if($flags){
                    $flags = false;
                }else{continue;}
                $this->element_out .= sprintf($this->hidden_element, $i, $i);

            }

        }

        $this->element_out .= sprintf($this->tpl_next,$this->page_number+1 );
    }


    function __toString()
    {
        $this->count_element?$this->chantingNumberElement():$this->element();
        return sprintf($this->tpl_parent, $this->element_out);
    }


}