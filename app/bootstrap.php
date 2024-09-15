

<?php

    //////// Load Config
    require_once 'config/config.php';

    ////// Load Helper
    require_once 'helpers/url_helper.php';

    ////// Load Session Helper /////
    require_once 'helpers/session_helper.php';

    
    ////// Load Func Helper
    require_once 'helpers/func_helper.php';





 
    //////Auto load Core Libraries //////
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });



    











