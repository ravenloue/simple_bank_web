<?php
    $name = $_SESSION['userName'];
    $balance = '$ '.number_format($_SESSION['balance']);

    require "./src/components/AccessSection.php";
    require "./src/components/LoggedInSection.php";

    $contents=$aside.$section;
?>