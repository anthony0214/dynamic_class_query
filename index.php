<?php
function findThis($pathRoot){
    $d = '';
    for($i = 0; $i < 20; $i++){//this will try 20 times recursively on upper folder
        if(file_exists($d.$pathRoot)){
            return $d;
        }else{
            $d.="../";
        }
    }
}
$pathToRoot = findThis('autoload.php');
include_once $pathToRoot.'autoload.php';

include($pathToRoot.'sqlClassCrud.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
   
    
</head>
<body>
<?php
    $tableName = 'booking';
    $vehicle_id = 'vehicle_id';
    $vhid = 2;
    $param = 'where '.$vehicle_id.' = '.$vhid.'';
    $test = new dbCrud;
    $result = json_decode($test->dbSelect($tableName, $param));
    //print('<pre>'.print_r(json_decode($result),true).'</pre>');

    
    //     foreach ($result as $key => $value) {
    //     print('<pre>'.print_r($value->date,true).'</pre>');
    // }

    $results = array_column(
        $result,
        "date"
    );

    print('<pre>'.print_r($results,true).'</pre>');
?>

   
</body>
</html>