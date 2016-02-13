<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
$var = "<?php\n/**\n*\App Routes\n*/\n\n";

$di = new RecursiveDirectoryIterator(ROOT . "/app/routes/routes/"); //<-- PUT LOCATION OF ROUTES HERE
foreach (new RecursiveIteratorIterator($di) as $filename)
{
    // filter out "." and ".."
    if ($filename->isDir()) continue;

    if(!preg_match('/.php$/', $filename->getFileName())) continue;
    $filename = str_replace((string)ROOT, "", (string)$filename);
    $var .= "require_once ROOT . '" . (string)$filename . "';\n";
}

try{
    $file = fopen(ROOT . "/app/routes/routes.php","w");
        fwrite($file,$var);
    fclose($file);
}catch(\Exception $e){
    echo $e->getMessage();
    exit;
}

echo "success";