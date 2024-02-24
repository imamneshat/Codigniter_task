    <!DOCTYPE html>
    <html lang="zxx">
        <head>
            <title>Admin Dashboard</title>
        
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="UTF-8" />
            <meta name="keywords" content="" />
        
            <link href="//fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"rel="stylesheet">
            <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet">

            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css" type="text/css" media="all" />
            
            <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
          
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
        </head>

        <body>
            <?php $role = $this->session->userdata('role');?>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row container d-flex justify-content-center">

                        <div class="col-lg-8 grid-margin stretch-card">
                            <div class="card">
                                <nav class="navbar navbar-expand-sm bg-light">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="modal" data-target="#mystd">Add Product</a>
                                        </li>
                                        <?php 
                                            $role = $this->session->userdata('role'); 
                                            $u_id = $this->session->userdata('u_id');

                                            $sqlFecth = $this->db->query("SELECT * FROM user WHERE u_id = $u_id")->result();
                                             
                                            $dd = $sqlFecth[0]->status;
                                            $username = $sqlFecth[0]->name;
                                           
                                            if($dd == 2) {
                                               
                                        ?>
                                       <!--  <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="modal" data-target="#mysub" >Add Subject</a>
                                        </li> -->
                                        <?php }   ?>
                                          
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="modal" data-target="#myscr" >Add Score</a>
                                        </li> -->
                                        <li class="nav-item" >
                                            <a class="nav-link" href="<?php echo base_url(); ?>Login/Logout" style="margin-left:350px;"><?php echo $username?> ---Log Out</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- For Student model-->
                                <div class="modal" id="mystd">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <center><h4 class="modal-title">Product Record</h4> </center>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                  
                                                <form action="<?php echo base_url(); ?>Dashboard/productRecord" method="post" enctype="multipart/form-data" id="recsubmit">
                                                    <div class="form-group">
                                                        <label for="exampleInputName">Product Name</label>
                                                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp" placeholder="Enter Name">
                                                       
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputProductno">Product Number</label>
                                                        <input type="text" class="form-control" id="exampleInputProductno" name="productno" aria-describedby="productnoHelp" placeholder="Enter product No.">
                                                       
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputdetail">Product Details</label>
                                                        <input type="text" class="form-control" name="detail" id="exampleInputdetail" placeholder="Details">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputprice">Product Price</label>
                                                        <input type="text" class="form-control" name="price" id="exampleInputprice" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputimage">Product Image</label>
                                                        <input type="file" class="form-control" name="image" id="exampleInputimage" >
                                                    </div>
                                                    <input type="submit" class="btn btn-primary" name="submit" values="Submit">
                                                </form>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- For Student model-->
                                <!-- For Subject model-->
                              
                                 <div class="modal" id="mysub">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Subject Record</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="<?php echo base_url(); ?>Dashboard/subjectRecord" method="post">
                                                    <div class="form-group">
                                                        <label for="stname">Student Name</label>
                                                        <select class="form-control" name="stname" id="stname">
                                                            <option value="0">select</option>  
                                                            <?php foreach($stdFecth as $value) { ?>
                                                                <option value="<?php echo $value->s_id; ?>"><?php echo $value->name; ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputsname">Subject Name</label>
                                                        <input type="text" class="form-control" id="exampleInputsname" name="subname" aria-describedby="emailHelp" placeholder="Subject Name">
                                                       
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputMmarks">Max Marks</label>
                                                        <input type="text" class="form-control" name="Mmarks" id="exampleInputMmarks" placeholder="Max Marks">
                                                    </div>
                                                    
                                                    <input type="submit" class="btn btn-primary" name="submit" values="Submit">
                                                </form>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                              
                                <!-- For Subject model-->
                                <!-- For Score model-->
                               
                               <div class="modal" id="myscr">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Score Record</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="<?php echo base_url(); ?>Dashboard/scoreRecord" method="post" id="fromdata">
                                                    <div class="form-group">
                                                        <label for="stname">Student Name</label>
                                                        <select class="form-control" name="stname" id="stname">
                                                            <option value="0">select</option>  
                                                            <?php foreach($stdFecth as $value) { ?>
                                                                <option value="<?php echo $value->s_id; ?>"><?php echo $value->name; ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputsname">Subject Name</label>
                                                        <select class="form-control" name="subname" id="subname">
                                                            <option value="0">select</option>  
                                                            <?php foreach($subFecth as $subvalue) { ?>
                                                                <option value="<?php echo $subvalue->sub_id; ?>"><?php echo $subvalue->sname; ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputMarks">Marks</label>
                                                        <input type="text" class="form-control" name="marks" id="exampleInputMarks" placeholder="Marks">
                                                    </div>
                                                    
                                                    <input type="submit" class="btn btn-primary" name="submit" values="Submit">
                                                </form>
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> 

                                <!-- For Score model-->
                                <div class="card-body">
                                    <center><h4 class="card-title">Records Table</h4> </center>
                                    <p class="card-description" style="text-align:center;">
                                        Products Record
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">Sr no.</th>
                                                    <th style="text-align: center;">Product</th>
                                                    <th style="text-align: center;">ProductNO.</th>
                                                    <th style="text-align: center;">Price</th>
                                                    <th style="text-align: center;">Image</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sr = 1; 
                                                    foreach($prtFecth as $ALLvalue) {
                                                        $srno = $sr++;
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $srno; ?></td>
                                                    <td style="text-align: center;"><?php echo $ALLvalue->name; ?></td>
                                                    <td style="text-align: center;"><?php echo $ALLvalue->productno; ?></td>
                                                    <td style="text-align: center;"><?php echo $ALLvalue->price; ?></td>
                                                     <td style="text-align: center;">
                                                        <img width="50" height="50" src="<?php echo base_url();?>assets/img/<?php echo $ALLvalue->image; ?>" />
                                                    </td>

                                                    <td style="text-align: center;">
                                                        <a data-toggle="modal" data-target="#myview_<?php echo $ALLvalue->p_id; ?>" href="<?php echo $ALLvalue->p_id; ?>"><i class='fas fa-eye' style='font-size:14px'></i></a>
                                                        <a data-toggle="modal" data-target="#myedit_<?php echo $ALLvalue->p_id; ?>" href="<?php echo $ALLvalue->p_id; ?>"><i class='fas fa-pencil-alt' style='font-size:14px'></i></a>
                                                        <a href="<?php echo base_url();?>Dashboard/recordDelete/<?php echo $ALLvalue->p_id ?> "><i class='fas fa-trash' style='font-size:14px'></i></a>
                                                    </td>
                                                </tr>
                                                    <!-- For view model-->
                                                    

                                                    <!-- For view model-->

                                                    <!-- For Edit model-->
                                                    


                                                    <!-- For Edit model-->
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
            <script>
                window.onload = function() {
                    // Check for LocalStorage support.
                    if (localStorage) {

                        // Add an event listener for form submissions
                        document.getElementById('recsubmit').addEventListener('submit', function() {
                            // Get the value of the name field.
                            var name = document.getElementById('exampleInputName').value;
                            var productno = document.getElementById('exampleInputProductno').value;
                            var detail = document.getElementById('exampleInputdetail').value;
                            var price = document.getElementById('exampleInputprice').value;
                            var image = document.getElementById('exampleInputimage').value;
                           
                            // alert(name+"<-->"+productno+"<-->"+detail+"<-->"+price+"<-->"+image);
                           
                            // Save the name in localStorage.
                            localStorage.setItem('exampleInputName', name);
                            localStorage.setItem('exampleInputProductno', productno);
                            localStorage.setItem('exampleInputdetail', detail);
                            localStorage.setItem('exampleInputprice', price);
                            
                            // var sss =  localStorage.setItem('exampleInputimage', image);

                           // var sssssw =  localStorage.getItem('exampleInputName', name);
                           //  alert(sssssw);
                        });
                    }
                }
            </script>
        </body>
    </html>