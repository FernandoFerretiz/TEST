<?php
function json_validate($string) {
    $tmp = json_decode($string);
    return json_last_error() === JSON_ERROR_NONE ? $tmp : false;
 }
class DB{
    private $host       = 'localhost';
    private $user       = 'root';
    private $password   = '';
    private $db_name    = 'db';
    private $port       = '3306';
    private $dirver     = 'MYSQLi';

    private $result     = null;
    private $link       = null;

    private $lastInsert = null;


    public function __construct($driver = 'MYSQLi', $_DATA_CONNECT = array()){
        $this->driver = $driver;

        if(isset($_DATA_CONNECT['HOST']))      $this->host     = $_DATA_CONNECT['HOST'];
        if(isset($_DATA_CONNECT['USER']))      $this->user     = $_DATA_CONNECT['USER'];
        if(isset($_DATA_CONNECT['PASSWORD']))  $this->password = $_DATA_CONNECT['PASSWORD'];
        if(isset($_DATA_CONNECT['DB_NAME']))   $this->db_name  = $_DATA_CONNECT['DB_NAME'];
        if(isset($_DATA_CONNECT['PORT']))      $this->port     = $_DATA_CONNECT['PORT'];
    }
    public function setProperty($nameProperty,$value){
        if(isset($this->$nameProperty)){
            $this->$nameProperty = $value;
        }
    }

    public function createConnection(){

        if($this->driver == 'MYSQLi'){

            $link = new mysqli($this->host,$this->user,$this->password,$this->db_name);
            $link->set_charset("utf8");
    
            if($link->connect_errno){
                error_log($link->connect_errno,0); 
            }else{
                $this->link = $link;
                return true;
            }
        }else if($this->driver == 'SQL_SERVER'){

            $link = sqlsrv_connect($this->host, [
                'Database'      =>$this->db_name,
                'UID'           =>$this->user,
                'PWD'           =>$this->password,
                'CharacterSet'  =>'UTF-8',
            ]);

            if(!$link){
                print_r(sqlsrv_errors());
                error_log("",0);
            }else{
                $this->link = $link;
                return true;
            }
        }
        return false;
    }

    public function QueryRAW($sql){
        if($this->driver == 'MYSQLi'){

            $result = $this->link->query($sql);
            
            if(!$result){
                print_r([
                    'query'=>$sql,
                    'error'=>$this->link->error,
                ]);
                return false;
            }
        }else if($this->driver == 'SQL_SERVER'){
            $result = sqlsrv_query($this->link,$sql);
            if(!$result){
                print_r(sqlsrv_errors());
                return false;
            }
        }

        $this->result = $result;
        return true;
    }
    public function getId(){
        if($this->driver == 'MYSQLi'){

            $lastInsert = $this->link->insert_id;
            return $lastInsert;
        }else if($this->driver == 'SQL_SERVER'){
            
        }

    }
    public function realEscape($sText){
        if($this->driver == 'MYSQLi'){

            return $this->link->real_escape_string($sText);

        }else if($this->driver == 'SQL_SERVER'){
            
        }

    }

    public function getResults($key=false,$returnInOne = false){
        $results = [];

        if($this->driver == 'MYSQLi'){
            while($data = $this->result->fetch_object()){
                
                if($returnInOne){

                    $results = $data;

                }else if($key !== false){
                    if(is_string($key)){
                        
                        $results[$data->$key] = $data;

                    }else if(gettype($key) !== 'boolean'){

                        $key($results,$data);

                    }else{
                        $results[] = $data;
                    }
                    
                }else{
                    $results[] = $data;
                }
            }
        }else if($this->driver == 'SQL_SERVER'){
            while($data = sqlsrv_fetch_object($this->result)) {
                if($returnInOne){

                    $results = $data;

                }else if($key !== false){
                    if(is_string($key)){
                        
                        $results[$data->$key] = $data;

                    }else if(gettype($key) !== 'boolean'){

                        $key($results,$data);

                    }else{
                        $results[] = $data;
                    }
                    
                }else{
                    $results[] = $data;
                }
            }
        }

        return $results;
    }


    public function __destruct(){

        if($this->driver == 'MYSQLi'){
            if($this->link){
                $this->link->close();
            }
        }else if($this->driver == 'SQL_SERVER'){
            if($this->link){
             //   $this->link->close();
            }
        }

        
    }
}