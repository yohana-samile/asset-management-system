<?php
    require_once('../include/sidebar.php');
    require_once('../include/messages.php');
    if(isset($_GET['key'])){}

        $queryForMessage = $conn->query("SELECT * FROM employee, useropinion WHERE employee.employee_id = useropinion.whoSend ORDER BY `useropinion`.`timeSent` desc");
        $getMessage = mysqli_num_rows($queryForMessage);
        while($getMessage = mysqli_fetch_array($queryForMessage)):
            if($getMessage > 0): ?>
                <div class="container bg-dark text-white"><br>
                    <div class="row">
                        <div class="col-md-8 border-left-primary">
                            <div class="bg-white text-dark">
                                <p>Sender: <span class="badge badge-primary"><?php echo $getMessage['first_name']. " " .$getMessage['last_name']; ?></span> </p>
                                <p>Message: -> <?php echo $getMessage['userComent']; ?> </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <p>Time Sent: <span class="badge badge-primary"><?php echo $getMessage['timeSent']; ?></span> </p>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        endwhile;
    require_once('../include/footer.php');
?>