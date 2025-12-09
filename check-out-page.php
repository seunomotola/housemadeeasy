<?php
                                            if (isset($_SESSION['multiple_room']) && $_SESSION['multiple_room'] == 'yes') { 
                                // code...
                            
                                if ($_SESSION['how_many_multiple_room']!=0) {?>


                                    <!-- begin of isset -->
                              <?php if(isset($_SESSION['user_id']) ) { ?>
                                    <p><a  class="btn btn-primary btn-flat click" style=" border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;" onclick="alreadyloginIn()" ><i class="fa fa-calendar"></i> Click to check the house tomorrow</a></p>
                                 <script src="https://js.paystack.co/v1/inline.js"></script>

                                 <a  class="btn btn-primary btn-flat click" style=" border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;" onclick="urgentalreadyloginIn()" ><i class="fa fa-calendar"></i> Click to check the house today</a>
                                 <script src="https://js.paystack.co/v1/inline.js"></script>

                               <?php  }else{ ?>
                                     <p> <a  class="btn btn-primary btn-flat " style="border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;" onclick="notalreadyloginIn()" ><i class="fa fa-calendar"></i> Click to check the house tomorrow</a><br></p>
                                    <!-- urgent booking begins-->
                                    <a  class="btn btn-primary btn-flat " style="border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;" onclick="urgentnotalreadyloginIn()" ><i class="fa fa-calendar"></i> Click to check the house today</a>
                                    <!-- urgent booking end-->
                                <?php }
                                // end of isset


                           }else{ ?>
                                <a style="pointer-events: none;" class="btn btn-primary btn-flat " style="text-align: center; color: white; text-transform: lowercase;"  ><i class="fa fa-calendar"></i> This house is not available at the momemt </a>
                                 

                          <?php }
                            
                        }//end of multiple room


                          //begin of not multiple room
                        elseif (isset($_SESSION['multiple_room']) && $_SESSION['multiple_room'] == 'no') {

                            if ($_SESSION['house_id1']==$_SESSION['house_id11'] || $_SESSION['status']=='yes') {
                                //put an image that we say house booked already check bak later
                                      //OR
                            //put an image that we say house not available for now  
                               ?>
                                <a style="pointer-events: none;" class="btn btn-primary btn-flat " style=" border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;"><i class="fa fa-calendar"></i> This house is not available at the momemt </a>
                                 
                                
                            <?php }else{?>

                                <?php if(isset($_SESSION['user_id']) ) { ?>
                                    <p><a  class="btn btn-primary btn-flat click" style=" border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;" onclick="alreadyloginIn()" ><i class="fa fa-calendar"></i> click to check the house tomorrow</a></p>
                                 <script src="https://js.paystack.co/v1/inline.js"></script>

                                 <a  class="btn btn-primary btn-flat click" style="border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;" onclick="urgentalreadyloginIn()" ><i class="fa fa-calendar"></i> click to check the house today</a>
                                 <script src="https://js.paystack.co/v1/inline.js"></script>

                               <?php  }else{ ?>

                               <p> <a  class="btn btn-primary btn-flat " style="border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;" onclick="notalreadyloginIn()" ><i class="fa fa-calendar"></i> click to check the house tomorrow</a><br></p>
                                    <!-- urgent booking begins-->
                                    <a  class="btn btn-primary btn-flat " style=" border-radius:50px; padding:20px; text-align: center; color: white; text-transform: lowercase;" onclick="urgentnotalreadyloginIn()" ><i class="fa fa-calendar"></i> click to check the house today</a>
                                    <!-- urgent booking end-->
                                    
                                <?php }
                                  

                               
                               
      
                                    
                                                 
                                 
                                  }//end

                           }// end