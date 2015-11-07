<?php
/**
*   Home routes
*/

$app->group("/Home", function() use ($app){

    $app->get("/", function() use ($app){
        
        //Add a controller here
        return $app->render("pages/home/index.php");
    
    });

});