<?php
    require_once('../include/sidebar.php');
    require_once('../include/messages.php');
    if(isset($_GET['key'])){}
?>
<h3 class="text-center text-capitalize">Asset issued to the employee</h3>
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
                        <th>From Category</th>
                        <th>Issued_By</th>
                        <th>From Department</th>
                        <th>Time Issued</th>
                        <th>Time Return</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $new_category_record = $conn->query("SELECT * FROM assetissued, asset_managed, assetcategory, employee, department WHERE
                                    assetissued.assetBorrowed = asset_managed.asset_id and
                                    assetcategory.categoryId = asset_managed.whichCategory and
                                    employee.whichDepartment = department.departmentId and
                                    assetissued.whoBorrow = employee.employee_id ");
                            $get_category_result = mysqli_num_rows($new_category_record);
                            while($get_category_result = mysqli_fetch_array($new_category_record)):
                                if($get_category_result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $get_category_result['asset_name']; ?> </td>
                                        <td><?php echo $get_category_result['category_name']; ?> </td>
                                        <td><?php echo $get_category_result['first_name']." ".$get_category_result['last_name']; ?> </td>
                                        <td><?php echo $get_category_result['departmentName']; ?> </td>
                                        <td><?php echo $get_category_result['timeBorrowed']; ?> </td>
                                        <td><?php echo $get_category_result['timeReturned']; ?> </td>
                                        <td>
                                            <?php 
                                                if($get_category_result['requestStatusResult'] == "denied"){ ?>
                                                    <div class="badge badge-danger">You Denie Request</div>
                                                <?php }
                                                elseif($get_category_result['requestStatusResult'] == "pending"){ ?>
                                                    <div class="badge badge-primary">Pending</div>
                                                <?php }
                                                elseif($get_category_result['requestStatusResult'] == "not taken"){ ?> 
                                                    <div class="badge badge-warning">Not Taken</div>
                                                <?php }
                                                elseif($get_category_result['requestStatusResult'] == "Returned"){ ?> 
                                                    <div class="badge badge-primary">Returned</div>
                                                <?php }
                                                else{ ?>
                                                    <div class="badge badge-success">Request Accepted <i class="fa fa-check text-primary"></i></div>
                                                <?php } ?>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <form action="requestStatusResult.php?assetToBeTaken=<?php echo $get_category_result['asset_id']; ?>" method="post">
                                                    <div class="form-group">
                                                        <?php
                                                            if($get_category_result['requestStatusResult'] == "pending" || $get_category_result['requestStatusResult'] == "accepted"){ ?>
                                                                <button type="submit" name="denie" class="btn btn-danger">deny</button>
                                                        <?php } ?>
                                                        <?php
                                                            if($get_category_result['requestStatusResult'] == "pending" || $get_category_result['requestStatusResult'] == "denied"){ ?>
                                                            <input type="text" value="accepted" hidden name="requestStatusResult">
                                                            <button type="submit" name="accept" class="btn btn-primary">Accept</button>
                                                        <?php } ?>
                                                    </div>
                                                </form>
                                            </div> 
                                        </td>
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