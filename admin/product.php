<?php include ('session.php');?>	
<?php include ('header.php');


$userid = $_SESSION['id'];
?>	
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#	">Foodies</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown"> 
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      						
					  Welcome : Administrator
                    </a>
                  
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           
							 <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              Add Product
                            </button>
							
						
                        </h1>
						<?php include ('modal_add_product.php');?>
						
						<div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Product Table</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Filter</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
										<th>Rating</th>
                                        <th>Chef Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                            
        $query2 = mysql_query("select * from tb_user where user_id = $userid") or die(mysql_error());

while ($row2 = mysql_fetch_array($query2))
{
	$username = $row2["username"];
	
}

$query3 = mysql_query("select * from restaurants where owner = $username") or die(mysql_error());

while ($row3 = mysql_fetch_array($query3))
{
	$resid = $row3["id"];
	
}

							$query = mysql_query("select * from tb_products where resid=$resid") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $id = $row['productID'];
										
																
										$query1 = mysql_query("SELECT *,SUM(qty) as qty FROM order_details WHERE productID = '$id' AND status = 'Delivered'");
										$row1 = mysql_fetch_array($query1);
										$total=$row['quantity'] - $row1['qty'];
										$query2 = mysql_query ("UPDATE product set quantity = '$total' where productID = '$id'");

                                        ?>
                                        <tr class="warning">
                                            <td><?php echo $row['name']; ?></td> 
                                            <td><?php echo $row['description']; ?></td> 
                                            <td><?php echo $row['category']; ?></td> 
                                            <td><?php echo $row['filter']; ?></td> 
                                            <td style="text-align:right;"><?php echo number_format($row['price'],2); ?></td> 
                                            <td style="text-align:center;"><?php echo $total; ?></td> 
											 <td><?php echo $row['rating']; ?></td> 
                                            <td><?php echo $row['chef']; ?></td> 
											
                                            <td width="50" align="center"><img src="<?php echo $row['location']; ?>" class="img-rounded" width="50" height="40"></td> 
                                            <td width="160">
                                                <a href="#delete_product<?php echo $id; ?>" role="button"  data-target = "#delete_product<?php echo $id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                                <a href="edit_product.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                                            </td>
                                            <!-- product delete modal -->
                                   <?php include ('delete_product_modal.php');?>
                                    <!-- end delete modal -->

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                
				
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
