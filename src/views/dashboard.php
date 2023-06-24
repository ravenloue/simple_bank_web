<?php

    require "./src/components/AcctOverview.php";
    require "./src/components/AcctCards.php";
    require "./src/components/News.php";

    $dashboard="<section id='Dashboard' class='container'>
                    <article class='row'>";
    $dashboard.=$overviewCard.$acctCards.$newsCard;
    $dashboard.="   </article>
                 </section>";
?>