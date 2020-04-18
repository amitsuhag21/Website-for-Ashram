<?php  
include 'header.php';
include 'menu.php';
?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="bg-r3">

                        <h1 class="event-text-h icon-heading-1"><strong>Osho in Pune</strong></h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="owl-carousel multi-slides" data-plugin-options='{"items": 4, "singleItem": false, "itemsDesktop": 4, "pagination": false, "navigation": true}'>
                        <div class="col-md-12">
                            <div class="thumb-item">
                                <div class="thumb-item-img">
                                    <a href="shop-product-detail-classic.html" class="btn-detail">
                                        <img class="img-responsive" src="images/osho.1500.jpg" alt="">

                                    </a>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="thumb-item">
                                <div class="thumb-item-img">
                                    <a href="shop-product-detail-classic.html" class="btn-detail">
                                        <img class="img-responsive" src="images/osho.1500.jpg" alt="">

                                    </a>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="thumb-item">
                                <div class="thumb-item-img">
                                    <a href="shop-product-detail-classic.html" class="btn-detail">
                                        <img class="img-responsive" src="images/osho.1500.jpg" alt="">

                                    </a>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="thumb-item">
                                <div class="thumb-item-img">
                                    <a href="shop-product-detail-classic.html" class="btn-detail">
                                        <img class="img-responsive" src="images/osho.1500.jpg" alt="">

                                    </a>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="container topmargin-lg bottommargin-sm"> 
                                <div class="col_full portfolio-single-image nobottommargin"> 
                                    <div class="masonry-thumbs col-6" data-big="3" data-lightbox="gallery">
                                  
                                        <a href="images/osho.1500.jpg" data-lightbox="gallery-item" title="Gallery"><img class="image_fade" src="images/osho.1500.jpg" alt="Echo"></a>                            
                                    </div>
                                </div>
                            </div>

                            <div class="thumb-item">
                                <div class="thumb-item-img">
                                    <a href="shop-product-detail-classic.html" class="btn-detail">
                                        <img class="img-responsive" src="images/osho.1500.jpg" alt="">

                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


<!-- <div class="container topmargin-lg bottommargin-sm">

             <div class="heading-block topmargin-sm">
                <?php 
                $i=0;
                include('function.php');
                $id =$_REQUEST['id'];
                $p=mysqli_query($con,"Select * From album  where AL_ID='$id'");
                $row=mysqli_fetch_array($p) 
                ?> 
                <h3><?php echo $row['AL_TITLE']; ?> </h3>
             </div>
 
            <div class="col_full portfolio-single-image nobottommargin"> 
                        <div class="masonry-thumbs col-6" data-big="3" data-lightbox="gallery">
                        
                        <?php 
                              $i=0;
                              include('function.php');
                              $id =$_REQUEST['id'];
                              $p=mysqli_query($con,"Select * From vpb_uploads  where date='$id'  ORDER BY id DESC  ");
                              while($row=mysqli_fetch_array($p))
                                  {
                                  $i++;
                                  @$id=$row['id'];
                        ?>                        
                            <a href="admin/uploads/<?php echo $row['name']; ?>" data-lightbox="gallery-item" title="<?php echo $row['des']; ?>"><img class="image_fade" src="admin/uploads/<?php echo $row['name']; ?>" alt="<?php echo $row['des']; ?>"></a>                            
                             <?php } ?> 
                        </div>
            </div>
 -->

                
<?php 
include 'footer.php';
?>