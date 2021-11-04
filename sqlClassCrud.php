<?php
// function findThis($pathRoot){
//     $d = '';
//     for($i = 0; $i < 20; $i++){
//         if(file_exists($d.$pathRoot)){
//             return $d;
//         }else{
//             $d.="../";
//         }
//     }
// }
// $pathToRoot = findThis('autoload.php');
// include_once $pathToRoot.'autoload.php';

class dbCrud{

   
     function dbconnect() 
    { 
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("<br/>Could not connect to MySQL server"); 

        return $link;
        
    }

    function dbSelect($tableName, $param){
        $param = '';

        $sql = "SELECT * from $tableName $param";
        $result = mysqli_query($this->dbconnect(), $sql);
        $json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        return json_encode($json);
        mysqli_close($this->dbconnect());

    }
        
      
}




//print('<pre>'.print_r(dbCrud::DB_HOST,true).'</pre>');