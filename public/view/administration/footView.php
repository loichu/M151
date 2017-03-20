<?php
$script = Config::$site_url . "public/scripts/jqueryAdministration.js";
$scriptUser = Config::$site_url . "public/scripts/jqueryAddUser.js";

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
    <?php
    $method = getMethod($_SERVER["REQUEST_URI"]);
    
    if($method != "user"){
        echo "src='$script'";
    } else {
        echo "src='$scriptUser'";
    }
    ?>
    >
</script>
