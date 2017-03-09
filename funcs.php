<?php

// some usefull functions accross the site

function debug($v) {
  echo "<br /><pre>--- debug: ";
  if (is_array($v)) {
    print_r($v);
  } else {
    print $v;
  }
}
 ?>
