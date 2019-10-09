<?php
// ADMIN AREA CUSTOMISING
// ----------------------------------------
// Customise parts of the admin area with a place/area field, a user job title and a background image that uploads to the admin page
add_action( 'admin_enqueue_scripts', 'enqueue_admin' );
function enqueue_admin() {

wp_enqueue_style('thickbox');
wp_enqueue_script('thickbox');
wp_enqueue_script('media-upload');
}
add_action( 'show_user_profile', 'add_extra_address_place' );
add_action( 'edit_user_profile', 'add_extra_address_place' );
function add_extra_address_place( $user )  {
?>
<h3>Your Job Title</h3>
	<table class="form-table">
		<tr>
			<th>
				<label for="job_title">What is your job title?</label>
			</th>
			<td>
				<input type="text" name="job_title" value="<?php echo esc_attr(get_the_author_meta( 'job_title', $user->ID )); ?>" class="regular-text" />
				<p class="description">This will appear with your user information</p>
			</td>
		</tr>
	</table>

	<h3>Your City/Town/Area</h3>
	<table class="form-table">
		<tr>
			<th>
				<label for="area_profile">Where are you based?</label>
			</th>
			<td>
				<input type="text" name="area_profile" value="<?php echo esc_attr(get_the_author_meta( 'area_profile', $user->ID )); ?>" class="regular-text" />
				<p class="description">This will appear in under the biographical information</p>
			</td>
		</tr>
	</table>
	<?php
}
add_action( 'personal_options_update', 'save_extra_address_place' );
add_action( 'edit_user_profile_update', 'save_extra_address_place' );
function save_extra_address_place( $user_id ) {
if ( !current_user_can( 'edit_user', $user_id ) )
return false;
update_user_meta( $user_id,'area_profile', sanitize_text_field( $_POST['area_profile'] ) );
update_user_meta( $user_id,'job_title', sanitize_text_field( $_POST['job_title'] ) );
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
/* Adding Image Upload Fields */
add_action( 'show_user_profile', 'add_profile_background_image' );
add_action( 'edit_user_profile', 'add_profile_background_image' );
function add_profile_background_image( $user ) {  ?>
		<h3>Add Background Image (Author Header)</h3>
		<table class="form-table">
			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="image">Author Background Image</label>
				</th>
				<td>
					<img src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" width="300" height="auto" />
					<br />
					<input type="text" name="image" id="image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" />
					<p class="description">Please upload an image for the author header background.</p>
				</td>
			</tr>
		</table>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				var fileInput = '';
				jQuery('#image').live('click',
					function() {
						fileInput = jQuery('#image');
						tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
						return false;
					});
				window.original_send_to_editor = window.send_to_editor;
				window.send_to_editor = function(html) {
					if (fileInput) {
						fileurl = jQuery('img', html).attr('src');
						if (!fileurl) {
							fileurl = jQuery(html).attr('src');
						}
						jQuery(fileInput).val(fileurl);
						tb_remove();
					} else {
						window.original_send_to_editor(html);
					}
				};
			});

		</script>
		<?php }
add_action( 'personal_options_update', 'save_profile_background_image' );
add_action( 'edit_user_profile_update', 'save_profile_background_image' );
function save_profile_background_image( $user_id ) {
if ( !current_user_can( 'edit_user', $user_id ) ) {
return false;
}
update_user_meta( $user_id, 'image', $_POST[ 'image' ] );
}
