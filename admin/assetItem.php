<?php
    require_once('../include/sidebar.php');
    require_once('../include/messages.php');
    if(isset($_GET['key'])){}
?>

<h3 class="text-center text-capitalize">This is list of registered asset</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                    <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                        data-target="#new_asset">New asset <i class="fa fa-plus fa-sm"></i>
                    </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Asset Name</th>
                        <th>Discription</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>ram Size</th>
                        <th>disk Size</th>
                        <th>proccessor Speed</th>
                        <th>From_Category</th>
                        <th>Added By_Admin</th>
                        <th>Time Registered</th>
                        <th>Time Edited</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $new_asset_record = $conn->query("SELECT * FROM asset_managed, assetcategory where asset_managed.whichCategory = assetcategory.categoryId  ");
                            $get_asset_result = mysqli_num_rows($new_asset_record);
                            while($get_asset_result = mysqli_fetch_array($new_asset_record)):
                                if($get_asset_result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $get_asset_result['asset_name']; ?> </td>
                                        <td><?php echo $get_asset_result['asset_discription']; ?> </td>
                                        <td><?php echo $get_asset_result['brande_name']; ?> </td>
                                        <td><?php echo $get_asset_result['quantity']; ?> </td>
                                        <td><?php echo $get_asset_result['ramSize']; ?> </td>
                                        <td><?php echo $get_asset_result['diskSize']; ?> </td>
                                        <td><?php echo $get_asset_result['proccessorSpeed']; ?> </td>
                                        <td><?php echo $get_asset_result['category_name']; ?> </td>
                                        <td class="text-center"><i class="fa fa-check text-primary"></i> </td>
                                        <td><?php echo $get_asset_result['date_registered']; ?> </td>
                                        <td><?php echo $get_asset_result['date_modified']; ?> </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4" hidden>
                                                    <a href="" data-target="<?php echo $get_asset_result['asset_id']; ?>" data-toggle="modal"><i class="fa fa-eye text-warning"></i></a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="" data-target="#editAsset<?php echo $get_asset_result['asset_id']; ?>" data-toggle="modal"><i class="fa fa-edit text-warning"></i></a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="" data-target="#deletAsset<?php echo $get_asset_result['asset_id']; ?>" data-toggle="modal"><i class="fa fa-trash-o text-danger"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                <?php endif; ?>

                                <!-- modals for asset -->                                
                                <!-- edit asset -->
                                <div class="modal fade" id="editAsset<?php echo $get_asset_result['asset_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#<?php echo $get_asset_result['asset_id']; ?>" aria-hiden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h3 class="modal-title text-center" id="edit_vehacle">Update Asset Information</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="updateInformationAction.php?key=<?php echo $get_asset_result['asset_id']; ?>" method="POST">                  
                                                    <!-- category_name input -->
                                                    <div class="form-group">
                                                        <input type="text"  class="form-control" name="asset" value="<?php echo $get_asset_result['asset_id']; ?>"  hidden required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="asset_name">Enter Asset Name</label>
                                                        <input type="text"  class="form-control" name="asset_name" value="<?php echo $get_asset_result['asset_name']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="asset_discription" id="asset_discription" value="<?php echo $get_asset_result['asset_discription']; ?>"  placeholder="Enter Your asset_discription" class="form-control" cols="30" rows="10"></textarea>
                                                    </div>                    
                                                    <div class="form-group">
                                                        <label for="brande_name">Enter Brand Name</label>
                                                        <input type="text"  class="form-control" name="brande_name" value="<?php echo $get_asset_result['brande_name']; ?>" required>
                                                    </div>                    
                                                    <div class="form-group">
                                                        <select name="whichCategory" class="form-control" id="whichCategory" required>
                                                            <option hidden>Choose Category</option>
                                                            <?php
                                                                $getDep = $conn->query("SELECT * FROM `assetcategory` ");
                                                                while($result = mysqli_fetch_array($getDep)){ ?>
                                                                    <option value="<?php echo $result['categoryId']; ?>"><?php echo $result['category_name']; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                    <!-- Submit button -->
                                                    <button type="submit" name="updateAsset" class="btn btn-primary btn-block mb-4">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete asset -->
                                <div class="modal fade" id="deletAsset<?php echo $get_asset_result['asset_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#<?php echo $get_asset_result['asset_id']; ?>" aria-hiden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h3 class="modal-title text-center" id="edit_vehacle">Are You Sure You Want Delete This Item???</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="text-white">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="updateInformationAction.php?key=<?php echo $get_asset_result['asset_id']; ?>" method="POST"> 
                                                    <!-- Submit button -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="" data-dismiss="modal" class="btn btn-primary btn-block mb-4">Cancel</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" name="deleteAsset" class="btn btn-danger btn-block mb-4">Yes Delete</button>
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