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
    
    <link rel="stylesheet" href="<?= getProjectPath().'node_modules/bootstrap/dist/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?= getAssetPath().'css/app.css'; ?>">

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
</head>
<body>
  <div class="container">

  <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>


  </div>

  
    <script src="<?= getAssetPath().'js/app.js' ?>"></script>
    <script src="<?= getProjectPath().'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'; ?>"></script>

    <!-- Data table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
      
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "data/personel.php",
        "columns": [
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": "email" },
            { "data": "gender" },
            { "data": "salary" }
        ]
    } );

    </script>
    
</body>
</html>