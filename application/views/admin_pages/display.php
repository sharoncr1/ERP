
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
       
        <div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
            
                
                <!-- Main content -->
                <section class="content">
                <nav class="navbar navbar-light bg-light justify-content-between">
                  <!-- <a class="navbar-brand">Added Items</a> -->
                    <h5>Registered Users</h5>
                  <form class="form-inline" method="get" action=''>
                    <input class="form-control mr-sm-2" id='search' name='search' type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-info my-2 my-sm-0" type="submit" >Search</button>
                  </form>
                </nav>

                    <div class="row">

                      <div class="col-md-12">
                           
                                <!-- <div class="box-header"> -->
                             <?php if($s_msg!='') echo "<p class='text-success'>".$s_msg."</p>"; ?>
                                <!-- </div>/.box-header -->
                                <div class="box">
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr align="center">
                                            <th>USER-ID</th>
                                            <th>PASSWORD</th>
                                            <th>NAME</th>
                                            <th>EMAIL ID</th>
                                            <th>PHONE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                            
                                        </tr>
                                        <?php 
                                            foreach ($rows as $value) {
                                            echo "<tr align='center'>";
                                            echo "<td>".$value['userid']."</td>";
                                            echo "<td>".$value['password']."</td>";
                                            echo "<td>".$value['name']."</td>";
                                            echo "<td>".$value['email']."</td>";
                                            echo "<td>".$value['phone']."</td>";
                                            if($value['status']==0){
                                                echo "<td><span class='badge badge-success'>Active</span></td>";                                               
                                            }
                                            else{
                                                echo "<td><span class='badge badge-danger'>Blocked</span></td>";
                                            }
                                            echo "<td><a href='".base_url('adminc/udelete/'.$value['userid'])."' class='btn btn-danger'>DELETE</a>
                                                      <a href='".base_url('adminc/user_status_toggle/'.$value['userid'])."'class='btn btn-warning'>TOGGLE STATUS</a></td>";
                                            echo "<tr>";
                                            }  
                                        ?>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                      <?=$pagination;?> 
                                    </ul>
                                </div>
                            </div><!-- /.box -->
                            </div>
                            
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <!-- Bootstrap -->
        <!-- <script src="../../js/bootstrap.min.js" type="text/javascript"></script> -->
        <!-- AdminLTE App -->
        <!-- <script src="../../js/AdminLTE/app.js" type="text/javascript"></script> -->
        <!-- AdminLTE for demo purposes -->
        <!-- <script src="../../js/AdminLTE/demo.js" type="text/javascript"></script> -->
    </body>
</html>

<script> 
    $( function() { 
        $( "#search" ).autocomplete({ 
            source: "<?= base_url('adminc/user_search_auto') ?>" 
        }); 
    } ); 
</script>