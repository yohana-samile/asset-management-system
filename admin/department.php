<?php
    require_once('../include/sidebar.php');
    require_once('../include/messages.php');
    if(isset($_GET['key'])){}
?>

<h3 class="text-center text-capitalize">This is list of registered Department</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                    <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                        data-target="#new_department">New Department <i class="fa fa-plus fa-sm"></i>
                    </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Department Name</th>
                        <th>Added By_Admin</th>
                        <th>Time Added</th>
                        <th>Time Modified</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $new_department_record = $conn->query("SELECT * FROM `department` ");
                            $get_department_result = mysqli_num_rows($new_department_record);
                            while($get_department_result = mysqli_fetch_array($new_department_record)):
                                if($get_department_result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $get_department_result['departmentName']; ?> </td>
                                        <td class="text-center"><i class="fa fa-check text-primary"></i> </td>
                                        <td><?php echo $get_department_result['timeAdded']; ?> </td>
                                        <td><?php echo $get_department_result['timeModified']; ?> </td>
                                        <td>
                                            <a href="" data-target="#editDepartment<?php echo $get_department_result['departmentId']; ?>" data-toggle="modal"><i class="fa fa-edit text-warning"></i></a>
                                            <a href="" data-target="#deletDepartment<?php echo $get_department_result['departmentId']; ?>" data-toggle="modal"><i class="fa fa-trash-o text-danger"></i></a>
                                        </td>
                                <?php endif; ?>
                                <!-- modal for depertments -->                                
                                <!-- Edit Department modal -->
                                <div class="modal fade" id="editDepartment<?php echo $get_department_result['departmentId']; ?>" tabindex="-1" role="dialog" aria-hiden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h3 class="modal-title text-center">Edit Department Information</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="updateInformationAction.php?departmenKey=<?php echo $get_department_result['departmentId']; ?>" method="POST">                  
                                                    <!-- departmentName input -->
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" value="<?php echo $get_department_result['departmentName']; ?>" name="departmentName" placeholder="category name" required>
                                                    </div>                            
                                                    <!-- Submit button -->
                                                    <button type="submit" name="editDepartment" class="btn btn-primary btn-block mb-4"> Edit Department</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete Department -->
                                <div class="modal fade" id="deletDepartment<?php echo $get_department_result['departmentId']; ?>" tabindex="-1" role="dialog" aria-hiden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h3 class="modal-title text-center" id="edit_vehacle">Do You Want Delete This Department?</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="updateInformationAction.php?departmenKey=<?php echo $get_department_result['departmentId']; ?>" method="POST"> 
                                                    <!-- Submit button -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="" data-dismiss="modal" class="btn btn-primary btn-block mb-4">Cancel</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" name="deleteDepartment" class="btn btn-danger btn-block mb-4">Yes Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
    require_once('../modals/modal.php');
    require_once('../include/footer.php');
?>