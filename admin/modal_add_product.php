

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Product </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Name:</label>
                                           <input type="text" name="name" class = "form-control" placeholder="Name">
                                          
                                 </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Description:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"  name="description"  placeholder="Description" >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Category:</label>
                                    <div class="controls">
                                        <select type="text" name="category" class = "form-control" placeholder="Category" >

                                            <option></option>
                                            <option>Starters</option>
                                            <option>Lunch</option>
                                            <option>Dinner</option>
											<option>Deserts</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Filter:</label>
                                    <div class="controls">
                                        <select type="text" name="filter" class = "form-control" placeholder="Filter" >

                                            <option></option>
                                            <option>Classic</option>
                                            <option>Specials</option>
                                            <option>Supreme</option>
											<option>Non-Veg</option>
											<option>Veg</option>
											<option>Non-Spicy</option>
											<option>Spicy</option>
											<option>Super-Saver</option>
											<option>Protein Punch</option>
											<option>Paneer Dishes</option>
											<option>Best Sellers</option>
											
											
											
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Price:</label>
                                    <div class="controls">
                                        <input type="text" name="price"  class = "form-control" placeholder="Price" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Quantity:</label>
                                    <div class="controls">
                                        <input type="text" name="quantity" placeholder="Quantity"  class = "form-control" >
                                    </div>
                                </div>
								
								 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Rating:</label>
                                    <div class="controls">
                                        <input type="text" name="rating" placeholder="Rating"  class = "form-control" >
                                    </div>
                                </div>
								
								 <div class="control-group">
                                    <label class="control-label" for="inputPassword">Chef Name:</label>
                                    <div class="controls">
                                        <input type="text" name="chef" placeholder="Chef Name"  class = "form-control" >
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
                                $description = $_POST['description'];
                                $category = $_POST['category'];
                                $filter = $_POST['filter'];
                                $price = $_POST['price'];
                                $quantity = $_POST['quantity'];
								$rating = $_POST['rating'];
								$chef = $_POST['chef'];
								$resid=$_SESSION['res-id'];

                                //image
                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];


                                mysql_query("insert into tb_products (name,description,category,filter,price,quantity,location,rating,chef,resid)
                            	values ('$name','$description','$category','$filter','$price','$quantity','$location','$rating','$chef','$resid')
                                ") or die(mysql_error());

                                header('location:product.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>