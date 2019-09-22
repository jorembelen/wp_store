<?php 
require_once( WSLU_LOGIN_PLUGIN . '/template/admin/counter/tab-menu.php');
if($message_global == 'show'){?>
<div class="admin-page-framework-admin-notice-animation-container">
	<div 0="XS_Social_Login_Settings" id="XS_Social_Login_Settings" class="updated admin-page-framework-settings-notice-message admin-page-framework-settings-notice-container notice is-dismissible" style="margin: 1em 0px; visibility: visible; opacity: 1;">
		<p><?php echo esc_html__('Global setting data have been updated.', 'wslu-social-login');?></p>
		<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo esc_html__('Dismiss this notice.', 'wslu-social-login');?></span></button>
	</div>
</div>
<?php }?>


<div class="xs-provider-section">
	<h1 class="ekit_section-title"><?php echo esc_html__('Counter Settings', 'wslu-social-login');?></h1>
</div>

<form action="<?php echo esc_url(admin_url().'admin.php?page=wslu_counter_setting');?>" name="global_setting_submit_form" method="post" id="xs_global_form">
	<div class="social-block-wraper">
		<div class="global-section">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Hide Icon ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="enable_shoe_icon_enable" name="xs_counter[global][show_icon][enable]" value="1" <?php echo (isset($return_data['global']['show_icon']['enable']) && $return_data['global']['show_icon']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="enable_shoe_icon_enable" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Hide Label ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="enable_shoe_label_enable" name="xs_counter[global][show_label][enable]" value="1" <?php echo (isset($return_data['global']['show_label']['enable']) && $return_data['global']['show_label']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="enable_shoe_label_enable" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Hide Counter ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="enable_shoe_counter_enable" name="xs_counter[global][show_counter][enable]" value="1" <?php echo (isset($return_data['global']['show_counter']['enable']) && $return_data['global']['show_counter']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="enable_shoe_counter_enable" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					
					<tr>
						<th scope="row">
							<label for="cache_setup"><?php echo esc_html__('Cache (hours) ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="global-input-text"  type="text" id="cache_setup" name="xs_counter[global][cache]" value="<?php echo esc_html(isset($return_data['global']['cache']) ? $return_data['global']['cache'] : 12);?>" >
						</td>
					</tr>
					<!-- Save change section-->
					<tr>
						<td>
							<button type="submit" name="counter_settings_submit_form" class="xs-btn btn-special small"><?php echo esc_html__('Save');?></button>
						</td>
					</tr>
					<tr>
						<th>
							<label for=""><?php echo esc_html__('Shortcode ', 'wslu-social-login');?>
							</label>
						</th>
						<td>

							<div class="short-code-section">
								<ol class="xs_social_ol">
									<li>[xs_social_counter] </li>
									<li>[xs_social_counter provider="facebook,twitter,instagram" class="custom-class"] </li>
									<li>[xs_social_counter provider="facebook" class="custom-class" style=""]</li>
								</ol>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</form>