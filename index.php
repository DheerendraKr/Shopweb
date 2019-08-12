<?php
    //include config files
    include 'Config/Paths.php';
    include 'Config/Constants.php';
    include 'Config/Db_info.php';

    //autolaoder
//    function __autoload($class)
//    {
//        require LIBS.$class.'.php';
//    }
    
    
    include 'Lib/Hash.php';
    include 'Lib/Database.php';
    include 'Lib/Session.php';
    include 'LIb/Bootstrap.php';
    include 'Lib/Controller.php';
    include 'Lib/Model.php';
    include 'Lib/View.php';
    
    $app=new Bootstrap();
    
?>