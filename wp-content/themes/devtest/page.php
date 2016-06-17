<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storto
 */

get_header(); 
$settings = get_option( 'sa_options', $sa_options );
//echo $settings['footer_copyright'];
?>

<div class="wrapper">
		<div id="header">
			<div class="row">
				<div class="col-md-3">
                    <img src="<?=get_template_directory_uri();?>/images/logo.png" class="custom-logo" alt="logo" />
				</div>
			</div>
			<div class="row headermenu">
				<div class="col-lg-3"></div>
				<div class="col-lg-9">
					<div id="mobile-menu-btn">Menu</div>
					<div class="top-menu">
                    	<ul id="menu-header-menu" class="menu">                    
						<?	$menu_name = 'header-menu'; 

							if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) 
							{
    							$menu = wp_get_nav_menu_object($locations[$menu_name]);
    							$menu_items = wp_get_nav_menu_items($menu->term_id);
							}

							foreach ($menu_items as $menu_item) 
							{
    							$id = $menu_item->ID;
    							$title = $menu_item->title;
    							$url = $menu_item->url;
							?><li id="menu-item-<?=$id;?>" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?=$id;?>"><a href="<?=$url;?>"><?=$title;?></a></li><?  
							}
						?>                     
						</ul>
					</div>					
				</div>
			</div>
		</div>

		<div id="content">
			<div class="row homepage-top">
				<div class="col-md-12 box">
					<ul class="bxslider"><?        
        				$upcoming_items_args = array( 
							'post_type' => 'slider',
							'paged' => $pagenum,
							'orderby' => 'ID',
							'order' => 'asc',
							);
			 
        				$loop = new WP_Query($upcoming_items_args);
						while ( $loop->have_posts() ) : $loop->the_post();
			 			?><li><img src="<?=the_post_thumbnail_url( 'custom-size-slide' );?>" alt="<?=get_the_title();?>" /><div class="slider-text-conteiner"><?=get_the_title();?></div></li><?
						endwhile; 
						?>
					</ul>                
					<script>
						var j = jQuery.noConflict();
 						j(document).ready(function(){
						j('.bxslider').bxSlider({
  							auto: true,
  							autoControls: true
							});
						});
					</script>
			</div>
		 </div>
		</div>
	<div class="row">
		<div class="home-title black hcenter">What we do?</div>
	</div>
	<?
  		$upcoming_items_args = array( 
			'post_type' => 'services',
			'paged' => $pagenum,
			'orderby' => 'ID',
			'order' => 'asc',
			);
			 
        $loop = new WP_Query($upcoming_items_args);
		$number = 1;
		while ( $loop->have_posts() ) : $loop->the_post();
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		$categories = get_the_terms( get_the_ID(), 'categories' );

		if ($number % 2 == 0) {
  			?><div class="row space-40">
  				<div class="col-md-6">
                	<div class="service-category"><?
                		foreach( $categories as $category ) 
						{
        					echo $category->name;
    					}
						?>
					</div>
                	<div class="service-title"><?=get_the_title();?></div>
                    <div class="service-title-hl"></div>
                	<div class="service-excerpt"><?php the_excerpt(); ?>
                    		<div class="learn-more"><a href="" class="learn-more-button">learn more</a></div>
                    </div>
                </div>
  				<div class="col-md-6 featimage">
                	<img src="<?=$feat_image;?>" alt="<?=get_the_title();?>" />
                </div>
			</div>
			<?

		}else{
			 ?>
            <div class="row space-40">
  				<div class="col-md-6 featimage"><img src="<?=$feat_image;?>" alt="<?=get_the_title();?>" /></div>
  				<div class="col-md-6">
                	<div class="service-category"><?
                		foreach( $categories as $category ) 
						{
        					echo $category->name;
    					}
				?></div>
                	<div class="service-title"><?=get_the_title();?></div>
                    <div class="service-title-hl"></div>
                	<div class="service-excerpt"><?php the_excerpt(); ?>
                    		<div class="learn-more"><a href="" class="learn-more-button">learn more</a></div>
                    </div>
                </div>
			</div>
			<?
			}
		$number++;
		endwhile; 
?>
<div class="space-80"></div> 
<div class="row">
		<div class="home-title black hcenter">Our best work</div>
</div>
<div class="space-80"></div> 
<div class="row">
	<div id="container" class="photos clearfix isotope" style="position: relative; overflow: hidden; height: 980px;">
	<?  $upcoming_items_args = array( 
			'post_type' => 'portfolio',
		);
			 
        $loop = new WP_Query($upcoming_items_args);
		$number2 = 0;
		while ( $loop->have_posts() ) : $loop->the_post();
  
  	?>
		<div class="photo isotope-item"><a href="http://127.0.0.1/pldtest/portfolio/project-1/" title="<?=get_the_title();?>">
  	<?
  		if ($number2 % 2 == 0) {
  	?>
  
  				<img src="<?=the_post_thumbnail_url( 'custom-size-portfolio-one' );?>" alt="<?=get_the_title();?>" />	
			<?
  		}else{
	  ?>
  				<img src="<?=the_post_thumbnail_url( 'custom-size-portfolio-two' );?>" alt="<?=get_the_title();?>" />
	  <?
	  		}
	  ?>
      </a>
		</div>
	  <?
  		$number2++;
		endwhile; 
