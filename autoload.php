<?php

spl_autoload_register(function (string $class){
    
    $class = str_replace('\\',DIRECTORY_SEPARATOR, $class);
    
    $path = __DIR__ . DIRECTORY_SEPARATOR ."app". DIRECTORY_SEPARATOR ."$class.php";

    if(is_readable( $path)){
        require_once $path;
    }
        
    
});
