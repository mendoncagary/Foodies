<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add restaurant </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Name:</label>
                                           <input type="text" name="name" class = "form-control" placeholder="Name">
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Location:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="location"  placeholder="Location" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Address:</label>
                                    <div class="controls">
                                         <input type="text" class = "form-control"  name="address"  placeholder="Address" >
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Pincode:</label>
                                    <div class="controls">
                                         <input type="text" class = "form-control"  name="pincode"  placeholder="Pincode" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Type:</label>
                                    <div class="controls">
                                        <input type="text" name="type" class = "form-control" placeholder="Type">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Cuisines:</label>
                                    <div class="controls">
                                        <input type="text" name="cuisines"  class = "form-control" placeholder="Cuisines" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Cost:</label>
                                    <div class="controls">
                                        <input type="text" name="cost" placeholder="Cost"  class = "form-control" >
                                    </div>
                                </div>
								
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Hours:</label>
                                    <div class="controls">
                                        <input type="text" name="hours" class = "form-control" placeholder="Hours" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Rating:</label>
                                    <div class="controls">
                                        <input type="text" name="rating" placeholder="Rating"  class = "form-control" >
                                    </div>
                                </div>

								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Discount:</label>
                                    <div class="controls">
                                        <input type="text" name="discount" placeholder="Discount"  class = "form-control" >
                                    </div>
                                </div>
								
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Owner:</label>
                                    <div class="controls">
                                        <input type="text" name="owner" placeholder="Owner"  class = "form-control" >
                                    </div>
                                </div>
								
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image"> 	
                                    </div>
                                </div>

								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  
									  
									   <?php include ('../includes/config.php');
                            if (isset($_POST['go'])) {

                               
							   $name = $_POST['name'];
                                $location = $_POST['location'];
                                $address = $_POST['address'];
								$pincode = $_POST['pincode'];
								$type = $_POST['type'];
								 $cuisines = $_POST['cuisines'];
                                $cost = $_POST['cost'];
                                $hours = $_POST['hours'];
								$rating = $_POST['rating'];
								$discount = $_POST['discount'];
                                
                                $owner = $_POST['owner'];
								
                                //image
                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $imglocation = "upload/" . $_FILES["image"]["name"];


                                mysql_query("insert into restaurant(name,location,address,pincode,type,cuisines,cost,hours,rating,discount,image)
                            	values ('$name','$location','$address','$pincode','$type','$cuisines','$cost','$hours','$rating','$discount','$imglocation')
                                ") or die(mysql_error());

                                header('location:restaurant.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>