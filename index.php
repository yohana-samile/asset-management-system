<?php
    require_once('include/resource.php');
    require_once('include/messages.php');
?>
<h2 class="text-center bg-primary text-light" style="height: 50px;">Asset Management System (AMS)</h2>
<div class="container d-flex justify-content-center bg-">
    <div class="col-md-6 bg-light">
        <h3 class="text-center">User Login Form</h3>
        <?php 
            require_once('include/messages.php');
            if(isset($_GET['key'])){}
        ?><br>
        <form action="loginAction.php" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="emailId" name="email" class="form-control" autofocus="on">
                <label class="form-label" for="emailId">Email address</label>
            </div>
            
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="pass" name="password" class="form-control" />
                <label class="form-label" for="pass">Password</label>
            </div>
            
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chckbox" checked>
                        <label class="form-check-label" for="chckbox"> Remember me </label>
                    </div>
                </div>
            
                <div class="col">
                    <!-- Simple link -->
                    <a href="forgetPassword.php">Forgot password?</a>
                </div>
            </div>
            
            <!-- Submit button -->
            <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>
        </form>
    </div>
</div>