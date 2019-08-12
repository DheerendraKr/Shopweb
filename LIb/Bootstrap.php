<?php //
//class Bootstrap 
//{
//
//    function __construct() 
//    {
//        //$url= rtrim($_SERVER['REQUEST_URI'],'/');
//        //echo $_SERVER['QUERY_STRING'];
//        $url= rtrim($_GET['url'],'/');
//        //$url=rtrim($_SERVER['QUERY_STRING'],'/');
//        $url= explode('/', $url);
//        print_r($url);
//        
//        $file='Controller/'.$url[0].'.php';
//        //echo $file;
//        if(file_exists($file))
//        {
//            require $file;
//            $controller=new $url[0];
//            if(isset($url[1]))
//            {
//                if($url[1]!=NULL)
//                {
//                    //echo '11111111';
//                    $controller->{$url[1]}();
//                }
//                else
//                {
//                    //echo '2222222';
//                    $controller->home();
//                    
//                }
//            }
//        }
//        else
//        {
//            //echo '444444444';
//            require 'Controller/Error.php';
//            
//            $controller=new error_controller();
//        }
//        
//    }
//
//}







    class bootstrap 
    {

        function __construct()
        {

            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            //print_r($url);

            if (empty($url[0]))
            {
                require 'Controller/Home.php';
                $controller = new Home();
                $controller->loadModel('Home');
                $controller->index();
                return false;
            }

            $file = 'Controller/' . $url[0] . '.php';
            if (file_exists($file))
            {
                require $file;
            } 
            else
            {
                $msg="file does not exist";
                $this->error($msg);
                return false;
            }

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // calling methods
            if (isset($url[2])) 
            {
                if (method_exists($controller, $url[1])) 
                {
                    $controller->{$url[1]}($url[2]);
                }
                else
                {
                    $msg="method does not exist";
                    $this->error($msg);
                    return FALSE;
                }
            } 
            else
            {
                if (isset($url[1])) 
                {
                    if (method_exists($controller, $url[1])) 
                    {
                        $controller->{$url[1]}();
                    }
                    else
                    {
                        $msg="method does not exist";
                        $this->error($msg);
                        return false;
                    }
                }
                else
                {
                    $controller->index();
                }
            }


    }

    function error($msg) 
    {
        require 'Controller/Error.php';
        $controller = new Error_Controller();
        $controller->index($msg);
        return false;
    }
    

}






?>