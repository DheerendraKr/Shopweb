<?php 
class Database extends PDO
{

    function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS) 
    {
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
    }
    
    
    //insert function
    
    public function Insert($table,$data)
    {
        ksort($data);
        $fieldname= implode('`, `', array_keys($data));
        $fieldvalues=':'.implode(', :', array_keys($data));
        $sql="INSERT INTO $table (`$fieldname`) VALUES ($fieldvalues)";
        $sth = $this->prepare($sql);
        foreach ($data as $key => $value) 
        {
                $sth->bindValue(":$key", $value);
        }
        if($sth->execute()){
           return true; 
        }
        else {
            return false;
        }
        
        
        
    }
    
    
    //select function
    
    public function Select($sql,$array=array(),$fetch_mode = (PDO::FETCH_ASSOC))
    {
        $sth=$this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key","$value");
        }
        $sth->execute();
        if($sth->rowCount()>0)
        {
            return ($sth->fetchAll($fetch_mode));
        }
        else
        {
            return null;
        }
    }
    
    
    //update function
    
    public function Update($table, $data, $where)
    {
            ksort($data);

            $fieldDetails = NULL;
            foreach($data as $key=> $value) {
                    $fieldDetails .= "`$key`=:$key,";
            }
            $fieldDetails = rtrim($fieldDetails, ',');

            $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

            foreach ($data as $key => $value) {
                    $sth->bindValue(":$key", $value);
            }
            $sth->execute();
    }
    
    
    //delete function
    
    public function Delete($table, $where, $limit = 1)
    {
        $sql="DELETE FROM $table WHERE $where LIMIT $limit";
        $sth=$this->prepare($sql);
        $sth->execute();
    }
    
}
?>