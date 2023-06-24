<?php
    require './src/components/Calendar.php';
    $calendar = new Calendar();

    $aside="
        <aside id='AccessSection' class='container'>
            <h4>Simple Bank</h3>
            <img src='./src/img/bank.png' style='width: 125px; height: 125px; margin-left: 25px;'/>
            <p>(555) 555 - 0123<br />
            support@simplebank.com</p>
            <br />
            <button type='submit' class='login-btn' name='submit' id='acctBtn'><img src='./src/img/home.svg' height='30' alt='home icon' /> Home</button><br />
            <button type='submit' class='login-btn' name='submit' id='transferBtn'><img src='./src/img/dollar.svg' height='30' alt='dollar icon' /> Account</button><br />
            <button type='submit' class='login-btn' name='submit' id='depositBtn'><img src='./src/img/list-circle.svg' height='30' alt='list icon' /> Transactions</button><br />
            <button type='submit' class='login-btn' name='submit' id='moreBtn'><img src='./src/img/square-more.svg' height='30' alt='more icon' /> More ...</button><br />
            <form action='./src/includes/logout.inc.php'><button type='submit' class='login-btn' name='submit' id='logOutBtn'><img src='./src/img/logout.svg' height='30' alt='logout icon' /> Log Out</button></form>
            <br />
            <div id='calendar'>";
            
    $aside .= $calendar->show();
    $aside .="</div><br />
            <article id='clock'>&nbsp;</article>
        </aside>
    ";
?>