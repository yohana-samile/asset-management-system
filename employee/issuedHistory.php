<?php
    require_once('../include/sidebar.php');
    require_once('../include/messages.php');
    if(isset($_GET['key'])){}
?>

<h3 class="text-center text-capitalize">Your Asset Issued History</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Asset Name</th>
                        <th>Discription</th>
                        <th>Brand</th>
                        <th>From_Category</th>
                        <th>Issued Status</th>
                        <th>Time Issued</th>
                        <th>Time Returned</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $new_asset_record = $conn->query("SELECT * FROM assetissued, asset_managed, assetcategory, employee WHERE
                            assetissued.assetBorrowed = asset_managed.asset_id and
                            assetcategory.categoryId = asset_managed.whichCategory and
                            assetissued.whoBorrow = employee.employee_id and
                            employee.employee_id = {$_SESSION['userData']['employee_id']} ");
                            $get_asset_result = mysqli_num_rows($new_asset_record);
                            while($get_asset_result = mysqli_fetch_array($new_asset_record)):
                                if($get_asset_result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $get_asset_result['asset_name']; ?> </td>
                                        <td><?php echo $get_asset_result['asset_discription']; ?> </td>
                                        <td><?php echo $get_asset_result['brande_name']; ?> </td>
                                        <td><?php echo $get_asset_result['category_name']; ?> </td>
                                        <td><?php echo $get_asset_result['requestStatusResult']; ?> </td>
                                        <td><?php echo $get_asset_result['timeBorrowed']; ?>
                                        <td><?php echo $get_asset_result['timeReturned']; ?> </td>
                                <?php endif;
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    require_once('../include/footer.php');
    require_once('../modals/modal.php');
?>