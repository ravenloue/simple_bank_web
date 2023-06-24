<?php
    require "./src/components/PersonaCard.php";
    require "./src/views/dashboard.php";
    
    $section="<div id='LoggedInSection' class='container'>";
    $section.=$article.$dashboard;   
    $section.="</div>";
?>