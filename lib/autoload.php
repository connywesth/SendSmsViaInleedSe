<?php
// File: autoload.php
// Modified by Conny Westh 2012-09-13
function __autoload($class_name) 
{
    if(file_exists($class_name . '.php')) 
    {
        require_once($class_name . '.php');    
    } 
    else 
    {
        throw new Exception("Kan inte ladda klass: $class_name.");
    }
}
?> 
