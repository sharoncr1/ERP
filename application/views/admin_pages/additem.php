<body class="skin-blue">
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Add A New Item
                    </h1>
 
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <?php 
                            if($emsg!='')
                                echo "<div class='alert alert-danger'>".$emsg."</div>";
                            if($smsg!='')
                                echo "<div class='alert alert-success'>".$smsg."</div>";
                            ?>
                            <div class='box'>
                       
                                <!-- form start -->
                                <form role="form" method="post">
                                    <div class="box-body" >
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Item Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Item Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Commodity Category</label>
                                            <select name="category" class="form-control" required>
                                                <option value=''>Please choose a category</option>
                                                <option value='electronics'>Electronics</option>
                                                <option value='food items'>Food Items</option>
                                                <option value='furnitures'>Furnitures</option>
                                                <option value='decors'>Decors</option>
                                                <option value='others'>Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" class="form-control" name="price" placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <label>Tax ( % )</label>
                                            <input type="number" step=".01" class="form-control" name="tax" placeholder="tax">
                                        </div>
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <select name="unit" class="form-control" required>
                                                <option value=''>Please select a Unit</option>
                                                <option value='No.s'>No.s</option>
                                                <option value='packets'>Packets</option>
                                                <option value='Kg'>Kg</option>
                                                <option value='Ltr'>Ltr</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Current Stock</label>
                                            <input type="number" class="form-control" name="stock" placeholder="current stock">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Product Photos</label>
                                            <input type="file" id="exampleInputFile">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <!-- <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Check me out
                                            </label>
                                        </div> -->
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" name='submit' value='submit' class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
