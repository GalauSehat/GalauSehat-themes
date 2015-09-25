    <img src="<?php echo get_template_directory_uri(); ?>/images/footer.png" alt="" class="footer-id">
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-up">
                        <p>Do you find this portal useful for you? Share it 
                            <span>
                                <a href="https://fb.com/galausehat.id"><i class="fa fa-facebook"></i></i></a>
                                <a href="https://twitter.com/galausehatid"><i class="fa fa-twitter"></i></i></a>
                                <a href="https://instagram.com/galausehatid"><i class="fa fa-instagram"></i></i></a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer-down">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h3>GALAU SEHAT</h3>
                </div>
                <div class="col-md-7">
                    <ul class="footer-menu">
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><a href="<?php echo home_url(); ?>/tentang">About Us</a></li>
                        <li><a href="<?php echo home_url(); ?>/penulis">Become Our Writer</a></li>
                        <li><a href="<?php echo home_url(); ?>/hubungi">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <p class="copyright text-right">@2015. All rights reserved</p>
                </div>
            </div>
        </div>
    </div>

	<div class="wall"></div>
    <script src="<?php bloginfo('template_directory'); ?>/scripts/jquery-1.10.2.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/theme.js"></script>
    <script>
    
        $(function(){
            $('#postpopular').hide();
        });

        $("#toggleterkini").click(function(){
            $('#togglepopular').removeClass('active');
            $('#toggleterkini').addClass('active');
            $('#postpopular').hide();
            $('#postterkini').show();
        });


        $("#togglepopular").click(function(){
            $('#toggleterkini').removeClass('active');
            $('#togglepopular').addClass('active');
            $('#postterkini').hide();
            $('#postpopular').show();
        });
         
    </script>
</body>

<?php wp_footer(); ?>


</html>