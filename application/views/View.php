<?php
/**
 * Created by PhpStorm.
 * User: инкогнито
 * Date: 03.01.2016
 * Time: 18:16
 */

class View {
    protected $data = [];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key];
    }

    public function render($template) {
        extract($this->data);
        $this->data = [];
        ob_start();
        require($template);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
} 