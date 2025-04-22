<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['save']))
{
  $fullname=$_POST['fullname'];
  $mobnumber=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $meet=$_POST['whomtomeet'];
  $department=$_POST['department'];
  $reason=$_POST['reasontomeet'];
  $sql="insert into tblvisitor(FullName,Email,MobileNumber,Address,WhomtoMeet,Deptartment,ReasontoMeet) value(:fullname,:email,:mobnumber,:address,:meet,:department,:reason)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':mobnumber',$mobnumber,PDO::PARAM_STR);
  $query->bindParam(':address',$address,PDO::PARAM_STR);
  $query->bindParam(':meet',$meet,PDO::PARAM_STR);
  $query->bindParam(':department',$department,PDO::PARAM_STR);
  $query->bindParam(':reason',$reason,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) 
  {
    echo '<script>alert("Registered successfully")</script>';
    echo "<script>window.location.href ='new_visitor.php'</script>";
  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
               <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Register Visitor</h5>
              </div>
              <div class="col-md-12 mt-4">
                <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="row ">
                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Full Names</label>
                      <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" required="">
                    </div>
                    <form action="/action_page.php">
  
 <input type="radio" id="Male" name="fav_language" value="Male">
  <label for="html">Male</label><br>
  <input type="radio" id="css" name="fav_language" value="Female">
  <label for="Female">Female</label><br>
  
  

                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Visitor Email </label>
                      <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" required="">
                    </div>
                  </div>
                
                  <div class="row ">
                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Contact Number</label>
                      <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" class="form-control" maxlength="10" required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Whom to Meet </label>
                      <input type="text" id="whomtomeet" name="whomtomeet" placeholder="Whom to Meet" class="form-control" required="">
                    </div>
                  </div>
                  <div class="row ">
                    <div class="form-group col-md-6 ">
                      <label for="exampleInputPassword1">Department</label>
                      <input type="text" id="department" name="department" placeholder="Department" class="form-control" required="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputName1">Reason To Meet </label>
                      <input type="text" id="reasontomeet" name="reasontomeet" placeholder="Reason To Meet" class="form-control" required="">
                    </div>
                  </div>
                  <div class="row ">
                    <div class="form-group col-md-6 offset-md-6 ">
                      <label for="exampleInputPassword1">Address</label>
                      <textarea name="address" id="address" rows="9" placeholder="Enter Visitor Address..." class="form-control" required=""></textarea>
                    </div>

                  </div>
                  <button type="submit" style="float: left;" name="save" class="btn btn-info  mr-2 mb-4">Save</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <?php @include("includes/footer.php");?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php @include("includes/foot.php");?>
<!-- End custom js for this page -->
</body>
</html>