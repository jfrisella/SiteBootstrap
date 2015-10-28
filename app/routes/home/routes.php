<?php
/**
*   Home routes
*/

$app->group("/Home", function() use ($app){

    $app->get("/", function() use ($app){
        
        //Add a controller here
        echo "Home";
    
    });

});