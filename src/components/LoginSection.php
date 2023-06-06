<?php
    $section="
        <section id='LoginSection' class='container'>
            <form action='./src/includes/login.inc.php' method='post'><div id='loginInputs'>
                <div class='mb-3'>
                    <label for='username' class='form-label'>Username</label>
                    <input type='username' class='form-control' name='uId' placeholder='username' 
                        value='' aria-describedby='Username' />
                </div>
                <div class='mb-3'>
                    <label for='password' class='form-label'>Password</label>
                    <input type='password' class='form-control' name='pwd' placeholder='password' 
                        value='' aria-describedby='Password' />
                </div></div>
                <button type='submit' class='login-btn' name='submit' id='loginBtn'>Login</button>
            </form>
            <form><button type='click' class='login-btn' id='forgotPword'>Forgot Password</button></form>
            
            <h6>Not a user? <a href='index.php?p=signup'>Sign up now!</a>
        </section>
    ";
?>