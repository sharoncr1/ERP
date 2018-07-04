<aside class="right-side">
                <!-- Main content -->
                <section class="content">

                <nav class="navbar navbar-light bg-light justify-content-between">
                  <!-- <a class="navbar-brand">Added Items</a> -->
                    <h5>Recommended Products</h5>
                  <form class="form-inline" method="get" action=''>
                    <input class="form-control mr-sm-2" id='search' name='search' type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-info my-2 my-sm-0" type="submit" >Search</button>
                  </form>
                </nav>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="box">
                                <div class="box-body no-padding">
                              <!--       <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                           
                                            <td>
                                       
                              -->
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
                                             <span class="btn btn-danger btn-icon btn-round">
                                                <i class="now-ui-icons ui-2_favourite-28"></i>
                                             </span>
                                             <span class="btn btn-warning btn-round"  href='".base_url('welcome/add_to_cart/'.$row['item_code'])."' role='tab' onclick='add_to_cart(<?=$row['item_code']?>)'>
                                                    <i class="now-ui-icons shopping_cart-simple"></i> <h7>Add To Cart</h7>
                                            </span>
                                            <span class="btn btn-info btn-round"  href='".base_url('welcome/add_to_cart/'.$row['item_code'])."' role='tab' onclick='add_to_cart(<?=$row['item_code']?>)'>
                                                    <i class="now-ui-icons shopping_delivery-fast"></i> <h7>Buy</h7>
                                            </span>
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
                             <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                      <?=$pagination;?> 
                                    </ul>
                                </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside>
        </body>
        </html>

<script> 
    $( function() { 
        $( "#search" ).autocomplete({ 
            source: "<?= base_url('welcome/product_search_auto') ?>" 
        }); 
    } ); 


    function add_to_cart(item_code){
        $.post("<?= base_url('welcome/add_to_cart') ?>",{item:item_code},function(data, status){
            alert(data);
        });
    }
</script>