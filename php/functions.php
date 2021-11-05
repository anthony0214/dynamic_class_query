<?php

$projectFolder = '/corephp-templates/';

function getRootPath()
{
    return (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
}
function getProjectPath()
{
    return (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $GLOBALS['projectFolder'];
}
function getAssetPath()
{
    return (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $GLOBALS['projectFolder']. "assets/";
}
function getPagesPath()
{
    return (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $GLOBALS['projectFolder']. "pages/";
}

function allPath()
{
    $allPath = array(
        'root_path' => getRootPath(),
        'project_path' => getProjectPath(),
        'asset_path'	=> getAssetPath(),
        'pages_path'	=> getPagesPath(),
    );
    return $allPath;
}

function defaultTest(){
    return '<h3>Functions from php/functions.php!';
}

function listFolderFiles($dir){
    $exclude = array(
        'db',
    );
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);
    unset($ffs[array_search('.git', $ffs, true)]);
    unset($ffs[array_search('node_modules', $ffs, true)]);
    unset($ffs[array_search('test', $ffs, true)]);
    unset($ffs[array_search('package-lock.json', $ffs, true)]);
    unset($ffs[array_search('package.json', $ffs, true)]);
    unset($ffs[array_search('README.md', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;
        
        
    echo '<ol>';
    foreach($ffs as $key => $ff){
        
        
        echo '<li>'.$ff;
        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
       
        
        echo '</li>';
    }
    echo '</ol>';
}
## remove comment to show file directory paths of each directory
//listFolderFiles('/xampp2022/htdocs/corephp-templates');

function createData( $info ) {
    // get database connection
    $databaseConnection = getDatabaseConnection();

    // create our sql statment
    $statement = $databaseConnection->prepare( '
        INSERT INTO
            users (
                email,
                first_name,
                last_name,
                password,
                
            )
        VALUES (
            :email,
            :first_name,
            :last_name,
            :password,
        )
    ' );

}
