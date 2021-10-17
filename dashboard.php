<?php

include ('include/header.php');
include ('include/navbar.php');



$noStudent = mysqli_query($con, "SELECT COUNT(*) from known_faces WHERE userType='Student'"); 
$studentcount = mysqli_fetch_array($noStudent);

$noEmployee = mysqli_query($con, "SELECT COUNT(*) from known_faces WHERE userType='Employee'"); 
$employeecount = mysqli_fetch_array($noEmployee);


$noFaceDetected= mysqli_query($con, "SELECT COUNT(*) from attendance"); 
$noDetected = mysqli_fetch_array($noFaceDetected);

$average= mysqli_query($con, "SELECT SUM(match_score) / COUNT(match_score) from attendance"); 
$averageScore = mysqli_fetch_array($average);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 


<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">
                                    Real-time Face Recognition System with Haar Cascade Classifier and Local Binary Pattern Histogram
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- Material statustic card start -->
                                            <div class="col-xl-4 col-md-12">
                                                <div class="card mat-stat-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center b-b-default">
                                                            <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                                                <div class="row align-items-center text-center">
                                                                    <div class="col-4 p-r-0">
                                                                        <i class="far fa-user text-c-purple f-24"></i>
                                                                    </div>
                                                                    <div class="col-8 p-l-0">
                                                                        <h5><?php   echo "$employeecount[0] " ?></h5>
                                                                        <p class="text-muted m-b-0">Registered Employee</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 p-b-20 p-t-20">
                                                                <div class="row align-items-center text-center">
                                                                    <div class="col-4 p-r-0">
                                                                        <i class="far fa-user text-c-redMember’s performance
 f-24"></i>
                                                                    </div>
                                                                    <div class="col-8 p-l-0">
                                                                        <h5><?php   echo "$studentcount[0] " ?></h5>
                                                                        <p class="text-muted m-b-0">Registered Student</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <div class="card mat-stat-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center b-b-default">
                                                            <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                                                <div class="row align-items-center text-center">
                                                                    <div class="col-4 p-r-0">
                                                                        <i class="fas fa-share-alt text-c-purple f-24"></i>
                                                                    </div>
                                                                    <div class="col-8 p-l-0">
                                                                        <h5><?php   echo "$noDetected[0] " ?></h5>
                                                                        <p class="text-muted m-b-0">Face Detected</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 p-b-20 p-t-20">
                                                                <div class="row align-items-center text-center">
                                                                    <div class="col-4 p-r-0">
                                                                        <i class="fas fa-sitemap text-c-green f-24"></i>
                                                                    </div>
                                                                    <div class="col-8 p-l-0">
                                                                        <h5>5</h5>
                                                                        <p class="text-muted m-b-0">Unauthorized</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <div class="card mat-clr-stat-card text-white red ">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-3 text-center bg-c-red">
                                                                <i class="fas fa-star mat-icon f-24"></i>
                                                            </div>
                                                            <div class="col-9 cst-cont">
                                                                <h2><?php   echo "$averageScore[0] " ?>%</h2>
                                                                <h6 class="m-b-0">Averange Recognition Score</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <!-- Material statustic card end -->
                                            <!-- order-visitor start -->


                                            <!-- order-visitor end -->

                                            <!--  sale analytics start -->
                                            <div class="col-xl-6 col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>KNOWN FACE DETECTED</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                            <?php $results = mysqli_query($con, "SELECT * from attendance"); ?>
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
                                                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                                                                            <tr>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['personType']; ?></td>
                                                                <td><?php echo $row['time']; ?></td>
                                                                <td><?php echo $row['date']; ?></td>
                                                                <td><?php echo $row['match_score']; ?></td>

                                                        </tr>

                                                                </tbody>
                                                                <?php } ?>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                                   <!-- LINE CHART start -->
                                            <div class="col-md-12 col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                    <div class="chart-container">
                                                    <canvas id="mycanvas"></canvas>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- LINE CHART Ends -->
                                                  









                                        
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>

<script>
$(document).ready(function(){
    $.ajax({
      url : "linegraph.php",
      type : "GET",
      success : function(data){
        console.log(data);
  
        var faceid = [];
        var accuracy_number = [];

  
        for(var i in data) {
          faceid.push("Face ID " + data[i].faceid);
          accuracy_number.push(data[i].accuracy_number);
        }
  
        var chartdata = {
          labels: accuracy_number,
          datasets: [
            {
              label: "Accuracy",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(59, 89, 152, 0.75)",
              borderColor: "rgba(59, 89, 152, 1)",
              pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
              pointHoverBorderColor: "rgba(59, 89, 152, 1)",
              data: accuracy_number
            }
          ]
        };
  
        var ctx = $("#mycanvas");
  
        var LineGraph = new Chart(ctx, {
          type: 'line',
          data: chartdata
        });
      },
      error : function(data) {
  
      }
    });
  });


</script>
