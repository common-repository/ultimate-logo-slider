<?php

if( !function_exists('ata_logo_carousel_options_init') ){
	add_action( 'admin_init', 'ata_logo_carousel_options_init' );
	function ata_logo_carousel_options_init(){
		register_setting( 'ata_logo_carousel_options', 'ata_logo_carousel_options');
	} 
}
if( !function_exists('ata_logo_carousel_options_add') ){
	add_action( 'admin_menu', 'ata_logo_carousel_options_add' ); 
	function ata_logo_carousel_options_add() {
		add_submenu_page( 'edit.php?post_type=ata_logo', 'Global Settings', 'Global Settings', 'manage_options', 'settings', 'ata_logo_carousel_options_do' );
	}
}


function ata_logo_carousel_options_do() {
	global $select_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;


		?>
        
        <div class="wrap">
	<h2><?php _e( 'Logo Carousel Global Settings', 'ata_logo' ); ?></h2>
	<div id="wpcom-stats-meta-box-container" class="metabox-holder">
		<form method="post" action="options.php">
		<?php settings_fields( 'ata_logo_carousel_options' ); ?>
		<?php $options = get_option( 'ata_logo_carousel_options' ); ?>
		<div class="postbox-container" style="width: 49%;margin-right: 10px;">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
				<div class="postbox" id="ed-global-settings">
					<h3 class="hndle"><span><?php _e( 'Slider Settings', 'ata_logo' ); ?></span></h3>
					<div class="inside">
                         <strong> Slider Settings only available in <a target="_blank" href="https://athemeart.com/downloads/ultimate-logo-slider-pro/">Pro version ($7)</a></strong><br />
<br />
     
                        <table class="form-table ed-table-options ed-pro-div">
                          <tr>
                            <th style="width:30%"><label for="sample_text"><?php _e( 'Auto Play', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <select name="ata_logo_carousel_options[auto_play]" disabled="disabled">
                                <option <?php if($options['auto_play']=='yes'):?> selected="selected"<?php endif;?> value="yes"><?php _e( 'Yes', 'ata_logo' ); ?></option>
                                <option <?php if($options['auto_play']=='no'):?> selected="selected"<?php endif;?> value="no"><?php _e( 'No', 'ata_logo' ); ?></option>
                            </select>
                          </td>
                          </tr>
                            <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Auto play speed ', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <input id="ata_logo_carousel_options[auto_play_speed]" name="ata_logo_carousel_options[auto_play_speed]" value="<?php echo $options['auto_play_speed'];?>" type="number" disabled="disabled"><span style="font-size:12px; margin-left:25px; font-style:italic; color:#aaa;">milliseconds</span>
                          </td>
                          </tr>
                            <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Slide Speed', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <input id="ata_logo_carousel_options[slide_speed]" name="ata_logo_carousel_options[slide_speed]" value="<?php echo $options['slide_speed'];?>" type="number" disabled="disabled"><span style="font-size:12px; margin-left:25px; font-style:italic; color:#aaa;">milliseconds</span>
                          </td>
                          </tr>
                          
                          
                          <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Stop on Hover', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <select name="ata_logo_carousel_options[stop_on_hover]" disabled="disabled">
                               <option <?php if($options['stop_on_hover']=='yes'):?> selected="selected"<?php endif;?> value="yes"><?php _e( 'Yes', 'ata_logo' ); ?></option>
                                <option <?php if($options['stop_on_hover']=='no'):?> selected="selected"<?php endif;?> value="no"><?php _e( 'No', 'ata_logo' ); ?></option>
                            </select>
                          </td>
                          </tr>
                          
                           <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'next/prev Buttons', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <select name="ata_logo_carousel_options[next_prev_buttons]" disabled="disabled">
                               <option <?php if($options['next_prev_buttons']=='yes'):?> selected="selected"<?php endif;?> value="yes"><?php _e( 'Yes', 'ata_logo' ); ?></option>
                                <option <?php if($options['next_prev_buttons']=='no'):?> selected="selected"<?php endif;?> value="no"><?php _e( 'No', 'ata_logo' ); ?></option>
                            </select>
                          </td>
                          </tr>
                           <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'next/prev position ', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <select name="ata_logo_carousel_options[next_prev_position]" disabled="disabled">
                                <option <?php if($options['next_prev_position']=='center'):?> selected="selected"<?php endif;?> value="center"><?php _e( 'Center', 'ata_logo' ); ?></option>
                                <option <?php if($options['next_prev_position']=='top_right'):?> selected="selected"<?php endif;?> value="top_right"><?php _e( 'Top Right', 'ata_logo' ); ?></option>
                                <option <?php if($options['next_prev_position']=='top_left'):?> selected="selected"<?php endif;?> value="top_left"><?php _e( 'Top Left', 'ata_logo' ); ?></option>
                                <option <?php if($options['next_prev_position']=='bottom_left'):?> selected="selected"<?php endif;?> value="bottom_left"><?php _e( 'Bottom Left', 'ata_logo' ); ?></option>
                                <option <?php if($options['next_prev_position']=='bottom_right'):?> selected="selected"<?php endif;?> value="bottom_right"><?php _e( 'Bottom Right', 'ata_logo' ); ?></option>
                            </select>
                          </td>
                          </tr>
                        
                        
                         <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Pagination', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <select name="ata_logo_carousel_options[pagination]" disabled="disabled">
                                <option <?php if($options['pagination']=='yes'):?> selected="selected"<?php endif;?> value="yes"><?php _e( 'Yes', 'ata_logo' ); ?></option>
                                <option <?php if($options['pagination']=='no'):?> selected="selected"<?php endif;?> value="no"><?php _e( 'No', 'ata_logo' ); ?></option>
                            </select>
                          </td>
                          </tr>
                          
                         <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Mouse Drag', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <select name="ata_logo_carousel_options[mouse_drag]" disabled="disabled">
                                <option <?php if($options['mouse_drag']=='yes'):?> selected="selected"<?php endif;?> value="yes"><?php _e( 'Yes', 'ata_logo' ); ?></option>
                                <option <?php if($options['mouse_drag']=='no'):?> selected="selected"<?php endif;?> value="no"><?php _e( 'No', 'ata_logo' ); ?></option>
                            </select>
                          </td>
                          </tr>
                           
                           <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Lazy Load', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <select name="ata_logo_carousel_options[lazy_load]" disabled="disabled">
                               <option <?php if($options['lazy_load']=='yes'):?> selected="selected"<?php endif;?> value="yes"><?php _e( 'Yes', 'ata_logo' ); ?></option>
                                <option <?php if($options['lazy_load']=='no'):?> selected="selected"<?php endif;?> value="no"><?php _e( 'No', 'ata_logo' ); ?></option>
                            </select>
                          </td>
                          </tr>
                          
                          
                          </tr>
                            <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Logo items (on Desktop, screen larger than 1198px)', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <input id="ata_logo_carousel_options[desktop]" name="ata_logo_carousel_options[desktop]" value="<?php echo $options['desktop'];?>" type="number" disabled="disabled">
                          </td>
                          </tr>
                          
                          </tr>
                            <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Logo items (on Desktop, screen larger than 978px)', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <input id="ata_logo_carousel_options[mini_desktop]" name="ata_logo_carousel_options[mini_desktop]" value="<?php echo $options['mini_desktop'];?>" type="number" disabled="disabled">
                          </td>
                          </tr>
                          
                           </tr>
                            <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Logo items (on Tablet)', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <input id="ata_logo_carousel_options[tablet]" name="ata_logo_carousel_options[tablet]" value="<?php echo $options['tablet'];?>" type="number" disabled="disabled">
                          </td>
                          </tr>
                          
                            </tr>
                            <tr>
                            <th style="width:20%"><label for="sample_text"><?php _e( 'Logo items (on Mobile)', 'ata_logo' ); ?></label>
                           </th>
                          <td>
                            <input id="ata_logo_carousel_options[mobile]" name="ata_logo_carousel_options[mobile]" value="<?php echo $options['mobile'];?>" type="number" disabled="disabled">
                          </td>
                          </tr>
                          
                          
                         
                          </table>
                        <script type="text/javascript">
							jQuery(document).ready(function($){
								$('.my-color-field').wpColorPicker();
							});
						</script>

					</div>
					<div id="major-publishing-actions">
						<div id="publishing-action">
							<input type="submit" name="save" id="save" class="button button-primary" value="<?php _e( 'Save Options', 'ata_logo' ); ?>"  />
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="postbox-container" style="width: 49%;">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
				<div class="postbox" id="ed-social-settings">
					<h3 class="hndle"><span><?php _e( 'Style Settings', 'ata_logo' ); ?></span></h3>
					<div class="inside">
						 <strong> Slider Settings only available in <a target="_blank" href="https://athemeart.com/downloads/ultimate-logo-slider-pro/">Pro version ($7)</a></strong><br />
<br />
     
                        <table class="form-table ed-table-options ed-pro-div">
                          <tr>
                            <th style="width:30%"><?php _e( 'Arrows Size', 'ata_logo' ); ?>
                           </th>
                          <td>
                            <input type="text" name="ata_logo_carousel_options[arrows_size]" value="<?php echo $options['arrows_size'];?>" disabled="disabled" />px
                          </td>
                          </tr>
                          
                           <tr>
                            <th style="width:30%"><?php _e( 'Arrows Background', 'ata_logo' ); ?>
                           </th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[arrows_bg]" value="<?php echo $options['arrows_bg'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                          <tr>
                            <th style="width:30%"><?php _e( 'Arrows Color', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[arrows_color]" value="<?php echo $options['arrows_color'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                           <tr>
                            <th style="width:30%"><?php _e( 'Arrows Hover Background', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[arrows_bg_h]" value="<?php echo $options['arrows_bg_h'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                           <tr>
                            <th style="width:30%"><?php _e( 'Arrows Hover Color', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[arrows_color_h]" value="<?php echo $options['arrows_color_h'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                           <tr>
                            <th style="width:30%"><?php _e( 'Pagination Color', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[pagination_color]" value="<?php echo $options['pagination_color'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                           <tr>
                            <th style="width:30%"><?php _e( 'Pagination Hover Color', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[pagination_color_h]" value="<?php echo $options['pagination_color_h'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                           <tr>
                            <th style="width:30%"><?php _e( 'Tooltip Background', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[tooltip_bg]" value="<?php echo $options['tooltip_bg'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                          <tr>
                            <th style="width:30%"><?php _e( 'Tooltip Text Color', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[tooltip_color]" value="<?php echo $options['tooltip_color'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                            <tr>
                            <th style="width:30%"><?php _e( 'Tooltip Font Size', 'ata_logo' ); ?></th>
                          <td>
                            <select name="ata_logo_carousel_options[tooltip_size]" disabled="disabled">
                    <?php for ($x = 9; $x <= 50; $x++) {?>
                  <option value="<?php echo $x;?>" <?php if($options['tooltip_size'] == $x):?> selected="selected"<?php endif;?>><?php echo $x;?> <?php _e( 'px', 'ata_logo' ); ?></option>
                   <?php } ?>
                </select>
                          </td>
                          </tr>
                          <tr>
                            <th style="width:30%"><?php _e( 'Logo Border', 'ata_logo' ); ?></th>
                          <td>
    <select name="ata_logo_carousel_options[logo_border]" disabled="disabled">
    <option value="no" <?php if($options['logo_border'] == 'no'):?> selected="selected"<?php endif;?>><?php _e( 'No', 'ata_logo' ); ?></option>
    <option value="yes" <?php if($options['logo_border'] == 'yes'):?> selected="selected"<?php endif;?>><?php _e( 'Yes', 'ata_logo' ); ?></option>	
    </select>
                          </td>
                          </tr>
                          <tr>
                            <th style="width:30%"><?php _e( 'Logo Border Size', 'ata_logo' ); ?></th>
                          <td>
   							<input name="ata_logo_carousel_options[border_size]]" value="<?php echo $options['border_color'];?>" type="number" disabled="disabled"> px
                          </td>
                          </tr>
                          
                           <tr>
                            <th style="width:30%"><?php _e( 'Border Color', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[border_color]" value="<?php echo $options['border_color'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                           <tr>
                            <th style="width:30%"><?php _e( 'Border Hover Color', 'ata_logo' ); ?></th>
                          <td>
                             <input class="ata_color_field" type="text" name="ata_logo_carousel_options[border_color_h]" value="<?php echo $options['border_color_h'];?>" disabled="disabled"/>
                          </td>
                          </tr>
                          
                       </table>
					</div>
                    <div id="major-publishing-actions">
						<div id="publishing-action">
							<input type="submit" name="save" id="save" class="button button-primary" value="<?php _e( 'Save Options', 'ata_logo' ); ?>"  />
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
        
        <?php
		

}