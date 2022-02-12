<?php include('partials/menu.php'); ?>

        <!-- main content section starts -->
        <div class="main-content">
            <div class="wrapper">
                 <h1>Manage Admin</h1>
                 <br/> 


                <?php 

                    if(isset($_SESSION['add']))   //checking whether the session is set or not
                    {
                        echo $_SESSION['add'];    //displaying session message
                        unset($_SESSION['add']);  //removing session message
                    }    
            
                ?>
                <br><br><br>

                 <!-- button to add admin -->
                    <a href="add-admin.php" class="btn-primary">Add Admin</a>

                 <br/> <br/><br>

                 <table class="tbl-full">
                     <tr>
                         <th>S.N.</th>
                         <th>Full Name</th>
                         <th>Username</th>
                         <th>Actions</th>
                     </tr>


                     <?php 
                     
                       //query to get all admin from database
                        $sql = "SELECT * FROM tbl_admin";

                        //execute the query
                        $res = mysqli_query($conn, $sql);

                        //check whether the query is executed or not
                        if($res==TRUE)
                        {
                            //count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res); //function to get all the rows in database
                            
                            //create a variable and assign the value
                            $sn=1;    

                            //check the num of rows
                            if($count>0)
                            {
                                //we have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //using while loop to get all the data from database
                                    //and while loop will run as long as we have data in database

                                    //get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
 
                                    //display the values in our table
                                    ?>

                                      
                                        <tr>
                                            <td><?php echo $sn++; ?>.</td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                            <a href="#" class="btn-secondary">Update Admin</a>
                                            <a href="#" class="btn-danger">Delete Admin</a>
                                            </td>
                                        </tr>  



                                    <?php
                                }
                            }
                            else
                            {
                                //we do not have data in database
                            }
                        }

                     ?>


                 </table>


            </div>
        </div>
        <!-- main content section ends -->


<?php include('partials/footer.php'); ?>
