<?php include ('partials/menu.php'); ?>

<!-- main content section starts -->
<div class="main-content">
            <div class="wrapper">
                 <h1>Manage Category</h1>

                 <br/> <br/>


                 <?php
                    
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                  ?>

                  <br><br>


<!-- button to add admin -->
   <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

<br/> <br/> <br/>

<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>


    <?php

        //query to get all category from database
        $sql = "SELECT * FROM tbl_category"; 
        
        //execute query
        $res = mysqli_query($conn, $sql);

        //count rows
        $count = mysqli_num_rows($res);

        //create serial number variable and assign value as 1
        $sn = 1;

        //check whether we have data in database or not
        if($count>0)
        {
            //we have data in database
            //get the data and display
            while($row=mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

                ?>


                <tr>
                    <td><?php echo $sn++; ?>.</td>
                    <td><?php echo $title; ?></td>

                    <td>

                        <?php 
                            //check whether image_name is available or not
                            if($image_name!="")
                            {
                                //display the image
                                ?>

                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="70px">

                                <?php
                            }
                            else
                            {
                                //display the message
                                echo "<div class='error'>Image Not Added</div>";
                            }
                        ?>

                    </td>

                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                    <a href="#" class="btn-secondary">Update Category</a>
                    <a href="#" class="btn-danger">Delete Category</a>
                    </td>
                </tr>



                <?php
            }

        }
        else
        {
            //we do not have data
            //we will display the message inside table
            ?>

            <tr>
                <td colspan="6"><div class="error">No Category Added</div></td>
            </tr>

            <?php
        }
    
    ?>                


    

</table>
                 
            </div>
        </div>
        <!-- main content section ends -->

<?php include ('partials/footer.php'); ?>