<aside class="right-side">
                <!-- Main content -->
                <section class="content">

                <nav class="navbar navbar-light bg-light justify-content-between">
                  <!-- <a class="navbar-brand">Added Items</a> -->
                    <h5>Cart</h5>

                </nav>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="box">
                                <div class="box-body no-padding">

                            <?php 
                                foreach($rows as $row):
                                    ?>
                                   
                                <div class='card'>  
                                <div class='card-body'>
                                <div class='row'>  
                                    <div class='col-lg-9 col-md-12'>
                                        <h3 class='title'><?= $row['name'] ?></h3>

                                        <div class='col-sm-6 col-lg-9'>
                                        <div class='checkbox'>
                                              <?=$row['description']?>
                                        </div>
                                        <div class='checkbox'>
                                            Stock Left : <?=$row['stock']?>  <?=$row['unit']?>
                                        </div>
                                        <div class='checkbox'>
                                            Price : <?=$row['price']?> Rs.
                                        </div>
                                        <div class='checkbox'>
                                        <ul class='nav nav-tabs justify-content-center' role='tablist'>
                                        <li class='nav-item'>
                                            <a class='nav-link active' data-toggle='tab' href="<?=base_url('welcome/Remove_from_cart/'.$row['item_code'])?>" role='tab'>
                                                <i class='now-ui-icons objects_umbrella-13'></i> Remove from cart
                                            </a>
                                        </li>
                                        <li class='nav-item'>
                                            <span class='btn nav-link active' data-toggle='tab' href='".base_url('welcome/add_to_cart/'.$row['item_code'])."' role='tab'>
                                                <i class='now-ui-icons shopping_cart-simple'></i> Pay
                                            </span>
                                        </li>
 
                                    </ul>

                                        </div>
                                    </div>

                                    </div>

                                        <div class='col-lg-3 col-md-12' >                                           
                                            <img src='<?=base_url()?>assets/img/not_available.gif' class='rounded img-raised'>                                  
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <?php
                                endforeach
                            ?>
                           
                        </div>


                                       <!--      </td>
                                           
                                        </tr>
                                      -->
                                    <!-- </tbody></table> -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div>
                         <div class="row h-100 justify-content-center align-items-center">
                             <a href="" class="btn btn-info my-2 my-sm-0">Check Out All Products</a>
                         </div>
                    </div>
                </section><!-- /.content -->
            </aside>
        </body>
        </html>

<script> 



</script>