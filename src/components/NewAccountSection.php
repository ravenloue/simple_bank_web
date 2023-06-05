<?php
    $section="
        <section id='NewAccountSection' class='container'>
            <form action='./src/includes/signup.inc.php' method='post'>
                <div class='mb-3'>
                    <label for='acctNum' class='form-label'>Account Number</label>
                    <input type='text' class='form-control' name='acctNum' placeholder='account number'
                        value='' aria-describedby='Account Number' />
                </div>
                <div class='mb-3'>
                    <label for='username' class='form-label'>Username</label>
                    <input type='username' class='form-control' name='uId' placeholder='username'
                    value='' aria-describedby='Username' />
                </div>
                <div class='mb-3'>
                    <label for='password' class='form-label'>Password</label>
                    <input type='password' class='form-control' name='pwd' placeholder='password'
                    value='' aria-describedby='Password' />
                </div>
                <button type='submit' class='login-btn' name='submit' id='signUpBtn'>Sign Up</button><br />
            </form>
            <h6>Already a member? <a href='index.php?page=main'>Log In</a>
        </section>
    ";
?>