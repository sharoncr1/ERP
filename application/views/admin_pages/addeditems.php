
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
       
        <div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
            
                
                <!-- Main content -->
             <section class="content">
                 <nav class="navbar navbar-light bg-light justify-content-between">
                 <h5>Added Items</h5>
                 <form class="form-inline" method='post' action=''>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-info my-2 my-sm-0" type="submit" name='search' value='submit'>Search</button>
                  </form>
                </nav>
                           
             

                    <div class="row">

                      <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">


                       
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr align="center">
                                            <th>CODE</th>
                                            <th>NAME</th>
                                            <th>CATEGORY</th>
                                            <th>PRICE</th>
                                            <th>TAX ( % )</th>
                                            <th>UNIT</th>
                                            <th>STOCK</th>
                                            <th>ACTION</th>
                                        </tr>
                                        <?php 
                                            foreach ($rows as $value) {
                                            echo "<tr align='center'>";
                                            echo "<td>".$value['item_code']."</td>";
                                            echo "<td>".$value['name']."</td>";
                                            echo "<td>".$value['category']."</td>";
                                            echo "<td>".$value['price']."</td>";
                                            echo "<td>".$value['tax']."</td>";
                                            echo "<td>".$value['unit']."</td>";
                                            echo "<td>".$value['stock']."</td>";
                                            echo "<td>
                                            <a href='".base_url('adminc/product_edit/'.$value['item_code'])."'class='btn btn-warning'>EDIT</a>
                                            <a href='".base_url('adminc/product_delete/'.$value['item_code'])."' class='btn btn-danger'>DELETE</a> </td>";
                                            // echo "<td><a href='".base_url('adminc/udelete/'.$value['userid'])."'>DELETE</a></td>";
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
