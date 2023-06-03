<?php
    require_once('../include/messages.php');
    require_once('../include/sidebar.php');
    if(isset($_GET['key'])){}
?>

<h3 class="text-center text-capitalize">This is list of registered Employee</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                    <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                        data-target="#new_employee">Register Employee <i class="fa fa-plus fa-sm"></i>
                    </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Employee Name</th>
                        <th>Email ID</th>
                        <th>Department Name</th>
                        <th>Gender</th>
                        <th>Added By_Admin</th>
                        <th>Time Added</th>
                        <th>Time Modified</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $new_employee_record = $conn->query("SELECT * FROM employee, department WHERE employee.whichDepartment = department.departmentId ");
                            $get_employee_result = mysqli_num_rows($new_employee_record);
                            while($get_employee_result = mysqli_fetch_array($new_employee_record)):
                                if($get_employee_result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $get_employee_result['first_name']. " " .$get_employee_result['last_name']; ?> </td>
                                        <td><?php echo $get_employee_result['email']; ?> </td>
                                        <td><?php echo $get_employee_result['departmentName']; ?> </td>
                                        <td><?php echo $get_employee_result['gender']; ?> </td>
                                        <td class="text-center"><i class="fa fa-check text-primary"></i> </td>
                                        <td><?php echo $get_employee_result['date_registered']; ?> </td>
                                        <td><?php echo $get_employee_result['date_modified']; ?> </td>
                                        <td>
                                            <a href="" data-target="#editEmployee<?php echo $get_employee_result['employee_id']; ?>" data-toggle="modal"><i class="fa fa-edit text-warning"></i></a>
                                            <a href="" data-target="#deleteEmployee<?php echo $get_employee_result['employee_id']; ?>" data-toggle="modal"><i class="fa fa-trash-o text-danger"></i></a>
                                        </td>
                                <?php endif; ?>
                                <!-- modal for employee -->
                                <!-- edit Employee -->
                                <div class="modal fade" id="editEmployee<?php echo $get_employee_result['employee_id']; ?>" tabindex="-1" role="dialog" aria-hiden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h3 class="modal-title text-center" id="edit_vehacle">Update Asset Information</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="updateInformationAction.php?employee_id=<?php echo $get_employee_result['employee_id']; ?>" method="POST">                  
                                                    <!-- category_name input -->
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" name="asset" value="<?php echo $get_asset_result['asset_id']; ?>"  hidden required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="first_name">Enter First name</label>
                                                        <input type="text"  class="form-control" name="first_name" value="<?php echo $get_employee_result['first_name']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_name">Enter Last name</label>
                                                        <input type="text"  class="form-control" name="last_name" value="<?php echo $get_employee_result['last_name']; ?>" required>
                                                    </div>                   
                                                    <div class="form-group">
                                                        <label for="email">Enter Email</label>
                                                        <input type="text"  class="form-control" name="email" value="<?php echo $get_employee_result['email']; ?>" required>
                                                    </div>    
                                                    <div class="form-group">
                                                        <select name="gender" class="form-control" id="gender" required>
                                                            <option hidden>Choose Gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>                
                                                    <div class="form-group">
                                                        <select name="whichDepartment" class="form-control" id="whichDepartment" required>
                                                            <option hidden>Choose Category</option>
                                                            <?php
                                                                $getDep = $conn->query("SELECT * FROM `department` ");
                                                                while($result = mysqli_fetch_array($getDep)){ ?>
                                                                    <option value="<?php echo $result['departmentId']; ?>"><?php echo $result['departmentName']; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- Submit button -->
                                                    <button type="submit" name="editEmployee" class="btn btn-primary btn-block mb-4">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete employee -->
                                <div class="modal fade" id="deleteEmployee<?php echo $get_employee_result['employee_id']; ?>" tabindex="-1" role="dialog" aria-hiden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h3 class="modal-title text-center" id="edit_vehacle">Do You Want Delete This Employee?</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="updateInformationAction.php?employee_id=<?php echo $get_employee_result['employee_id']; ?>" method="POST"> 
                                                    <!-- Submit button -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="" data-dismiss="modal" class="btn btn-primary btn-block mb-4">Cancel</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" name="deleteEmployee" class="btn btn-danger btn-block mb-4">Yes Delete</button>
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