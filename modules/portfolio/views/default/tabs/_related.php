

<div class="carousel slide" id="myCarousel">
    <div class="carousel-inner">
        <div class="item active">
            <ul class="thumbnails">
                
<?php foreach ($model->relatedProducts as $related) { ?>

                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="<?php echo $related->getMainImageUrl('360x240'); ?>" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>

<?php } ?>
                

            </ul>
        </div><!-- /Slide1 --> 
        <div class="item">
            <ul class="thumbnails">
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div><!-- /Slide2 --> 
        <div class="item">
            <ul class="thumbnails">
                <li class="col-sm-3">	
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
                <li class="col-sm-3">
                    <div class="fff">
                        <div class="thumbnail">
                            <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                        </div>
                        <div class="caption">
                            <h4>Praesent commodo</h4>
                            <p>Nullam Condimentum Nibh Etiam Sem</p>
                            <a class="btn btn-mini" href="#">» Read More</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div><!-- /Slide3 --> 
    </div>


    <nav>
        <ul class="control-box pager">
            <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
            <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
        </ul>
    </nav>
    <!-- /.control-box -->   

</div><!-- /#myCarousel -->


