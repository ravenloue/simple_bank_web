<?php
$page ="
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1' />
        <title>$pageData->title</title>
        <link rel='icon' type='image/x-icon' href='./src/img/bankicon.png' />
        <!-- Bootstrap v5 CSS -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' 
              integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous' />
        <link href='./dist/style.css' rel='stylesheet' defer=''/>
        <!-- Bootstrap v5 Bundle -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' 
                integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous' defer=''></script>
        <!-- Custom JS 
        <script src='./src/index.js' type='module' defer=''></script> -->
    </head>
    <body class='bg-dark'>
        <!-- Nav Bar -->
        <header>

        </header>

        <!-- Body Content -->
        <main>
            <section class='container container-sm border border-secondary bg-light position-absolute top-50 start-50 translate-middle d-flex' 
                     style='height: 800px; width: 1200px;'>
                $pageData->content  
            </section>
        </main>
    </body>
    <!-- Footer -->
    <footer>
        <p>Created by ravenloue</p>
    </footer>
</html>";
?>