    <div class="footer-bg">
        <hr class="hr-lg">
        <section class="newsletter">
            <div class="container">
                <div class="row mt-10 mb-10 pb-10">
                    <div class="col-md-6 text-subscribe">
                        <div class="form-control-static">
                            <h3>GalauSehat dot ID</h3>
                            One-stop resources platform Masyarakat Indonesia di Malaysia.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row-table subscribe">
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="footer">
            <div class="container mt-20 pb-20">
                <hr class="hr-footer">   
                <div class="row hidden-xs">
                    <div class="col-md-8 col-sm-8 copyright">
                        <span>&copy; galausehat 2015</span>
                        &nbsp;&middot;&nbsp;
                        <span><a href="<?php bloginfo( 'url' ); ?>/tentang">Tentang</a></span>
                        &nbsp;&middot;&nbsp;
                        <span><a href="<?php bloginfo( 'url' ); ?>/penulis">Menjadi Kontributor</a></span>
                        &nbsp;&middot;&nbsp;
                        <span><a href="<?php bloginfo( 'url' ); ?>/tentang/galau-futsal">Tentang Futsal</a></span>
                        &nbsp;&middot;&nbsp;
                        <span><a href="<?php bloginfo( 'url' ); ?>/hubungi">Hubungi</a></span>
                    </div>

                    <div class="col-md-4 col-sm-4 social text-right social-med">
                        <a href="https://fb.com/galausehat.id" target="_blank" class="" style="text-decoration: none !important;">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                        <a href="https://twitter.com/galausehatid" target="_blank" class="" style="text-decoration: none !important;">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com/galausehatid" target="_blank" class="" style="text-decoration: none !important;">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="row visible-xs">
                    <div class="col-md-4 copyright text-center pb-10">
                        <span>&copy; galausehat 2015</span><br>
                    </div>
                    <div class="col-md-4 text-center pb-10">
                        <span><a href="<?php bloginfo( 'url' ); ?>/tentang">Tentang</a></span>
                        &nbsp;&middot;&nbsp;
                        <span><a href="<?php bloginfo( 'url' ); ?>/penulis">Menjadi Kontributor</a></span>
                        &nbsp;&middot;&nbsp;
                        <span><a href="<?php bloginfo( 'url' ); ?>/tentang/galau-futsal">Tentang Futsal</a></span>
                        &nbsp;&middot;&nbsp;
                        <span><a href="<?php bloginfo( 'url' ); ?>/hubungi">Hubungi</a></span>
                    </div>

                    <div class="col-md-4 social text-center social-med">
                        <a href="<https://fb.com/galausehat.id" target="_blank" class="" style="text-decoration: none !important;">
                            <i class="fa fa-facebook-official"></i>
                        </a>
                        <a href="https://twitter.com/galausehatid" target="_blank" class="" style="text-decoration: none !important;">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com/galausehatid" target="_blank" class="" style="text-decoration: none !important;">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--<section class="footer pb-20 mb-20">
         <div class="container text-bold text-center text-uppercase">
            <div class="div-dotted">
                <div><b>&copy; galausehat.id</b></div>
                <div><a href="/hubungi/">Hubungi Kami</a></div>
                <div><a href="/penulis/">Menjadi Kontributor</a></div>
                <div><a href="#">Facebook</a></div>
                <div><a href="#">Twitter</a></div>
                <div><a href="#">Instagram</a></div>
            </div>
        </div>
    </section> -->

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