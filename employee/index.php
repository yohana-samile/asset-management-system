<?php
    require_once('../include/sidebar.php');
    require_once('../include/messages.php');
    if(isset($_GET['key'])){}
?>
<div class="row">
    <div class="col-md-4">
        <div class="border-left-primary card card-sm">
            <div class="issueAsset.php">
                <h1 class="text-center"><i class="fa fa-cog text-primary"></i></h1>
            </div>
            <div class="card-body text-center">
                <a href="issueAsset.php" class="text-center">Asset Available</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="border-left-primary card">
            <div class="">
                <h1 class=" text-center"><i class="fa fa-database text-primary"></i></h1>
            </div>
            <div class="card-body text-center">
                <a href="issuedHistory.php">Issued History</a>
            </div>
        </div>
    </div>
</div>
<?php require_once('../include/footer.php'); ?>