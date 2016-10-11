<div class="modal fade" id="joke" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <div class="modal-body">
                            <form  method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong><center>Add User </center></strong></div>
                                <hr>
								
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">FirstName:</label>
                                    <div class="controls">
                                        <input type="text" class = "form-control"name="fn" id="inputEmail" placeholder="Firstname">
                                    </div>
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LastName:</label>
                                    <div class="controls">
                                        <input type="text"  name="ln" class = "form-control" placeholder="Lastname">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Username:</label>
                                    <div class="controls">
                                        <input type="text" name="un"  class = "form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="text" name="p" class = "form-control"  placeholder="Password">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Role:</label>
                                    <div class="controls">
                                        <select type="text" name="role" class = "form-control" placeholder="Role" >

                                            <option></option>
                                            <option>Super Admin</option>
                                            <option>Administrator</option>
                                            <option>Restaurant owner</option>
                                        </select>
                                    </div>
                                </div>

								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  

                            <?php
                            if (isset($_POST['go'])) {

                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $un = $_POST['un'];
                                $p = $_POST['p'];
                                $role = $_POST['role'];
                                
								$query1 = mysql_query("select role_rolecode from role where role_rolename= '$role'") or die (mysql_error());
								$row1 = mysql_fetch_array($query1);
								$rcode = $row1['role_rolecode'];
										$query = mysql_query("select * from tb_user where username= '$un'") or die (mysql_error());
										$count = mysql_num_rows($query);

									if ($count  > 0){ 
									?>
										<script>
											alert("Username Already Taken");
										</script>
									<?php
										}
										else{
									 mysql_query("insert into tb_user (firstname,lastname,username,password,rolecode) values('$fn','$ln','$un','$p','$rcode')") or die(mysql_error());
									?>
									<script>
										alert('User Successfully Save');
										header('location:user.php');
									
									</script>
									<?php }} ?>	
									  
									  
									  
									  
                                </div>
                            </div>