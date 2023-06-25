<?php
    $transactions="<article id='AcctTransactions' class='col-3'>
                        <h4>My Transactions</h4>
                        <div class='row'>
                            <div class='col'><h6>Date</h6></div><div class='col'><h6>Party</h6></div><div class='col'><h6>Category</h6></div><div class='col'><h6>Amount</h6></div>
                        </div><br />";
    for($i=0;$i<5;$i++){
        $transactions.="<div class='row'>";
        foreach($_SESSION["transactions"][$i] as $k => $values){
            $transactions.="<div class='col'><p>".$values."</p></div>";
        }
        $transactions.="</div>";
    };
    $transactions.="<p><a href='index.php?p=transactions'>Load more --></a></p></article>";

?>