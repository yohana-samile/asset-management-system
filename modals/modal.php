<!-- add new_employee modal -->
<div class="modal fade" id="new_employee" tabindex="-1" role="dialog" aria-labelledby="#new_employee" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Customer Registration</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registerStaffAction.php" method="POST">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First name" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last name" required>
                            </div>
                        </div>
                    </div>
        
                    <!-- Email input -->
                    <div class="form-group">
                        <input type="email"  class="form-control" name="email" placeholder="Email address" required>
                    </div>
                    <div class="form-group">
                        <select name="gender" class="form-control" id="gender" required>
                            <option hidden><--choose Gender--></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" value="2" name="role" class="form-control" placeholder="" required hidden>
                    </div>
                    <div class="form-group">
                        <?php
                            $getUserID = $conn->query("SELECT * FROM `super_admin` where admin_id = {$_SESSION['userData']['admin_id']} ");
                            $result = mysqli_fetch_array($getUserID);
                            ?>
                            <input type="number" value="<?php echo $result['admin_id']; ?>" name="registered_by" class="form-control" placeholder="" hidden required>
                    </div>
                    <div class="form-group">
                        <select name="whichDepartment" class="form-control" id="whichDepartment" required>
                            <option hidden><--Assign Department--></option>
                            <?php
                                $getDep = $conn->query("SELECT * FROM `department` ");
                                while($result = mysqli_fetch_array($getDep)){ ?>
                                    <option value="<?php echo $result['departmentId']; ?>"><?php echo $result['departmentName']; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" value="1234" name="password" class="form-control" placeholder="password" required hidden>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="date_registered" hidden>
                    </div>
                    
                    <div class="form-group">
                        <input type="date" class="form-control" name="date_modified" hidden>
                    </div>
                            
                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-primary btn-block mb-4"> Register </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- category modal -->
<div class="modal fade" id="new_category" tabindex="-1" role="dialog" aria-labelledby="#new_category" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Categories</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registerCategoryAction.php" method="POST">                  
                    <!-- category_name input -->
                    <div class="form-group">
                        <input type="text"  class="form-control" name="category_name" placeholder="category name" required>
                    </div>
                    <div class="form-group">
                        <?php
                            $getUserID = $conn->query("SELECT * FROM `super_admin` where admin_id = {$_SESSION['userData']['admin_id']} ");
                            $result = mysqli_fetch_array($getUserID);
                        ?>
                        <input type="number" value="<?php echo $result['admin_id']; ?>" name="addedBy" class="form-control" placeholder="" hidden required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="time_added" hidden>
                    </div>
                    
                    <div class="form-group">
                        <input type="date" class="form-control" name="date_modified" hidden>
                    </div>
                            
                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-primary btn-block mb-4"> Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- department modal -->
<div class="modal fade" id="new_department" tabindex="-1" role="dialog" aria-labelledby="#new_department" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Add Department</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registerDepartmentNameAction.php" method="POST">                  
                    <!-- category_name input -->
                    <div class="form-group">
                        <input type="text"  class="form-control" name="departmentName" placeholder="category name" required>
                    </div>
                    <div class="form-group">
                        <?php
                            $getUserID = $conn->query("SELECT * FROM `super_admin` where admin_id = {$_SESSION['userData']['admin_id']} ");
                            $result = mysqli_fetch_array($getUserID);
                        ?>
                        <input type="number" value="<?php echo $result['admin_id']; ?>" name="addedBy" class="form-control" placeholder="" hidden required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="timeAdded" hidden>
                    </div>
                    
                    <div class="form-group">
                        <input type="date" class="form-control" name="timeModified" hidden>
                    </div>
                            
                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-primary btn-block mb-4"> Add Department</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- coment modal -->
<div class="modal fade" id="comentModal" tabindex="-1" role="dialog" aria-labelledby="#comentModal" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Submit You Opinion About Our Service</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="sendComentAction.php" method="POST">                  
                    <!-- category_name input -->
                    <div class="form-group">
                        <input type="text"  class="form-control" name="whoSend" value="<?php echo $_SESSION['userData']['employee_id']; ?>" hidden placeholder="sender" required>
                    </div>
                    <div class="form-group">
                        <textarea name="userComent" id="coment" placeholder="Enter Your Coment" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="timeSent" hidden>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- asset to which category -->
<div class="modal fade" id="new_asset" tabindex="-1" role="dialog" aria-labelledby="#new_asset" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Choose Category First</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="registerAssetAction.php" method="POST">                    
                    <div class="form-group">
                        <select name="whichCategory" class="form-control" id="whichCategory" required>
                            <option hidden><--Choose Category--></option>
                            <?php
                                $getDep = $conn->query("SELECT * FROM `assetcategory` ");
                                while($result = mysqli_fetch_array($getDep)){ ?>
                                    <option value="<?php echo $result['category_name']; ?>"><?php echo $result['category_name']; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submitChoosenCategory" class="btn btn-primary btn-block mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>