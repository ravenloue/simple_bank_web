<?php
    session_start();

    $pageData = new stdClass();
    $pageData->title = "Simplebank Web";
    $navigationIsClicked = isset($_GET['page']);
        if ($navigationIsClicked){
            $fileToLoad = $_GET['page'];
            $filepath = "./src/views/".$fileToLoad.".php";
            include_once $filepath;
            $pageData->content = $contents;
        }else{
            include_once "./src/views/main.php";
            $pageData->content = $contents;
        }
    require "./src/views/pagetemplate.php";
    echo $page;
?>





            
