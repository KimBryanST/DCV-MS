<?php
  include "connection.php";
  $id="";
  $name="";
  $id_number="";
  $vio_date="";
  $appeal_date="";
  $appeal_reason="";
  $vio_status="";
  $admin_remarks="";
  
  $error="";
  $success="";
  
/*GET DATA AND POST IT IN THE VALUE*/

  if($_SERVER["REQUEST_METHOD"]=='GET'){
      
    if(!isset($_GET["id"])){
      header("location:studentIndex.php");
      exit;
    }
    
    $id = $_GET["id"];
    $sql = "SELECT CONCAT(first_name, ' ', last_name) AS name, id_number, vio_date, appeal_date, vio_status, admin_remarks,id,appeal_reason FROM admin_table where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(!$row){
      header("location:studentIndex.php");
      exit;
    }
    
    $name=$row["name"];
    $id_number=$row["id_number"];
    $vio_date=$row["vio_date"];
    $appeal_date=$row["appeal_date"];
    $appeal_reason=$row["appeal_reason"];
    $vio_status=$row["vio_status"];
    $admin_remarks=$row["admin_remarks"];

  }
  
  else{
     /*POST THE DATA IN PHPMYADMIN*/
      $id = $_GET["id"];
      $appeal_reason=$_POST["appeal_reason"];
      $previousPage = $_POST['previous_page'] ?? '/';
      
      $sql = "UPDATE admin_table SET appeal_reason='$appeal_reason' WHERE id='$id'";
      $result = $conn->query($sql);
      if($result){
          header("Location:$previousPage");
      }
      else{
          die(mysqli_error($conn));
      }

  }
  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DCV-MS - Student</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/select/2.1.0/css/select.dataTables.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?php echo $previousPage; ?>">DCV-MS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">Menu</div>
                           
                            <a class="nav-link" href="studentIndex.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Violations
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Student
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <form method="POST">
                    <div class="container overflow-hidden text-center">
                      <div class="row gx-5">
                        <div class="col">
                         <div class="p-3">Violation Evidence</div>
                         <img src="assets/img/id.png" class="img-fluid" alt="...">
                        </div>
                        <div class="col">
                          <div class="p-3">Violation Details</div>
                          <div class="mb-3">
                              <label class="form-label">Name</label>
                              <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $name;?>" disabled readonly>
                            </div>

                            <div class="mb-3">
                              <labelclass="form-label">ID Number</label>
                              <input type="text" class="form-control" id="formGroupExampleInput2"value="<?php echo $id_number;?>" disabled readonly>
                            </div>

                            <div class="mb-3">
                              <labelclass="form-label">Violation Date</label>
                              <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $vio_date;?>" disabled readonly>
                            </div>

                            <div class="mb-3">
                              <labelclass="form-label">Appealed Date</label>
                              <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $appeal_date;?>" disabled readonly>
                            </div>

                            <div class="mb-3">
                              <labelclass="form-label">Admin Remarks</label>
                              <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $admin_remarks;?>" disabled readonly>
                            </div>

                            <div class="mb-3">
                              <labelclass="form-label">Violation Status</label>
                              <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $vio_status;?>" disabled readonly>
                            </div>

                            <div class="mb-3">
                              <labelclass="form-label">Appeal Reason</label>
                              <textarea type="text" class="form-control" id="formGroupExampleInput2" placeholder="<?php echo $appeal_reason;?>" name="appeal_reason" required></textarea>
                            </div> 

                            <div class="col-12">
                                <input type="hidden" name="previous_page" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>


                            








                        </div>
                      </div>
                    </div>
                    </form>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/StudentDatatable.js"></script>

        <!-- Datable JS -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
        <script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.js"></script>
        <script src="https://cdn.datatables.net/select/2.1.0/js/select.dataTables.js"></script>
    </body>
</html>
