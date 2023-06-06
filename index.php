<?php
    session_start();

    $pageData = new stdClass();
    $pageData->title = "Simplebank Web";
    $navigationIsClicked = isset($_GET['p']);
        if ($navigationIsClicked){
            $fileToLoad = $_GET['p'];
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
<script>
let date = new Date(<?php echo time() * 1000?>);

updateClock = () => {
    date.setTime(date.getTime()+1000);

    let hr = date.getHours();
    let mn = date.getMinutes();
    let sc = date.getSeconds();

    mn = (mn < 10 ? '0' : '') + mn;
    sc = (sc < 10 ? '0' : '') + sc;

    let meridian = (hr < 12) ? 'am' : 'pm';

    hr = (hr > 12) ? hr - 12 : hr;
    hr = (hr == 0) ? 12 : hr;

    let time = hr + ':' + mn + ':' + sc + ' ' + meridian;
    clock = document.getElementById('clock').firstChild;
    if(clock != null){
        clock.nodeValue = time;
    }
}

window.onload = () => {
    updateClock();
    setInterval('updateClock()', 1000);
}
</script>





            
