<?php
//$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("<br/>Could not connect to MySQL server");
class dbCrud{


    function __construct()  {
        $this->link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("<br/>Could not connect to MySQL server");
    }

    

    function dbCreate($tableName, $tableData) {
        /* USAGE
        $tableName = 'personel';
        $tableData = array (
            "id" => "INT NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "first_name" => "VARCHAR(30) NOT NULL",
            "last_name" => "VARCHAR(30) NOT NULL",
            "email" => "VARCHAR(70) NOT NULL",
            "gender" => "VARCHAR(20) NOT NULL",
            "salary" => "numeric(19,4) NOT NULL",
        );
        */
        $result='';
        $status = 1;
        foreach ($tableData as $key => $value) {
            $result .= ", " . $key. ' ' .$value;
        }
    
        $sql = "CREATE TABLE $tableName(".substr($result,1). ")";
            if(mysqli_query($this->link, $sql)){
                return "Table $tableName created successfully.";
            } else{
                return mysqli_error($this->link);
            }
        mysqli_close($this->dbconnect());
    } 
    

    function dbSelect($tableName, $param){
        /* USAGE
        $tableName = 'personel';
        $param = "where id = 2";
        $result = json_decode($dbCrud->dbSelect($tableName, $param));
        if(!empty($result)){
            foreach ($result as $key => $value) {
                print('<pre>'.print_r($value->first_name,true).'</pre>');
            }
        }else{
        echo "no result found on this array: ". $dbCrud->dbSelect($tableName, $param);
        }
        */
        $sql = "SELECT * from $tableName $param";
        if(mysqli_query($this->link, $sql)){
        $result = mysqli_query($this->link, $sql);
        $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        return json_encode($json);}else{
            return mysqli_error($this->link);
        }
        mysqli_close($this->link);
    }

    function updateTable($tableName,$param){
        /* USAGE
        $tableName = "personel";
        $salary = 300000;
        $id = 1;
        $gender = "male";
        $param = "SET salary = $salary, gender= '$gender' WHERE id = $id;";

        echo $dbCrud->updateTable($tableName,$param);
        */

        $sql = "
        UPDATE $tableName
        $param
        ";
        if(mysqli_query($this->link, $sql)){
            return "table update successfully.";
        } else{
              return '<pre>'.print_r($sql,true).'</pre><pre>'.print_r(mysqli_error($this->link),true).'</pre>';
          }
        
        mysqli_close($this->link);
    
    }

    function insertTable($tableName, $data) {
        /* USAGE
        $data = array(
            "first_name" => "art",
            "last_name" => "torres",
            "email" => "art_torres@gmail.com",
            "gender" => "male",
            "salary" => 300000
        );

        echo $dbCrud->insertTable($tableName, $data);
        */

        $key = array_keys($data);
        $val = array_values($data);
        $sql = "INSERT INTO $tableName (" . implode(', ', $key) . ") "
             . "VALUES ('" . implode("', '", $val) . "')";
        
             if(mysqli_query($this->link, $sql)){
                return "data inserted successfully.";
            } else{
                  return '<pre>'.print_r($sql,true).'</pre><pre>'.print_r(mysqli_error($this->link),true).'</pre>';
              }
            
            mysqli_close($this->link);
    }

    function customSelect($sql){
        
        if(mysqli_query($this->link, $sql)){
            $result = mysqli_query($this->link, $sql);
            $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
            return json_encode($json);
        }else{
                return mysqli_error($this->link);
            }
    }
        
      
}




//print('<pre>'.print_r(dbCrud::DB_HOST,true).'</pre>');