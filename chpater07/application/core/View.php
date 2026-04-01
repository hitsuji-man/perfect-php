<?php

class View
{
    protected $base_dir;
    protected $defaults;
    protected $layout_variables = array();

    /**
     * コンストラクタ
     *
     * @param string $base_dir
     * @param array $defaults
     */
    public function __construct($base_dir, $defaults = array())
    {
        $this->base_dir = $base_dir;
        $this->defaults = $defaults;
    }

    /**
     * レイアウトに渡す変数を指定
     *
     * @param string $name
     * @param mixed $value
     */
    public function setLayoutVar($name, $value)
    {
        $this->layout_variables[$name] = $value;
    }
}