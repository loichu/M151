<?php

//require_once './config.php';

class Page
{
    private $page_title;
    private $views = array();
    private $data = array();

    function __construct($title)
    {
        $this->page_title = $title;
    }

    function setTitle($title)
    {
        $this->page_title = $title;
    }

    function addView($tmpl)
    {
        array_push($this->views, $tmpl);
    }

    function addData($key, $var)
    {
        $this->data->$$key = $var;
    }

    function render($data = array())
    {
        $data->title = $this->page_title;

        foreach ($this->views as $view) {
            include("./public/view/" . $view);
        }
    }
}

?>
