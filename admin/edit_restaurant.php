<?php include ('session.php');?>	
<?php
include('header.php');
$get_id = $_GET['id'];
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
                <a class="navbar-brand" href="index.html">Foodies </a>
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
                    <div class="col-md-5 well">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php include ('connect.php');
                            $query = mysql_query("select * from restaurants where id='$get_id'") or die(mysql_error());
                            $row = mysql_fetch_array($query);
                            ?>
						
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Edit Restaurant</strong> </div>
                                <hr>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="inputEmail" class = "form-control" value="<?php echo $row['name']; ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="location">Location</label>
                                    <div class="controls">
                                        <input type="text"  name="location"  class = "form-control" value="<?php echo $row['location']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="address">Address</label>
                                    <div class="controls">
                                        <input type="text"  name="address"  class = "form-control" value="<?php echo $row['address']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="address">Type</label>
                                    <div class="controls">
                                        <input type="text"  name="type"  class = "form-control" value="<?php echo $row['type']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="cuisines">Cuisines</label>
                                    <div class="controls">
                                        <input type="text"  name="cuisines"  class = "form-control" value="<?php echo $row['cuisines']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="cost">Cost</label>
                                    <div class="controls">
                                        <input type="text"  name="cost"  class = "form-control" value="<?php echo $row['cost']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="hours">Hours</label>
                                    <div class="controls">
                                        <input type="text"  name="hours"  class = "form-control" value="<?php echo $row['hours']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="rating">Rating</label>
                                    <div class="controls">
                                        <input type="text"  name="rating"  class = "form-control" value="<?php echo $row['rating']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="discount">Discount</label>
                                    <div class="controls">
                                        <input type="text"  name="discount"  class = "form-control" value="<?php echo $row['discount']; ?>">
                                    </div>
                                </div>
                              
                         <div class="control-group">
                                    <label class="control-label" for="owner">Owner</label>
                                    <div class="controls">
                                        <input type="text"  name="owner"  class = "form-control" value="<?php echo $row['owner']; ?>">
                                    </div>
                                </div>
                              
             
								
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image"> 
                                    </div>
                                </div>
								
									<hr/>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
										<span><a href = "restaurant.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['update'])) {

                                $name = $_POST['name'];
                                $location = $_POST['location'];
                                $address = $_POST['address'];
								$type = $_POST['type'];
								 $cuisines = $_POST['cuisines'];
                                $cost = $_POST['cost'];
                                $hours = $_POST['hours'];
								$rating = $_POST['rating'];
								$discount = $_POST['discount'];
                                
                                $owner = $_POST['owner'];

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];

                                mysql_query("update restaurants set name='$name',location='$location',address='$address'typ'$type',cuisines='$cuisines',cost='$cost',hours='$hours',rating='$rating',discount='$discount',owner='$owner',image='$location' where id='$get_id'") or die(mysql_query());
                                header('location:restaurant.php');
                            }
                            ?>


                        </div>
                        </div>
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
