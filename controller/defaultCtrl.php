<?php

require_once("./c/page.php");

class controller_default
{

  function index() {

    $this->page = new Page("mon test");
    $data = (object) array();
    $data->title = "Default / Index";
    $this->page->addView("partial/header.php");


    $data->content = '';
    $numargs = func_num_args();
    $args = func_get_args();
    if ($numargs >= 2) {
      foreach ($args as &$a) {
          $data->content .=  '<br />' . $a;
      }
    }

    $this->page->addView("partial/content.php");
    $this->page->addView("partial/footer.php");
    $this->page->render($data);
  }
}
?>
