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
 $dbCrud = new dbCrud;

   
    
    










   










?>

   
</body>
</html>