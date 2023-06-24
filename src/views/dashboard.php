<?php

    require "./src/components/AcctOverview.php";
    require "./src/components/AcctCards.php";
    require "./src/components/News.php";
    require "./src/components/AcctTransactions.php";

    $dashboard="<section id='Dashboard' class='container'>
                    <article class='row'>";
    $dashboard.=$overviewCard.$acctCards.$newsCard;
    $dashboard.="   </article>
                 <article class='row'>";
    $dashboard.=$transactions;
    $dashboard.="</article></section>";
?>