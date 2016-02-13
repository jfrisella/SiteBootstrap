<?php
/**
*   App Routes
*/

$app->get("/", "Code\Controllers\Home:index")
    ->name("home");
