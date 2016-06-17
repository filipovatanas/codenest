<?
add_theme_support('post-thumbnails');
add_image_size( 'custom-size-slide', 1148, 520);
add_image_size( 'custom-size-service', 560, 560);
add_image_size( 'custom-size-portfolio-one', 364, 364, true);
add_image_size( 'custom-size-portfolio-two', 364, 590, true);
add_image_size( 'custom-size-team', 168, 168, true);
add_image_size( 'custom-size-clients', 266, 140, true);


add_action('init', 'slider_register');  
add_action('init', 'services_register');  
   
add_action('init', 'portfolio_register');  
   
   
   
add_action('init', 'team_register'); 



add_action('init', 'clients_register');  
   
function clients_register() {  
    $args = array(  
        'label' => __('Clients'),  
        'singular_label' => __('Client'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
		'rewrite' => true,  
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')  
       );  
   
    register_post_type( 'clients' , $args );  
}    

 
   
function team_register() {  
    $args = array(  
        'label' => __('Team'),  
        'singular_label' => __('Person'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
		'rewrite' => true,  
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')  
       );  
   
    register_post_type( 'team' , $args );  
}    
   
   
   
   
   
   
   
   
   
   
   
   
   
   
function portfolio_register() {  
    $args = array(  
        'label' => __('Portfolio'),  
        'singular_label' => __('Project'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
		'rewrite' => true,  
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')  
       );  
   
    register_post_type( 'portfolio' , $args );  
}      
   
function services_register() {  
    $args = array(  
        'label' => __('Services'),  
        'singular_label' => __('Service'),  
        'public' => false,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
		'rewrite' => false,  
		'query_var'          => false,
		'publicly_queryable' => false,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions')  
       );  
   
    register_post_type( 'services' , $args );  
}   
   
   register_taxonomy("categories", array("services"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true));
   
   
function slider_register() {  
    $args = array(  
        'label' => __('Home Slider'),  
        'singular_label' => __('Slide'),  
        'public' => false,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
		'rewrite' => false,  
		'query_var'          => false,
		'publicly_queryable' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions')  
       );  
   
    register_post_type( 'slider' , $args );  
}


add_action("admin_init", "slider_meta_box");   
 
 
function slider_meta_box(){  
    add_meta_box("cantactInfo-meta", "Select Brand", "slider_meta_options", "slider", "normal", "high");  
}  
   
 
function slider_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $buttonurl = $custom["buttonurl"][0];  
		$buttonurl_open = $custom["buttonurl_open"][0]; 
	 
?>  

<div>
    <div class="zmcss">
      <label>Button url:</label>
    </div>
    <div class="zmcss2">
      <input name="buttonurl" value="<?php echo $buttonurl; ?>" /> 
    </div>
    <div class="zmcss">
      <label>Open url:</label>
    </div>
    <div class="zmcss2">
    <select name="buttonurl_open">
  <option value="1" <?php if ($buttonurl_open == '1'){ ?>selected<? } ?>>Same window</option>
  <option value="2" <?php if ($buttonurl_open == '2'){ ?>selected<? } ?>>New window</option>
</select>
    </div>
</div>
 
<?php  
    }

add_action('save_post', 'save_contact'); 
   
function save_contact(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "buttonurl", $_POST["buttonurl"]); 
		update_post_meta($post->ID, "buttonurl_open", $_POST["buttonurl_open"]); 
    } 
}

add_filter("manage_edit-slider_columns", "project_edit_columns");   
   
function project_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Slider",  
			"sliderurl" => "URL", 
            "slider" => "Image",  
			 
        );  
   
        return $columns;  
}  
 
add_action("manage_posts_custom_column",  "project_custom_columns"); 
   
function project_custom_columns($column){  
        global $post;  
		$custom = get_post_custom(); 
        switch ($column)  
        {  
            case "slider":
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				?>
               			<img src="<?=$feat_image;?>" width="50">
				<?
            break; 
			case "sliderurl":
					echo $custom["buttonurl"][0];
            break;   
        }  
}
?>