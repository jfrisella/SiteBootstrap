<?php

define("ROOT", __DIR__);

$var = "<?php\n";

$di = new RecursiveDirectoryIterator(ROOT . "\\routes\\");
foreach (new RecursiveIteratorIterator($di) as $filename)
{
    // filter out "." and ".."
    if ($filename->isDir()) continue;

    if(!preg_match('/.php$/', $filename->getFileName())) continue;
    $filename = str_replace((string)ROOT, "", (string)$filename);
    $var .= "require_once ROUTES_ROOT . '" . (string)$filename . "';\n";
}

$var = str_replace("\\", "/", $var);

try{
    $file = fopen(ROOT . "\\routes.php","w");
        fwrite($file,$var);
    fclose($file);
}catch(\Exception $e){
    echo $e->getMessage();
    exit;
}

echo "success";
