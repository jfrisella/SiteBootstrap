<?php
define("ROOT", __DIR__);
$var = "<?php\n/**\n*\App Routes\n*/\n\n";

$di = new RecursiveDirectoryIterator(ROOT . "/routes/"); //<-- PUT LOCATION OF ROUTES HERE
foreach (new RecursiveIteratorIterator($di) as $filename)
{
    // filter out "." and ".."
    if ($filename->isDir()) continue;

    if(!preg_match('/.php$/', $filename->getFileName())) continue;
    $filename = str_replace((string)ROOT, "", (string)$filename);
    $var .= "require_once ROUTES_ROOT . '" . (string)$filename . "';\n";
}

try{
    $file = fopen(ROOT . "/routes.php","w");
        fwrite($file,$var);
    fclose($file);
}catch(\Exception $e){
    echo $e->getMessage();
    exit;
}

echo "success";