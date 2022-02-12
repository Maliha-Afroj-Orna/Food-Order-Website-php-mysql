<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <form action="" method="POST">

            <table class="tbl-30">

                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php include ('partials/footer.php'); ?>


<?php 
  //process the value from form and save it in database

  //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
       // echo "Button Clicked";

       //1. get the data from form
       
      $full_name = $_POST['full_name'];
      $username  = $_POST['username'];
      $password  = md5($_POST['password']);   //password encryption with md5

      //2. SQL Query to save data into database 
      $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username  = '$username',
            password  = '$password'
      "; 

     
      // $res = mysqli_query($conn, $sql) or die(mysqli_error());
     
    }

?>