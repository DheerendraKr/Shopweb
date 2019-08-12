<?php
class Controller 
{

    function __construct() 
    {
        $this->view=new View();
    }
    public function Loadmodel($name)
    {
        $path="Model/".$name."_Model.php";
        //echo $path;
        if(file_exists($path))
        {
            include $path;
            $modelname=$name."_Model";
            $this->model=new $modelname();
        }
    }
}
?>