<?php
   include('include/header.php');
   include('include/navbar.php');
   
   if (isset($_GET['view'])) {
       $id = $_GET['view'];
     }
   
   $results = mysqli_query($con, "SELECT * from known_faces WHERE face_id='$id'"); 
   $row = mysqli_fetch_array($results)
   ?>
<head>
   <!--<link rel="stylesheet" href="../facerecog-webapp-main/assets//css/User.css"> -->
</head>
<body>
   <div class="pcoded-content">
      <!-- Page-header start -->
      <div class="page-header">
         <div class="page-block">
            <div class="row align-items-center">
               <div class="col-md-8">
                  <div class="page-header-title">
                     <h5 class="m-b-10">User Information</h5>
                  </div>
               </div>
               <div class="col-md-4">
                  <ul class="breadcrumb">
                     <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                     </li>
                     <li class="breadcrumb-item"><a href="#!">User Information</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <br>
      <!-- Page-header end -->
   </div>
   <div class="container">
      <div class="main-body">
         <div class="row gutters-sm">
            <div class="col-md-2"></div>
            <div class="col-md-4 mb-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex flex-column align-items-center text-center">
                        <img src="assets/images/avatar.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                           <h4>   <?php echo $row['name'] ?></h4>
                           <p class="text-secondary mb-1">Full Stack Developer</p>
                           <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $row['name'] ?>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Face ID</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $row['face_id'] ?>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Type</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           Student
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Birthdate</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $row['birthdate'] ?>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Course</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                           <?php echo $row['course'] ?>
                        </div>
                     </div>
                     <hr>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-4">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Update Information
                        </button>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <!-- Modal Header -->
                                 <div class="modal-header">
                                    <h4 class="modal-title">Modal Heading</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 </div>
                                 <!-- Modal body -->
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label>Full Name:</label>
                                       <input type="" name="" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label>Student ID :</label>
                                       <input type="" name="" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label>User Type :</label>
                                       <input type="" name="" disabled="disable" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label>College :</label>
                                       <input type="" name="" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label>Course :</label>
                                       <input type="" name="" id="" class="form-control">
                                    </div>
                                 </div>
                                 <!-- Modal footer -->
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-4">
               <div class="md-form md-outline input-with-post-icon datepicker">
                  <input placeholder="Select date" type="date" id="example" class="form-control">
               </div>
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
               <table class="table table-hover">
                  <?php $logrecs = mysqli_query($con, "SELECT * from attendance where face_id='$id'"); ?>
                  <thead>
                     <tr>
                        <th>Name </th>
                        <th> Type </th>
                        <th>Time </th>
                        <th>Date</th>
                        <th>Match Score</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php while ($arr = mysqli_fetch_array($logrecs)) { ?>
                     <tr>
                        <td><?php echo $arr['name']; ?></td>
                        <td><?php echo $arr['personType']; ?></td>
                        <td><?php echo $arr['time']; ?></td>
                        <td><?php echo $arr['date']; ?></td>
                        <td><?php echo $arr['match_score']; ?></td>
                     </tr>
                  </tbody>
                  <?php } ?>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!--<div id="styleSelector"></div>
      </div>
      </div>
      </div>
      </div> -->
   <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
   <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
   <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
   <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
   <!-- waves js -->
   <script src="assets/pages/waves/js/waves.min.js"></script>
   <!-- jquery slimscroll js -->
   <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
   <script src="assets/js/pcoded.min.js"></script>
   <script src="assets/js/vertical/vertical-layout.min.js"></script>
   <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <!-- Custom js -->
   <script type="text/javascript" src="assets/js/scripts.min.js"></script>
</body>
</html>