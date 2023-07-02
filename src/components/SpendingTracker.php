<?php
    $spending="<article id='SpendingTracker' class='col-1'>
                <h4>My Expenses</h4>";
    $spending.='<div style="width: 100%; height: 100%;">
                   <canvas id="myChart" style="margin:auto;"></canvas>
                </div>
            </article>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    let inputData = [';
 for($i=0;$i<5;$i++){
     $spending.= json_encode($_SESSION["transactions"][$i]).',
     ';
 }
 $spending.= "];
 const ctx = document.getElementById('myChart');
   
    let myData = [{id: 'Utilities', total: {value: 0}},
                  {id: 'Groceries', total: {value: 0}}, 
                  {id: 'Other', total: {value: 0}}, 
                  {id: 'Gas', total: {value: 0}}];

    inputData.forEach((obj)=>{
    let type = obj.transactionType;
    let amt = parseInt(obj.transactionAmount);
    switch(type){
        case 'Utilities':
        myData[0].total.value -= amt;
        break;
        case 'Groceries':
        myData[1].total.value -= amt;
        break;
        case 'Other':
        myData[2].total.value -= amt;
        break;
        case 'Gas':
        myData[3].total.value -= amt;
        break;
    }
    
    })
    
    console.log(myData);

    new Chart(ctx, {
    type: 'doughnut',
    
data: {
    labels: ['Utilities','Groceries','Other','Gas'],
    datasets: [{
    data: myData,
    }]
},
options: {
    parsing: {
    key: 'total.value',
    }
}

    });
</script>";
    
    
    
?>