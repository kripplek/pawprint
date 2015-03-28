<?php

/**
 * @author kyle s <kyle@kylesorrels.com>
 * @package pawPrint
 */

class Database
{
    private $DBuser= "";
    private $DBpass = "";
    private $DBhost= "";
    private $DBport= "";
    private $DBname='';
    protected $dbConn;
    private $lastQuery;
    private $query;
    private $lastResults;
    private $results;
    public function __construct($dbName=null){
        $config = new Config;
        $dbConfig = $config->getDatabaseInfo();  
        foreach($dbConfig as $key=> $val){
            $this->$key=$val;
        }
        $this->connect();
    }
    private function connect(){
        $this->dbConn = mysqli_connect($this->DBhost,$this->DBuser,$this->DBpass,"center",$this->DBport)or die('Error'. mysqli_error($this->dbConn));
    }
    public function runQuery($query){
        $result = $this->dbconn->query(strip_tags($query)); 

        //form data
        while($row = mysqli_fetch_array($result)) { 
            $this->rawData[]=$row;
        }
        return $this->rawData;
    }

}
