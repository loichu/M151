<?php
require_once "./model/fonctionsDB.inc.php";

class Page
{
    private $page_title;
    private $views = array();

    public $Model;
    public $data;
    public $needModel = false;

    function __construct($title)
    {
        $this->init();

        $this->page_title = $title;

        $this->data = (object) array();

        if($this->needModel){
            $this->Model = new DB();
        }

        $this->secure();
    }

    function init()
    {
        // Dummy function
    }

    function secure()
    {
        // Dummy function
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

    function render()
    {
        $data = $this->data;
        $data->title = $this->page_title;

        foreach ($this->views as $view) {
            require_once("./public/view/" . $view);
        }
    }
}

?>
