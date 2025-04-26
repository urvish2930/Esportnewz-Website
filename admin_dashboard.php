<?php
// Start the session
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // User is not authenticated, redirect to the login page
    header("Location: adminlogin.php");
    exit();
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
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="publisher.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
		<style>
			main{
			
           background: linear-gradient(68deg, rgba(17,45,244,1) 0%, rgba(93,79,255,1) 35%, rgba(27,43,126,1) 100%);
			}
			
		</style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">eS-Newzz Admin</a>
            <!-- Sidebar Toggle-->
          <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href=""><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="admlogout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: black;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                          <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="manageuser.php">Manage Users</a>
                                            <a class="nav-link" href="manageresponse.php">Manage contact response</a>
                                           
                                        </nav>
                                    </div>
                                   
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading"></div>
                            
                            </a>
                        </div>
                    </div>
                  <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                    Admin
                </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-white"> &nbsp;</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item active text-white-50">Dashboard</li>
                      </ol>
                        
                            
                        <div class="row">
                            <div class="col-xl-20">
                              <div class="card mb-4 style" style="background-color: #262626; color: white;">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Admin table
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th style="color: white;">Name</th>
                                            <th style="color: white;">Position</th>
                                            <th style="color: white;">Office</th>
                                            <th style="color: white;">Age </th>
                                            <th style="color: white;">Joining Year</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                        
                                        <tr style="color: #AFAFAF;">
                                            <td>Yagna Patel</td>
                                            <td>Front-End&nbsp;&nbsp;</td>
                                            <td>Ahmedabad &nbsp;</td>
                                            <td>18</td>
                                            <td>2022</td>
                                           
                                        </tr>
                                        <tr  style="color: #AFAFAF;">
                                            <td>Urvish Pandya</td>
                                            <td>Back-End&nbsp;</td>
                                            <td>Ahmedabad</td>
                                            <td>18</td>
                                            <td>2022</td>
                                            
                                        </tr>
                                        <tr  style="color: #AFAFAF;">
                                            <td>Rutik Patel</td>
                                            <td>Content-Management&nbsp;&nbsp;</td>
                                            <td>Ahmedabad</td>
                                            <td>20</td>
                                            <td>2022</td>
                                            
                                        </tr>
										<tr  style="color: #AFAFAF;">
                                            <td>Anuj Suthar</td>
                                            <td>Social -media- management&nbsp;</td>
                                            <td>Ahmedabad</td>
                                            <td>18</td>
                                            <td>2022</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                        </div>
                      <div class="card mb-4" style="background-color: #262626;">
                             <div class="card-header" style="color: white;">
    						<i class="fas fa-table me-1"></i>
                                social-media
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th style="color: white;">Name</th>
                                            <th style="color: white;">Password</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <tbody>
                                        
                                        <tr style="color: #AFAFAF;">
                                            <td>Instagram</td>
                                            <td>********&nbsp;&nbsp;</td>
                                           
                                           
                                        </tr>
                                        <tr  style="color: #AFAFAF;">
                                            <td>LinkedIn</td>
                                            <td>********</td>
                                           
                                            
                                        </tr>
                                        <tr  style="color: #AFAFAF;">
                                            <td>Twitter</td>
                                            <td>***********</td>
                                            
                                            
                                        </tr>
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  </div>
                </main>
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Admin @ eS-Newzz 2022</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
