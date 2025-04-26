<?php
$dbhost ='localhost';
$dbuser = 'root';
 $dbpass ='';
 $dbname ='login';
$conn= mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
 //now check the connection
if(!$conn)
{
die("Connection Failed:".mysqli_error());
}
//echo "connected successfully <br> ";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Manage User</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .content {
        margin: 50px auto;
        max-width: 10000px;
        padding: 10px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card {
        margin-bottom: 30px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .box-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        font-weight: bold;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .badge-delete {
        background-color: #f5555;
        color: #fff;
        padding: 5px 10px;
        border-radius: 3px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .badge-delete:hover {
        background-color: #ff0000;
    }

    footer {
        padding: 10px;
        background-color: #f8f9fa;
        text-align: center;
        font-size: 12px;
        color: #666;
    }
</style>


    </head>
    <body>

            <?php
            function get_safe_value($conn,$str){
                if($str!=''){
                    $str=trim($str);
                    return mysqli_real_escape_string($conn,$str);
                }
            }
if(isset($_GET['type']) && $_GET['type']!=''){
$type=get_safe_value($conn,$_GET['type']);
if($type=='delete'){
$id=get_safe_value($conn,$_GET['id']);
$delete_sql="delete from user where id='$id'";
mysqli_query($conn,$delete_sql);
}
}
$sql="SELECT * FROM user";
$result=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">REGISTERED USERS : - </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th>id</th>
							   <th>username</th>
							   <th>password</th>
							   <th>created_at</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($result)){?>
							<tr>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['username']?></td>
							   <td><?php echo $row['password']?></td>
							   <td><?php echo $row['created_at']?></td>
                               </td>
							   <td>
								<?php
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; eSportnewzz 2022</div>
                            <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
