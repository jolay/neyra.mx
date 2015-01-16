<?php
header("Content-type: text/css; charset=utf-8");

$color = '#'.htmlspecialchars($_GET["color"]);

?>
::selection {
	background: <?php echo  $color; ?>;/* Safari */
	color: #fff;
}
::-moz-selection {
	background: <?php echo  $color; ?>; /* Firefox */
	color: #fff;
}
.color-high{
	color: <?php echo  $color; ?>;
}
.footer-top a:hover{
	color: <?php echo  $color; ?>;
}

.project-info-tag > span{
	background: <?php echo  $color; ?>;
}
#control_buttons a:hover {
    color: <?php echo  $color; ?>;
border:solid 3px <?php echo  $color; ?>;
}
#item_slider .flex-direction-nav li a:hover {
    border: solid 2px <?php echo  $color; ?>;
    color: <?php echo  $color; ?>;
}
div#portfolio_thumbs ul li div.item_info h3 {
	background: <?php echo  $color; ?>;
}
div#portfolio_thumbs ul li div.item_info {
    background: <?php echo  $color; ?> url('../images/icons/open.png') center center no-repeat;
}

ul#portfolioFilter li.active-filter {
     background: <?php echo  $color; ?>;
     border:solid 1px <?php echo  $color; ?>;
}

ul#portfolioFilter li:hover {
     background: <?php echo  $color; ?>;
     border:solid 1px <?php echo  $color; ?>;
}
.team-info{
	border-bottom: 8px solid <?php echo  $color; ?>;
}
.item:hover > a > .thumb-title{
	background: <?php echo  $color; ?>;
}
.services-expansion{
	background: <?php echo  $color; ?>;
}
.liner-small > span{
	background: <?php echo  $color; ?>;
}

.liner > span{
	background: <?php echo  $color; ?>;
}
.promo-heading{
	border-top: solid 1px <?php echo  $color; ?>;
	border-bottom: solid 1px <?php echo  $color; ?>;
}
.contact .alert{
	background: <?php echo  $color; ?>;
}
.cl-effect-10 a::before {
	background: <?php echo  $color; ?>;
}
.pace .pace-progress {
  background: <?php echo  $color; ?>;
  }
.menu a:hover {
	background:$color;
}

.top-banner-caption-v1 h3 > span{
	border-bottom: solid 4px <?php echo  $color; ?>;
}
.top-banner-caption-v2 h3 > span{
	color: #fff;
	background: <?php echo  $color; ?>;
}
.top-banner-caption-v3 h3 > span{
	color: #fff;
	background: <?php echo  $color; ?>;
}
.top-banner-caption-v4 h3 > span{
	color: #fff;
	background: <?php echo  $color; ?>;
}
.top-banner-caption-v5 h3 > span{
	color: #fff;
	background: <?php echo  $color; ?>;
}
.top-banner-caption-v9{
	background: <?php echo  $color; ?> !important;
}
.btn-rounded-color:hover{
	color: #fff !important;
	background: <?php echo  $color; ?> !important;
	border: solid 2px <?php echo  $color; ?> !important;
}

.top-banner-caption-v6 h3 > span{
	color: #fff;
	background: <?php echo  $color; ?>;
}
.btn-rounded-color2{
	color: #fff !important;
	background: <?php echo  $color; ?> !important;
	border: solid 2px <?php echo  $color; ?> !important;
}
.btn-rounded-color2:hover{
	color: #fff !important;
	background: #121212 !important;
	border: solid 2px #121212 !important;
}

.services-icon-wrap-yellow > .service-icon.current{
	background: url('../images/triangle-yellow.png') center bottom no-repeat;
}

.services-icon-wrap-red > .service-icon.current{
	background: url('../images/triangle-red.png') center bottom no-repeat;
}

.services-icon-wrap-green > .service-icon.current{
	background: url('../images/triangle-green.png') center bottom no-repeat;
}

.services-icon-wrap-blue > .service-icon.current{
	background: url('../images/triangle-blue.png') center bottom no-repeat;
}

.testimonial-carousel-yellow{
	background: url('../images/bg/testimonials-yellow.jpg') center center repeat;
}
.testimonial-carousel-red{
	background: url('../images/bg/testimonials-red.jpg') center center repeat;
}
.testimonial-carousel-green{
	background: url('../images/bg/testimonials-green.jpg') center center repeat;
}
.testimonial-carousel-blue{
	background: url('../images/bg/testimonials-blue.jpg') center center repeat;
}

.standard-nav li > a.highlighted{
	color: <?php echo  $color; ?> !important;
}

.standard-nav li > a:hover{
	color: <?php echo  $color; ?> !important;
}
.det-overlay{
	background: <?php echo  $color; ?> url('../images/zoom.png') center center no-repeat;
}
.top-caps12 > .inner-ring{
	background: <?php echo  $color; ?>;
}

.copyright-footer a{
    color:#555;
    &:hover{
        color:<?php echo $color; ?>
    }
}

ul.tweet_list{
    li{
        a{
            &:hover{
                color:<?php echo $color; ?>
            }
        }
    }
}