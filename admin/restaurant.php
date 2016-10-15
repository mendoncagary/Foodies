<?php include ('session.php');?>	
<?php include ('header.php');?>	
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
                              Add Restaurant
                            </button>
							
						
                        </h1>
						<?php include ('modal_add_restaurant.php');?>
						
						<div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Restaurant Table</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Address</th>
                                        <th>Pincode</th>
										<th>Type</th>
                                        <th>Cuisines</th>
                                        <th>Cost</th>
										<th>Hours</th>
										<th>Rating</th>
										<th>Discount</th>
										<th>Owner</th>
										<th>Image</th>										
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                                    $query = mysql_query("select * from restaurants") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $id = $row['id'];
										
															

                                        ?>
                                        <tr class="warning">
                                            <td><?php echo $row['name']; ?></td> 
                                            <td><?php echo $row['location']; ?></td> 
                                            <td><?php echo $row['address']; ?></td> 
                                            <td><?php echo $row['pincode']; ?></td> 
											<td><?php echo $row['type']; ?></td> 
											<td><?php echo $row['cuisines']; ?></td> 
                                            <td style="text-align:center;"><?php echo $row['cost']; ?></td> 
                                            <td style="text-align:center;"><?php echo $row['hours']; ?></td> 
                                           <td style="text-align:center;"><?php echo $row['rating']; ?></td> 
										   <td><?php echo $row['discount']; ?></td> 
										   <td style="text-align:center;"><?php echo $row['owner']; ?></td>
										   <td width="50" align="center"><img src="<?php echo $row['image']; ?>" class="img-rounded" width="60" height="40"></td> 
                                            <td width="160">
                                                <a href="#delete_restaurant<?php echo $id; ?>" role="button"  data-target = "#delete_restaurant<?php echo $id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                                <a href="edit_restaurant.php<?php echo '?id=' . $id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a>
                                            </td>
                                            <!-- product delete modal -->
                                   <?php include ('delete_restaurant_modal.php');?>
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
