<?php

class Database{
  
    public $link='';
    function __construct(){
        $this->connect();
    }
    
    function connect(){
        $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
        mysqli_select_db($this->link,'datamonitoringcontrol') or die('Cannot select the DB');
    }
    
    function saveDB($temp,$hum){

        $query = "   insert into datacontrol set temperature='".$temp."',humidity='".$hum."'     ";
        $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
        $this->link->close();
    }

    
}


?>