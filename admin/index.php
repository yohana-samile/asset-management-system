<?php require_once('../include/sidebar.php'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="border-left-primary card card-sm">
            <div class="">
                <h2>Total</h2>
            </div>
            <div class="card-body">
                <p class="float-right badge badge-primary text-white">Employee</p>
                <?php
                    $employeeHistory = $conn->query("SELECT * FROM `employee` ");
                    if(mysqli_num_rows($employeeHistory) > 0){ ?>
                        <p class=""><?php echo mysqli_num_rows($employeeHistory); ?></p>
                   <?php }
                   else{ ?>
                        <p class="">0</p>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="border-left-primary card">
            <div class="">
                <h2>Total</h2>
            </div>
            <div class="card-body">
                <p class="float-right badge badge-primary text-white">Assets</p>
                <?php
                    $issuedHistory = $conn->query("SELECT * FROM `asset_managed` "); 
                    if(mysqli_num_rows($issuedHistory) > 0){ ?>
                        <p class=""><?php echo mysqli_num_rows($issuedHistory); ?></p>
                   <?php }
                   else{ ?>
                        <p class="">0</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="border-left-primary card">
            <div class="">
                <h2>Total</h2>
            </div>
            <div class="card-body">
                <p class="float-right badge badge-primary text-white">Assets Issued</p>
                <?php
                    $issuedHistory = $conn->query("SELECT * FROM `assetissued` WHERE requestStatusResult = 'accepted'"); 
                    if(mysqli_num_rows($issuedHistory) > 0){ ?>
                        <p class=""><?php echo mysqli_num_rows($issuedHistory); ?></p>
                   <?php }
                   else{ ?>
                        <p class="">0</p> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php require_once('../include/footer.php'); ?>