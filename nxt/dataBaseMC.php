<?php

class Database{
  
    public $link='';
    function __construct(){
        $this->connect();
    }
    
    function connect(){
        $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB'); //replaced your data base host,user and password
        mysqli_select_db($this->link,'datamonitoringcontrol') or die('Cannot select the DB');   // database name datamonitoringcontrol can also be change
    }
    
    function saveDB($temp,$hum){

        $query = "   insert into datacontrol set temperature='".$temp."',humidity='".$hum."'     ";  //table name with for column ID(INT,KEY, AUTO INCREMENT),temperature(INT),humidity(INT) and date (timestamp)
        $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
        $this->link->close();
    }

    
}


?>
