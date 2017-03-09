<?php

class Page {

  private $page_title;
  private $views = array();
  //private $data = (object) array();

  function __construct($title) {
    $this->page_title = $title;
  }

  function setTitle($title) {
    $this->page_title = $title;
  }

  function addView($tmpl) {
    array_push($this->views, $tmpl);
    //print_r($this->views);
  }

  function addData($key, $var) {
    $this->data->$$key = $var;
  }

  function render($data) {

    foreach ($this->views as $view) {
        include("./view/" . $view);
    }
  }
}

 ?>
