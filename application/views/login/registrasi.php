<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Electro Store Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href=" <?php echo base_url() ?>assets/web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="<?php echo base_url() ?>assets/web/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="<?php echo base_url() ?>stylesheet" href="assets/web/css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="<?php echo base_url() ?>assets/web/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="<?php echo base_url() ?>assets/web/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <!-- menu style -->
    <!-- //Custom-Files -->

    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //web fonts -->


    <!-- //navigation -->


    <!-- contact -->
    <div class="contact py-sm-5 py-4">
        <div class="container">
            <div class="row">

                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <div class="container py-xl-4 py-lg-2">
                                <!-- tittle heading -->
                                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                                    <span>F</span>orm
                                    <span>R</span>egister
                                </h3>
                                <!-- //tittle heading -->


                            </div>
                        </div>
                        <div class="card-body">
                            <!-- form -->
                            <form action="<?php echo site_url('C_registrasi/prosestambah') ?>" method="post">
                                <div class="contact-grids1 w3agile-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 contact-form1 form-group">
                                            <label class="col-form-label">username</label>
                                            <input type="teks" class="form-control" name="username" placeholder="masukkan username" required style="width: 400px;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 contact-form1 form-group">
                                            <label class="col-form-label">password</label>
                                            <input type="password" class="form-control" name="password" placeholder="masukkan password" required style="width: 400px;">
                                        </div>

                                    </div>

                                    <div class="contact-form">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 contact-form1 form-group">
                                                <input type="submit" value="Submit">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </form>
                            <!-- //form -->
                        </div>
                    </div>
                    <!-- //contact -->

                    <!-- footer -->

                    <!-- //payment -->
                </div>
            </div>
            <!-- //footer fourth section (text) -->
            </footer>
            <!-- //footer -->
            <!-- copyright -->
            <div class="copy-right py-3">
                <div class="container">
                    <p class="text-center text-white">© 2018 Electro Store. All rights reserved | Design by
                        <a href="http://w3layouts.com"> W3layouts.</a>
                    </p>
                </div>
            </div>
            <!-- //copyright -->

            <!-- js-files -->
            <!-- jquery -->
            <script src="js/jquery-2.2.3.min.js"></script>
            <!-- //jquery -->

            <!-- nav smooth scroll -->
            <script>
                $(document).ready(function() {
                    $(".dropdown").hover(
                        function() {
                            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                            $(this).toggleClass('open');
                        },
                        function() {
                            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                            $(this).toggleClass('open');
                        }
                    );
                });
            </script>
            <!-- //nav smooth scroll -->

            <!-- popup modal (for location)-->
            <script src="js/jquery.magnific-popup.js"></script>
            <script>
                $(document).ready(function() {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                });
            </script>
            <!-- //popup modal (for location)-->

            <!-- cart-js -->
            <script src="js/minicart.js"></script>
            <script>
                paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

                paypals.minicarts.cart.on('checkout', function(evt) {
                    var items = this.items(),
                        len = items.length,
                        total = 0,
                        i;

                    // Count the number of each item in the cart
                    for (i = 0; i < len; i++) {
                        total += items[i].get('quantity');
                    }

                    if (total < 3) {
                        alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
                        evt.preventDefault();
                    }
                });
            </script>
            <!-- //cart-js -->

            <!-- password-script -->
            <script>
                window.onload = function() {
                    document.getElementById("password1").onchange = validatePassword;
                    document.getElementById("password2").onchange = validatePassword;
                }

                function validatePassword() {
                    var pass2 = document.getElementById("password2").value;
                    var pass1 = document.getElementById("password1").value;
                    if (pass1 != pass2)
                        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                    else
                        document.getElementById("password2").setCustomValidity('');
                    //empty string means no validation error
                }
            </script>
            <!-- //password-script -->

            <!-- scroll seller -->
            <script src="js/scroll.js"></script>
            <!-- //scroll seller -->

            <!-- smoothscroll -->
            <script src="js/SmoothScroll.min.js"></script>
            <!-- //smoothscroll -->

            <!-- start-smooth-scrolling -->
            <script src="js/move-top.js"></script>
            <script src="js/easing.js"></script>
            <script>
                jQuery(document).ready(function($) {
                    $(".scroll").click(function(event) {
                        event.preventDefault();

                        $('html,body').animate({
                            scrollTop: $(this.hash).offset().top
                        }, 1000);
                    });
                });
            </script>
            <!-- //end-smooth-scrolling -->

            <!-- smooth-scrolling-of-move-up -->
            <script>
                $(document).ready(function() {
                    /*
                    var defaults = {
                    	containerID: 'toTop', // fading element id
                    	containerHoverID: 'toTopHover', // fading element hover id
                    	scrollSpeed: 1200,
                    	easingType: 'linear' 
                    };
                    */
                    $().UItoTop({
                        easingType: 'easeOutQuart'
                    });

                });
            </script>
            <!-- //smooth-scrolling-of-move-up -->

            <!-- for bootstrap working -->
            <script src="js/bootstrap.js"></script>
            <!-- //for bootstrap working -->
            <!-- //js-files -->
</body>

</html>