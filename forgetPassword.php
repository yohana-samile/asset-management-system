<?php require_once('include/messages.php'); ?>
<?php require_once('include/resource.php'); ?><br>
<div class="container d-flex justify-content-center bg-">
    <div class="col-md-6 bg-light">
        <h3 class="text-center">Recover Your Password</h3>
        <form action="passwordResetAction.php" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="emailID" class="form-control" />
                <label class="form-label" for="emailID">Email address</label>
            </div>
            
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control" />
                <label class="form-label" for="password">Enter New Password</label>
            </div>
            <div class="form-outline mb-4">
                <input type="password" id="confPass" name="confPass" class="form-control" />
                <label class="form-label" for="confPass">Confirm New Password</label>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <!-- Simple link -->
                    <a href="index.php">Return To Login Page</a>
                </div>
            </div>
            
            <!-- Submit button -->
            <button type="submit" name="recoverPass" class="btn btn-primary btn-block mb-4">Submit</button>
        </form>
    </div>
</div>