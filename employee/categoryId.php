<?php
    require_once('../include/sidebar.php');
    require_once('../include/messages.php');
    if(isset($_GET['key'])){}
?>

<h3 class="text-center text-capitalize">Asset based on your selected category</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                    <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                        data-target="#comentModal">Submit Opinion About Service <i class="fa fa-plus fa-sm"></i>
                    </button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Asset Name</th>
                        <th>Qt</th>
                        <th>Discription</th>
                        <th>Brand</th>
                        <th>From_Category</th>
                        <th>ram Size</th>
                        <th>disk Size</th>
                        <th>proccessor Speed</th>
                        <th>requestStatusResult</th>
                        <th>Time Issued</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $new_asset_record = $conn->query("SELECT * FROM assetissued, asset_managed, assetcategory, employee WHERE
                                assetissued.assetBorrowed = asset_managed.asset_id and
                                asset_managed.whichCategory = assetcategory.categoryId and
                                employee.employee_id = {$_SESSION['userData']['employee_id']} and
                                assetcategory.categoryId = {$_GET['userCategory']}");
                            $get_asset_result = mysqli_num_rows($new_asset_record);
                            while($get_asset_result = mysqli_fetch_array($new_asset_record)):
                                if($get_asset_result > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $get_asset_result['asset_name']; ?> </td>
                                        <td><?php echo $get_asset_result['quantity']; ?> </td>
                                        <td><?php echo $get_asset_result['asset_discription']; ?> </td>
                                        <td><?php echo $get_asset_result['brande_name']; ?> </td>
                                        <td><?php echo $get_asset_result['category_name']; ?> </td>
                                        <td><?php echo $get_asset_result['ramSize']; ?> </td>
                                        <td><?php echo $get_asset_result['diskSize']; ?> </td>
                                        <td><?php echo $get_asset_result['proccessorSpeed']; ?> </td>
                                        <td>
                                            <?php
                                                if($get_asset_result['requestStatusResult'] == "pending"){ ?>
                                                    <p class="badge badge-primary">Pending</p>
                                               <?php }
                                                elseif($get_asset_result['requestStatusResult'] == "denied"){ ?>
                                                    <p  class="badge badge-danger">Request Denied</p>
                                                <?php }
                                                elseif($get_asset_result['requestStatusResult'] == "not taken"){ ?>
                                                    <p  class="badge badge-danger">Not Taken</p>
                                                <?php }
                                                elseif($get_asset_result['requestStatusResult'] == "Returned"){ ?>
                                                    <p  class="badge badge-primary">Returned</p>
                                                <?php }
                                                else{ ?>
                                                    <p  class="badge badge-success">Request Accepted <i class="fa fa-check text-primary"></i></p>
                                                <?php } ?>
                                        </td>
                                        <td><?php echo $get_asset_result['timeBorrowed']; ?> </td>
                                        <td>                                            
                                            <?php
                                                if($get_asset_result['requestStatusResult'] == "Returned" || $get_asset_result['requestStatusResult'] == "not taken"){ 
                                                    if($get_asset_result['assetQuantity'] != 0){?>
                                                        <form action="requestAssetAction.php" method="post">
                                                            <input type="number" name="issuedId" value="<?php echo $get_asset_result['issuedId']; ?>" hidden required>
                                                            <input type="number" name="assetQuantity" value="<?php echo $get_asset_result['assetQuantity'] - 1; ?>" hidden required>
                                                            <input type="number" name="whoBorrow" value="<?php echo $_SESSION['userData']['employee_id']; ?>" hidden required>
                                                            <input type="number" name="assetBorrowed" value="<?php echo $get_asset_result['asset_id']; ?>" required hidden>
                                                            <input type="text" name="requestStatusResult" value="pending" required hidden>
                                                            <input type="date" name="timeBorrowed" hidden>
                                                            <input type="date" name="timeReturned" hidden>
                                                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Borrow</button>
                                                        </form>
                                                <?php }}
                                                elseif($get_asset_result['requestStatusResult'] == "accepted"){
                                                    if($get_asset_result['employee_id'] == $_SESSION['userData']['employee_id']){
                                                        if($get_asset_result['requestStatusResult'] == "accepted"){ ?>
                                                            <form action="requestAssetAction.php?assetId=<?php echo $get_asset_result['asset_id']; ?>" method="post">
                                                                <input type="number" name="issuedId" value="<?php echo $get_asset_result['issuedId']; ?>" hidden required>
                                                                <input type="number" name="assetQuantity" value="<?php echo $get_asset_result['assetQuantity'] + 1; ?>" hidden required>
                                                                <input type="text" name="requestStatusResult" value="Returned" required hidden>
                                                                <input type="date" name="timeReturned" hidden>
                                                                <input type="number" name="whoReturn" value="<?php echo $_SESSION['userData']['employee_id']; ?>" hidden required>
                                                                <button type="submit" name="return" class="btn btn-sm btn-danger">Return</button>
                                                            </form>
                                                <?php } } }
                                            ?>
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
    // require_once('../modals/modal.php');
    // require_once('../include/footer.php'); 
?>
            </div>
        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> &copy; Asset-Management-System <?php echo date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/js/kvm.js"></script>

    <!-- Page level plugins -->
    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/datatables-demo.js"></script>
    <script src="../asset/js/jquery.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/popper.js"></script>
    
    <script type="text/javascript">
        // new window doc
        
        function myProfile(){
            var profile = window.open('', '_blank', 'height=500 width=750');
                profile.document.write(document.getElementById('my_profile').innerHTML);
        }
        // hide alert
        $(document).ready(function() {

            $(".alert").hide();
        
            $(".alert").fadeTo(5000, 1000).slideUp(1000, function() {
                $(".alert").slideUp(1000);
            });
        });
    </script>
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
</body>
</html>