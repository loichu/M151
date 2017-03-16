<?php
$script = Config::$site_url . "public/scripts/jqueryAdministration.js";

if(Config::$debug){
    if(isset($activites)){
        debug($activites);
    }
    if(isset($classes)){
        debug($classes);
    }
    if(isset($users)){
        debug($users);
    }
    else{
        debug("no variable was found");
    }
}
?>
<!-- Jquery -->
<script
        src="<?= $script ?>">
</script>
