<?php

if( !function_exists('ata_logo_carousel_metabox_enqueue') ){
  function ata_logo_carousel_metabox_enqueue($hook) {
  //  if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
      wp_enqueue_script('logo_carousel-metabox-js', ATA_LOGO_URL . '/inc/js/logo_carousel-metabox.js', array('jquery', 'jquery-ui-sortable'));
      wp_enqueue_style('logo_carousel-metabox', ATA_LOGO_URL . '/inc/css/logo_carousel-metabox.css');
  //  }
  }
  add_action('admin_enqueue_scripts', 'ata_logo_carousel_metabox_enqueue');
}
  
  
if( !function_exists('ata_add_logo_carousel_metabox') ){
  function ata_add_logo_carousel_metabox($post_type) {
    $types = array('ata_logo');
    if (in_array($post_type, $types)) {
      add_meta_box(
        'ed-logo-carousel-metabox',
        '<span style="font-weight:400;">'.__( 'Logo ', 'ata_logo' ).'</span> </a>',
        'ata_logo_carousel_meta_callback',
        $post_type,
        'normal',
        'high'
      );
    }
  }
  add_action('add_meta_boxes', 'ata_add_logo_carousel_metabox');
}



if( !function_exists('ata_logo_carousel_meta_callback') ){
  function ata_logo_carousel_meta_callback($post) {
    wp_nonce_field( basename(__FILE__), 'logo_carousel_meta_nonce' );
    $ids = maybe_unserialize( get_post_meta($post->ID, 'ata_logo_id', true) );
	$link = maybe_unserialize( get_post_meta($post->ID, 'ata_logo_link', true) );
	$tooltip = maybe_unserialize( get_post_meta($post->ID, 'ata_logo_tooltip', true) );
	$target = maybe_unserialize( get_post_meta($post->ID, 'ata_logo_target', true) );

    ?>
     <table class="form-table">
      <tr>
        <th style="width:20%"><label for="sample_text">Carousel  Logo</label>
       <p style="font-size:12px; font-style:italic; color:#aaa;">Add multiple Logo ( CTRL + SELECT )</p>
       <p style="font-size:12px; font-style:italic; color:#aaa;">for ordering drag and drop Logo(s)</p>
       
       </th>
      <td>
        <a class="ed-logo-carousel-add button" target=""  href="#" data-uploader-title="Add image(s) to gallery" data-uploader-button-text="Add image(s)" style="margin-left:19px;">Add Logo(s)</a>

        <ul id="ed-logo-carousel-metabox-list">
        <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>

          <li>
            <input type="hidden" name="ata_logo_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
            <img class="image-preview" src="<?php echo esc_url($image[0]); ?>">
           
           	<div class="ed-pull-right">
             <input type="text" name="ata_logo_link[<?php echo $key; ?>]" value="<?php echo esc_url( $link[$key]);?>" size="120" placeholder="Logo link" class="wdith-70" />
              <select name="ata_logo_target[<?php echo $key; ?>]" class="wdith-30">
            	<option <?php if($target[$key] == '_blank'):?> selected="selected"<?php endif;?> value="_blank">Blank</option>
                <option <?php if($target[$key] == '_parent'):?> selected="selected"<?php endif;?> value="_parent">Parent</option>
                <option <?php if($target[$key] == '_self'):?> selected="selected"<?php endif;?> value="_self">Self</option>
                <option <?php if($target[$key] == '_top'):?> selected="selected"<?php endif;?> value="_top">Top</option>
             </select>
             
             
             <input type="text" name="ata_logo_tooltip[<?php echo $key; ?>]" value="<?php echo esc_html($tooltip[$key]);?>" size="120" readonly="readonly" placeholder="Tooltip Text (pro features)" readonly="readonly"/>
            
           
            </div>
            <div  style="clear:both; height:10px;"></div>
            <a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change Logo</a>
            <small><a class="remove-image  button button-small" href="#">Remove Logo</a></small>
          </li>

        <?php endforeach; endif; ?>
        </ul>

      </td></tr>
    </table>
    
  <?php }
}


if( !function_exists('ata_logo_carousel_meta_save') ){
  function ata_logo_carousel_meta_save($post_id) {
    if (!isset($_POST['logo_carousel_meta_nonce']) || !wp_verify_nonce($_POST['logo_carousel_meta_nonce'], basename(__FILE__))) return;

    if (!current_user_can('edit_post', $post_id)) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

   if(isset($_POST['ata_logo_id'])) {
	  $logo = array_map( 'intval', $_POST['ata_logo_id'] );
      update_post_meta($post_id, 'ata_logo_id', maybe_serialize( $logo ) );
    } else {
      delete_post_meta($post_id, 'ata_logo_id');
    }
	if(isset($_POST['ata_logo_link'])) {
	
	  $link = ata_sanitize_url($_POST['ata_logo_link']);
      update_post_meta($post_id, 'ata_logo_link', maybe_serialize( $link ));
	  
    } else {
      delete_post_meta($post_id, 'ata_logo_link');
    }
	if(isset($_POST['ata_logo_target'])) {
	  $target = ata_sanitize_text($_POST['ata_logo_target']);
      update_post_meta($post_id, 'ata_logo_target', maybe_serialize( $target ) );
    } else {
      delete_post_meta($post_id, 'ata_logo_target');
    }
	if(isset($_POST['ata_logo_tooltip'])) {
	  $tooltip = ata_sanitize_html($_POST['ata_logo_tooltip']);
      update_post_meta($post_id, 'ata_logo_tooltip', maybe_serialize( $tooltip ) );
    } else {
      delete_post_meta($post_id, 'ata_logo_tooltip');
    }
	
	
	
  }
  add_action('save_post', 'ata_logo_carousel_meta_save');

}

?>