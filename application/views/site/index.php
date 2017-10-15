<!DOCTYPE html>
<html lang="ES">
<head>
	<base href="<?php echo base_url();?>" />
  	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  	<meta name="robots" content="index, follow" />
  	<title>OFLASH.com.ve | En Tus Mejores Momentos</title>
  	<meta name="author" content="OFLASH.com.ve" />
  	<meta property="og:title" content="OFLASH.com.ve | En Tus Mejores Momentos" />
  	<meta property="og:type" content="article" />
  	<meta property="og:description" content="OFLASH.com.ve | En Tus Mejores Momentos" />
  	<meta name="description" content="OFLASH.com.ve | En Tus Mejores Momentos" />
  	<meta name="keywords" content="OFLASH.com.ve" />
  	<meta name="generator" content="Ing. Luis Cordero - www.luiscordero29.com" />	
	
	<link rel="icon" href="<?php echo base_url();?>assets/public/images/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/public/css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/public/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/public/css/grid.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/public/css/colorstheme.css" />
	<!--[if lt IE 10]>
  		<link rel="stylesheet" href="<?php echo base_url();?>assets/public/css/ie.css"> 
	<![endif]-->

<script type='text/javascript' src='<?php echo base_url();?>assets/public/js/jquery-1.6.4.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/public/js/superfish.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/public/js/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/public/js/jquery.prettyPhoto.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/public/js/jquery.aw-showcase.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/public/js/audio.js'></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/public/js/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/public/css/jquery.fancybox-1.3.4.css" media="screen" />
  
	<script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       1000, 		// one second delay on mouseout 
				animation:   {opacity:'false',height:'show'}, // fade-in and slide-down animation 
				speed:       'normal',  // faster animation speed 
				autoArrows:  true,   // generation of arrow mark-up (for submenu) 
				dropShadows: false   // drop shadows (for submenu)
			});
			
			// prettyphoto init
			jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				slideshow:5000,
				autoplay_slideshow: false
			});
			
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
		$(function(){
			$('.bg-submit').append('<span></span>');
			$('.bg-submit span').css({opacity:0});
			$('.bg-submit').hover(
				function(){$(this).find('span').stop().animate({opacity:1}, 450)},
				function(){$(this).find('span').stop().animate({opacity:0}, 450)}
			);
			$('.sf-menu > li > a').wrapInner('<span class="menu-txt"/>').append('<span class="bg-menu1"></span><span class="bg-menu2"></span>');
			$('.button, .wp-pagenavi a, .tags-cloud a, .tagcloud a, .button-submit').wrapInner('<span class="button-txt"/>').append('<span class="bg-button1"></span><span class="bg-button2"></span>');
			$('.link, .link-1, .profileLink, .reply a')
				.hover(function(){
					$(this).stop().animate({
						paddingRight:'24px'},500,'easeOutBounce')
					},
					function(){
						$(this).stop().animate({
						paddingRight:'14px'},500,'easeOutBounce')}
					
			);
			$('.post_list.latest_post li:nth-child(3n), .recent-posts.latest-post li:nth-child(3n), .banners-holder li:last-child').addClass('nomargin');
			$('.no-results h2').addClass('no-border');
			$('#before-footer-widget .latestpost li:last-child').addClass('last');
			$('.sf-menu li:last-child').addClass('last');
			$('.post_list.latest_post li .image-wrap a, .post-holder .featured-thumbnail .img-wrap a, .recent-posts.latest-post li .thumb-wrap a, .widget .latestpost li .featured-thumbnail .img-wrap a').append('<span class="stroke"></span>');
			$('.post_list.latest_post li .image-wrap a, .post-holder .featured-thumbnail .img-wrap a, .recent-posts.latest-post li .thumb-wrap a, .widget .latestpost li .featured-thumbnail .img-wrap a').hover(
				function(){$(this).find('.stroke').stop().animate({opacity:.25}, 350)},
				function(){$(this).find('.stroke').stop().animate({opacity:0}, 350)}
			);

			$('.img-hover').append('<span class="mask"></span>');
			if ($.browser.msie && $.browser.version < 10) {
				$('.img-hover').append('<span class="mask-ie"></span>');
				$('.img-hover').hover(function(){
						$(this).find('.mask-ie').stop().animate({opacity:0.5, right:0, top:0, bottom:0, left:0})
					}, function(){
						$(this).find('.mask-ie').stop().animate({opacity:0, right:'50%', top:'50%', bottom:'50%', left:'50%'})
				});				
			}
		});
	</script>
  
	<script type="text/javascript">
		jQuery(window).load(function() {
			jQuery("#showcase").fadeTo(500, 1);
	 
			jQuery("#showcase").awShowcase({
				content_width:          930,
				content_height:         400,
				fit_to_parent:          false,
				auto:                   true,
				interval:               7000,
				continuous:             true,
				loading:                true,
				arrows:                 false, /* */
				buttons:                false,
				btn_numbers:            false,
				keybord_keys:           true,
				mousetrace:             false, /* Trace x and y coordinates for the mouse */
				pauseonover:            false,
				stoponclick:            true,
				transition:             'fade', /* hslide/vslide/fade */
				transition_delay:       300,
				transition_speed:       500,
				show_caption:           'onload', /* onload/onhover/show */
				thumbnails:             true,
				thumbnails_position:    'outside-last', /* outside-last/outside-first/inside-last/inside-first */
				thumbnails_direction:   'horizontal', /* vertical/horizontal */
				thumbnails_slidex:      0, /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
				dynamic_height:         false, /* For dynamic height to work in webkit you need to set the width and height of images in the source. Usually works to only set the dimension of the first slide in the showcase. */
				speed_change:           false, /* Set to true to prevent users from swithing more then one slide at once. */
				viewline:               false /* If set to true content_width, thumbnails, transition and dynamic_height will be disabled. As for dynamic height you need to set the width and height of images in the source. */
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {

			$(".politicas").fancybox();
			
		});
	</script>
	<!-- Custom CSS -->
	  
  
  
  
	<style type="text/css">
	/* Body styling options */
	body { background-color:#212324}		
  	/* Header styling options */
				
	/* Links and buttons color */
				
	/* Body typography */
	body 
	{
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; 
		color:#797979
	}
	#main 
	{
		font-size:11px; 
		font-style:normal;
	}  
	</style>

</head>
<body class="home page">
<div class="content">
<div id="main"><!-- this encompasses the entire Web site -->
    <div class="bg">
        <header id="header">
            <div class="row-menu">
            	<nav class="primary">
				 	<ul id="topnav" class="sf-menu">
				 		<li class="menu-item <?php if(uri_string()=="site/index" or uri_string()=="site" or uri_string()=="") { echo 'current-menu-item';} ?>">
				 		<a href="<?php echo site_url(""); ?>">INICIO</a>
				 		</li>				 						 		
				 		<li class="menu-item <?php if(uri_string()=="eventos") { echo 'current-menu-item';} ?>">
				 		<a href="<?php echo site_url("eventos");?>">EVENTOS</a>
				 		</li>
				 		<li class="menu-item <?php if(uri_string()=="one-to-one") { echo 'current-menu-item';} ?>">
				 		<a href="<?php echo site_url("one-to-one");?>">ONE TO ONE</a>
				 		</li>
				 		<li class="menu-item <?php if(uri_string()=="oflash-news") { echo 'current-menu-item';} ?>">
				 		<a href="<?php echo site_url("oflash-news");?>">OFLASH NEWS</a>
				 		</li>
				 		<li class="menu-item <?php if(uri_string()=="faq") { echo 'current-menu-item';} ?>">
				 		<a href="<?php echo site_url("faq");?>">PREGUNTAS</a>
				 		</li>
				 		<li class="menu-item <?php if(uri_string()=="contact") { echo 'current-menu-item';} ?>">
				 		<a href="<?php echo site_url("contact");?>">CONTACTANOS</a>
				 		</li>
					</ul>
				</nav><!--.primary-->
                <div id="widget-header">
					<!-- Wigitized Header -->                
				</div>
				<!--#widget-header -->                 
                <div id="top-search">
                    
                    <?php            
                    echo form_open('site/search');
                    ?>
                    
                        <div class="bg-form">
                        <input type="text" name="s"  class="input-search"/>
                        <div class="bg-submit"><input type="submit" value="GO" id="submit"></div>
                        </div>
                    <?php            
                    echo form_close();
                    ?>
                </div>  
          	</div>            
        </header>
		  
		<div class="container_12 clearfix">
			
			<div class="grid_4">
				<span class="logo">
					<img src="<?php echo base_url();?>assets/public/images/logo.png" alt="" width="250" height="150">
				</span>
			</div>
             <!-- 
			<div class="grid_7">
				<span class="logo">
					<img src="<?php echo base_url();?>assets/public/uploads/publicidad/banner2.jpg" width="650" height="150">
				</span>
			</div>
-->
			<div class="grid_12">

				<section id="slider-wrapper">
		    		<div class="slider-bg"></div>
						<div id="showcase-holder">
 						<div id="showcase" class="showcase">
  						<?php 
							foreach($slides as $s): 
						?>	
  						<div class="showcase-slide">
	    					<div class="showcase-content">
	        	
	        				<a href="<?php echo site_url("site/post"."/".$s['id_contenido']);?>">
	        					<img width="930" height="400" src="<?php echo base_url();?>assets/public/uploads/articulos/<?php echo $s['id_contenido']; ?>/articulo-930x400.jpg" class="attachment-slider-post-thumbnail " alt="<?php echo $s['titulo']; ?>" title="<?php echo $s['titulo']; ?>" />
	        				</a>
	        				
	        				</div>
							
							<div class="showcase-thumbnail">
	          					<img width="130" height="60" src="<?php echo base_url();?>assets/public/uploads/articulos/<?php echo $s['id_contenido']; ?>/articulo-130x60.jpg" class="attachment-slider-thumb wp-post-image" alt="<?php echo $s['titulo']; ?>" title="<?php echo $s['titulo']; ?>" />        
	          				</div>

					        <div class="showcase-caption">
						        <div class="banner-categoria"><?php echo $s['categoria']; ?></div>
						        <div class="banner-title">
						        <a href="<?php echo site_url("site/post"."/".$s['id_contenido']);?>"><?php echo $s['titulo']; ?></a></div>
								<p><?php echo date("d.M.Y", strtotime($s['fecha_publicado'])); ?></p>
					        </div>
    					</div>

    					<?php endforeach; ?>

    					</div>
    					</div>                                	      	
                              
				</section>
			</div>
            <!-- 
            <div class="grid_12">              
             	<img src="<?php echo base_url();?>assets/public/uploads/publicidad/ultra_mexico.jpg" alt="" width="930" height="110"/></a>
            </div>
            -->
		</div>
		<div class="container_12 primary_content_wrap clearfix">
		<div class="clearfix"></div>
		<div id="top-content-area" class="clearfix"></div>
		<div id="center-content-area" class="clearfix">	
			<div class="grid_9">
                <div id="my_poststypewidget-2">
				
                    <ul class='post_list latest_post'>
                        <?php 
                        foreach($articulos as $a): 
                        ?>
                            <li class="clearfix">
                                <div class="excerpt">                        
                                    <div class="image-wrap">
                                        <a href="<?php echo site_url("site/post"."/".$a['id_contenido']);?>">
                                        <img width="210" height="110" src="<?php echo base_url();?>assets/public/uploads/articulos/<?php echo $a['id_contenido']; ?>/articulo-210x110.jpg" class="" alt="<?php echo $a['titulo']; ?>" title="<?php echo $a['titulo']; ?>" />
                                        </a>
                                    </div>
                                        <a class="post-title" href="<?php echo site_url("site/post"."/".$a['id_contenido']);?>" rel="bookmark" title="<?php echo $a['titulo']; ?>">
                                        <?php echo $a['titulo']; ?>
                                        </a>
                                    <div class="post_content">
                                    <?php echo   word_limiter(trim(strip_tags($a['resumen'])),20); ?>
                                    </div>
                                </div>
                            </li>	
                        <?php endforeach; ?>    	
                    </ul>
				</div>	
                
			</div>
       <!--  BANNERS PUBLICITARIOS -->
         
        <div class="grid_banner_home">
        <h5>PUBLICIDAD</h5>
            <a href="http://www.instagram.com/oflash_ve"><img src="<?php echo base_url();?>assets/public/uploads/publicidad/anuncio.jpg" width="220" height="450"></a>
        </div>
        <!--

        -->
    
        <div class="grid_banner_home">
            <h5>TWITTER</h5>
            <a class="twitter-timeline" data-dnt="false" href="https://twitter.com/Oflash_ve" data-widget-id="629558712387112960" data-chrome="noborders transparent" width="240" height="400"></a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs",omit_script=true);</script>
        </div>
        <div>
            <h5>INSTAGRAM</h5>
            <!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/33a1be9d8e4855ff93f96346203c4531.html" id="lightwidget_33a1be9d8e" name="lightwidget_33a1be9d8e"  scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 250PX; border: 0; overflow: hidden;"></iframe>
        </div>
		<div>
            <h5>FACEBOOK</h5>	
			<div class="fb-page" data-href="https://www.facebook.com/Oflash.Corporacion/" data-tabs="timeline" data-width="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Oflash.Corporacion/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Oflash.Corporacion/">Oflash</a></blockquote></div>
		</div>	
        <div>
            <h5>PUBLICIDAD</h5>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Fotografo Profesional -->
            <ins class="adsbygoogle"
            style="display:inline-block;width:220px;height:250px"
            data-ad-client="ca-pub-7875531907871645"
            data-ad-slot="6585760522"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <div>
            <h5>PUBLICIDAD</h5>
        <a href="https://www.neobux.com/?r=maaz2017"><img src="https://www.neobux.com/imagens/banner5.gif" width="468" height="60"></a>
        </div>
</div>
</div><!--.container-->
    </div><!--.bg-->
    <footer id="footer">
    <div id="back-top-wrapper">
            <p id="back-top">
                <a href="#top"><span></span>Arriba</a>
            </p>
        </div>
    	<div class="bootom">
			<div id="copyright" class="clearfix container_12">
                
                <div class="grid_9">
					<div class="clearfix">
						<div class="grid_5 alpha">
							<div id="footer-text">
								<div class="logo"> <img src="<?php echo base_url();?>assets/public/images/footer-logo.png" alt="" title=""></div>
								<div class="footer-content center">© Corporacion Oflash C.A. | 2012 -2016</br>
                                <a href="terminos.php">Politica y Condiciones de Privacidad</a></div>			
						  </div>    
						</div>
					</div>
				</div>
				
				<div class="grid_3">
					<div id="widget-footer" class="clearfix">
						<div id="social_networks-2" class="grid_3">		
							<ul class="social-networks">
								<li><a rel="external" title="" href="http://www.instagram.com/oflash_ve">
                                <img src="<?php echo base_url();?>assets/public/images/i.png" alt="" width="40" height="40">
                                </a></li>
                                <li><a rel="external" title="" href="https://www.facebook.com/Oflash.Corporacion">
                                <img src="<?php echo base_url();?>assets/public/images/f.png" alt="" width="40" height="40">
                                </a></li>
								<li><a rel="external" title="" href="https://twitter.com/Oflash_ve">
                                <img src="<?php echo base_url();?>assets/public/images/t.png" alt="" width="40" height="40">
                                </a></li>	
                                <li><a rel="external" title="" href="http://www.youtube.com/channel/UC6m6BB2nb3qdW1LypBBcwQQ">
                                <img src="<?php echo base_url();?>assets/public/images/y.png" alt="" width="40" height="40">
                                </a></li>
							</ul>
						</div>					
					</div>
				</div>

			</div>
		</div><!--.container-->
	</footer>
</div><!--#main-->
</div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
	(adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-1676200591502708",
		enable_page_level_ads: true
	});
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-48436140-1', 'oflash.com.ve');
	ga('send', 'pageview');
</script>
</body>
</html>