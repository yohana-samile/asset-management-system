<?php require_once('../include/sidebar.php'); ?>
    <h3 class="text-center text-capitalize">Activities You Performed In Our System</h3>
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
                            <th>Activity Performed</th>
                            <th>Time Performed</th>
                            <th>Performed_By_you</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sn = 1;
                                $new_asset_record = $conn->query("SELECT * FROM `system_logs` WHERE performed_by = {$_SESSION['userData']['employee_id']} ");
                                $get_asset_result = mysqli_num_rows($new_asset_record);
                                while($get_asset_result = mysqli_fetch_array($new_asset_record)):
                                    if($get_asset_result > 0): ?>
                                        <tr>
                                            <td><?php echo $sn++; ?> </td>
                                            <td><?php echo $get_asset_result['action_performed']; ?> </td>
                                            <td><?php echo $get_asset_result['time_performed']; ?> </td>
                                            <td class="text-center"><i class="fa fa-check text-primary"></i> </td>
                                        <?php
                                        endif;
                                endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require_once('../include/footer.php'); ?>