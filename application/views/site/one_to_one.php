<!DOCTYPE html>
<html lang="ES">
<head>
	<base href="<?php echo base_url().'index.php/'.uri_string();?>" />
  	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  	<meta name="robots" content="index, follow" />
  	<title>One to One | OFLASH.com.ve</title>
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
	body { background-color:#f9f9fb}		
  	/* Header styling options */
				
	/* Links and buttons color */
				
	/* Body typography */
	body 
	{ 
		color:#797979;
	}
	#main 
	{
		font-size:13px; 
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
				</nav>
            	<!--.primary-->
            	<div id="widget-header">
					<!-- Wigitized Header -->                
				</div>
				<!--#widget-header -->                 
                <div id="top-search">
                    
                    <?php            
                    echo form_open('search');
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
			
			<div class="grid_4">
				<span class="logo">
					<img src="<?php echo base_url();?>assets/public/images/logo.png" alt="" width="250" height="150">
				</span>
			</div>
			</div>        

        </header>

		<div class="container_12 primary_content_wrap clearfix">

          
		<div  id="content" class="grid_12 right">
			
			<div id="player"></div>
			<script>
		      // 2. This code loads the IFrame Player API code asynchronously.
		      var tag = document.createElement('script');

		      tag.src = "https://www.youtube.com/iframe_api";
		      var firstScriptTag = document.getElementsByTagName('script')[0];
		      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		      // 3. This function creates an <iframe> (and YouTube player)
		      //    after the API code downloads.
		      var player;
		      function onYouTubeIframeAPIReady() {
		        player = new YT.Player('player', {
		          height: '360',
		          width: '640',
		          videoId: 'M7lc1UVf-VE',
		          events: {
		            'onReady': onPlayerReady,
		            'onStateChange': onPlayerStateChange
		          }
		        });
		      }

		      // 4. The API will call this function when the video player is ready.
		      function onPlayerReady(event) {
		        event.target.playVideo();
		      }

		      // 5. The API calls this function when the player's state changes.
		      //    The function indicates that when playing a video (state=1),
		      //    the player should play for six seconds and then stop.
		      var done = false;
		      function onPlayerStateChange(event) {
		        if (event.data == YT.PlayerState.PLAYING && !done) {
		          setTimeout(stopVideo, 6000);
		          done = true;
		        }
		      }
		      function stopVideo() {
		        player.stopVideo();
		      }
		    </script>

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
								<div class="footer-content">© Corporacion Oflash C.A. | 2012 -2016</br>
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