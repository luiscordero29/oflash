<!DOCTYPE html>
<html lang="ES">
<head>
	<base href="<?php echo base_url().'index.php/'.uri_string();?>" />
  	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  	<meta name="robots" content="index, follow" />
  	<title>Contactanos | OFLASH.com.ve</title>
  	<meta name="author" content="OFLASH.com.ve" />
  	<meta property="og:url" content="<?php echo base_url().'index.php/'.uri_string();?>" />
  	<meta property="og:title" content="Contactanos" />
  	<meta property="og:type" content="article" />
  	<meta property="og:description" content="Contactanos" />
  	<meta name="description" content="Contacnanos" />
  	<meta name="keywords" content="Contactanos" />
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
<script type='text/javascript' src='<?php echo base_url();?>assets/public/js/jquery.prettyPhoto.js'></script>
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
		$(document).ready(function() {

			
			$("a[rel=gallery]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9,
				

				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Foto ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + ' - Todos derechos reservados a www.Oflash.com.ve</span>';
				}
			});

			
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {

			$(".politicas").fancybox();
			
		});
	</script>
  
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

<body class="single single-post">
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

          	<div class="container_12 clearfix">
			
				<div class="grid_12">
					<span class="logo">
						<img src="<?php echo base_url();?>assets/public/images/logo.png" alt="" width="250" height="150">
					</span>
				</div>
			</div>        

        </header>

		<div class="container_12 primary_content_wrap clearfix">  
		<div  id="content" class="grid_7 right">
		<h2>Información de Contacto</h2>
		<p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3944.7616061623535!2d-70.26872597763246!3d8.618871028280335!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e7b57a1d9a4ad6f%3A0x1e51b1fb64b7b204!2sCorporaci%C3%B3n+Oflash%2C+C.A.!5e0!3m2!1ses!2sve!4v1408380176204" width="930" height="250" frameborder="0" style="border:0"></iframe>
        </div>
		   <div  id="content">
           <div class="grid_6">
           <h2>Dirección Principal</h2>
			<nombre>Av. Progreso con calle 6. Urb. Jardines de Alto Barinas.
            Conjunto Karuai, Nº 17.</nombre>
            </div>
            <div class="grid_6">
           <h2>Dirección Sucursal</h2>
			<nombre>Av. Adonay Parra con Callejon El Barro, Urb. Campo la Mesa.
            Centro Galeria Simon`s, Piso 1, Local 06.<br />
            <a href="#">0273-6351302</a></nombre>
            </div>
            </div>
            <div id="content">
            	<div class="grid_6">
					<div class="grid_3">
            		<h2>Fotografos</h2>
					<h5>Andrés Salazar</h5>
            		<cargo>Fotografo Profesional</cargo><br />
					0414-1583244 | 0426-1779166<br />
            		<a href="#">andres@oflash.com.ve</a>
            		</div>
                    <div class="grid_3">
          			<h5>Jhojan López</h5>
          			<cargo>Fotografo Profesional</cargo><br />
					0414-0728494<br />
            		<a href="#">jhojan@oflash.com.ve</a>
             		</div>
				</div>
            <div  id="content" class="grid_4"><h2>Formulario de Contacto</h2>
			<div>
				
				<?php            				
				$at = array('class' => 'wpcf7-form');
                echo form_open('',$at);
                ?>

				
				<p class="field">
					<span class="wpcf7-form-control-wrap text-243">
						<input type="text" name="nombre" value="Nombre" class="wpcf7-text wpcf7-validates-as-required wpcf7-use-title-as-watermark" size="40" title="Nombre:" />
					</span>
				</p>
				<p class="field">
					<span class="wpcf7-form-control-wrap text-727">
					<input type="text" name="email" value="Correo" class="wpcf7-text wpcf7-validates-as-required wpcf7-use-title-as-watermark" size="40" title="E-mail:" />
					</span>
				</p>
				<p class="field">
					<span class="wpcf7-form-control-wrap text-53">
					<input type="text" name="telefono" value="Telefono" class="wpcf7-text wpcf7-use-title-as-watermark" size="40" title="Teléfono:" />
					</span>
				</p>
				<p class="field">
					<span class="wpcf7-form-control-wrap textarea-98">
					<textarea name="texto" class="wpcf7-use-title-as-watermark" cols="40" rows="10" title="Mensaje:"></textarea>
					</span>
				</p>
				<p class="submit-wrap">
				<div class="button-submit"><input type="reset" value="Limpiar" /></div>
				<div class="button-submit"><input type="submit" value="Enviar" class="wpcf7-submit" />
				</div>
				</p>
				
				<?php            
                echo form_close();
                ?>
			</div>
			</div>
      	</div><!--.container-->

    </div><!--.bg-->
    <footer id="footer">
    	<div class="bootom">
			<div id="copyright" class="clearfix container_12">
                
                <div class="grid_9">
					<div class="clearfix">
						<div class="grid_5 alpha">
							<div id="footer-text">
								<div class="logo"> <img src="<?php echo base_url();?>assets/public/images/footer-logo.png" alt="" title=""></div>
								<div class="footer-content center">© Corporacion Oflash C.A. | 2012 -2015</br>
                                <a class="politicas" href="<?php echo base_url(); ?>politicas.txt">Politica y Condiciones de Privacidad</a></div>			
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48436140-1', 'oflash.com.ve');
  ga('send', 'pageview');
</script>
</body>
</html>