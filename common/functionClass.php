<?php

class Database
{

	
private db_host = ‘’; 
private db_user = ‘’; 
private db_pass = ‘’; 
private db_name =

    public function connect(){ 
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
    }
    

    public function disconnect(){
        try {
            $conn = null; 
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    public function select(){   }
    public function insert(){   }
    public function delete(){   }
    public function update(){   }
}



?>