?>
  </div>
</div>

<script type="text/javascript">
   jQuery(document).ready(function($) {
    $(function(){
      var $container = $('#container');
      $container.imagesLoaded( function(){
        $container.isotope({
          itemSelector : '.photo'
        });
      });    
    });
  }); 
</script>
</div>

<script>
jQuery(document).ready(function($) {
$('.bxsliderteam').bxSlider({
    slideWidth: 168,
    minSlides: 3,
    maxSlides: 3,
    slideMargin: 127
  });
 });
</script>

<div class="space-80"></div>
<div id="fullwidth"> 
	<div class="row">
		<div class="home-title black hcenter">best team</div>
	</div>
	<div class="row">
		<div class="col-md-12">
        	<ul class="bxsliderteam">            
			<? $upcoming_items_args = array( 
					'post_type' => 'team',
					'paged' => $pagenum,
					'orderby' => 'ID',
					'order' => 'asc',
				);
			   $loop = new WP_Query($upcoming_items_args);
			
				while ( $loop->have_posts() ) : $loop->the_post();
  				?>	<li class="isotope-item all"><img src="<?=the_post_thumbnail_url( 'custom-size-team' );?>" alt="<?=get_the_title();?>" />
						<div class="team-title"><?=get_the_title();?></div>
						<div class="team-title-hl"></div>
						<div class="team-subtitle"><?=the_excerpt();?></div>
					</li><?
endwhile; 
?>  					
			</ul>
		</div>
	</div>
</div>

<div class="space-80"></div> 

<div class="wrapper">
	<div class="row">
		<div class="home-title black hcenter">clients say’s</div>
	</div>
	<div class="space-80"></div>
				<div class="row">
					<div class="col-md-6">
                    	<div class="clients-title">frank sims</div>
                    	<div class="clients-title-hl"></div>
                		<div class="clients-subtitle">photographer</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="client-full-text">
                 				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                    	</div>
                    </div>
				</div>
</div>           
<div class="space-80"></div>
<script>
jQuery(document).ready(function($) {
$('.bxsliderclients').bxSlider({
    slideWidth: 266,
    minSlides: 4,
    maxSlides: 4,
	moveSlides: 1,
    slideMargin: 10
  });
 });
</script>            

<div class="wrapper clients-wrapper"> 
	<div class="row">
		<div class="col-md-12">
        	<ul class="bxsliderclients">		     
         	<?	$upcoming_items_args = array( 
					'post_type' => 'clients',
					'paged' => $pagenum,
					'orderby' => 'ID',
					'order' => 'asc',
				);
        		$loop = new WP_Query($upcoming_items_args);
				while ( $loop->have_posts() ) : $loop->the_post();
  			?>
  				<li class="isotope-item all">
					<a href="http://127.0.0.1/pldtest/portfolio/project-1/" title="Project 1"><img src="<?=the_post_thumbnail_url( 'custom-size-clients' );?>" alt="<?=get_the_title();?>" /></a>
				</li>
	  		<?
				endwhile; 
			?>  
			</ul>                
		</div>
	</div>
</div>
<div class="clearfix"></div>
	<div id="footer">            
		<div class="wrapper">
			<div class="row">
               	<div class="home-title white hcenter">get in touch</div>
         		<div class="space-80"></div> 
			</div>
			<div class="row">
				<div class="col-md-6"> 
                    <div class="adress-footer"><div class="footer-address-icon"></div> 23 Mulholland Drive, Suite 721. Los Angeles 10010
					100 S. Main Street. Los Angeles 90012</div>
                    <div class="telefon-footer"><div class="footer-tel-icon"></div> +1-670-567-5590</div>
                    <div class="email-footer"><div class="footer-email-icon"></div> <a href="mailto:hello@clemocreative.com">hello@clemocreative.com</a></div>
                	<div class="our-social-pages">        
						<a class="facebookBtn smGlobalBtn" href="http://facebook.com" target="_blank"></a>
                    	<a class="twitterBtn smGlobalBtn" href="https://twitter.com/energie_nl" target="_blank"></a>
                    	<a class="googleplusBtn smGlobalBtn" href="http://twitter.com" target="_blank"></a>
                    </div>
              	</div>
				<div class="col-md-6 calendar">
                   	<img src="<?=get_template_directory_uri();?>/images/calendar.png" alt="calendar">
				</div>
			</div>
		</div>       
	</div>
<div id="footer2"> 
	<div class="row">
		<div class="col-md-12">
              	<div class="footer-2">© 2016 clemo.</div>
				<div class="footer-3">all rights reserved</div>
		</div>
	</div>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
<? get_footer(); ?>