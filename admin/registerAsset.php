<?php
    require_once('../include/sidebar.php');
    require_once('../include/messages.php');
    if(isset($_GET['key'])){}
?>
<div class="container col-md-6">
    <h3>Register asset here</h3>
    <form action="registerAssetAction.php" method="POST">                  
        <!-- category_name input -->
        <div class="form-group">
            <input type="text"  class="form-control" name="asset_name" placeholder="Asset name" required>
        </div>
        <div class="from-group">
            <textarea name="asset_discription" class="form-control" id="asset_discription" cols="30" placeholder="asset Discrptions"></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="brande_name" placeholder="Brand name" required>
        </div>
        <div class="form-group">
            <input type="number"  class="form-control" name="quantity" placeholder="quantity" required>
        </div>
        <div class="form-group">
            <?php
                $getUserID = $conn->query("SELECT * FROM `super_admin` where admin_id = {$_SESSION['userData']['admin_id']} ");
                $result = mysqli_fetch_array($getUserID);
            ?>
            <input type="number" value="<?php echo $result['admin_id']; ?>" name="registered_by" class="form-control" placeholder="" hidden required>
        </div>
        <div class="form-group">
            <select name="whichCategory" class="form-control" id="whichCategory" required>
                <option hidden><--Choose Category--></option>
                <?php
                    $getDep = $conn->query("SELECT * FROM `assetcategory` where assetcategory.category_name != 'computer' ");
                    while($result = mysqli_fetch_array($getDep)){ ?>
                        <option value="<?php echo $result['categoryId']; ?>"><?php echo $result['category_name']; ?></option>
                    <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="date_registered" hidden>
        </div>
        
        <div class="form-group">
            <input type="date" class="form-control" name="date_modified" hidden>
        </div>
        <!-- Submit button -->
        <button type="submit" name="register" class="btn btn-primary btn-block mb-4"> Add Asset</button>
    </form>
</div>
<?php require_once('../include/footer.php'); ?>