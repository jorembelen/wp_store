<?php 
require_once( WSLU_LOGIN_PLUGIN . '/template/admin/tab-menu.php');
if($message_global == 'show'){?>
<div class="admin-page-framework-admin-notice-animation-container">
	<div 0="XS_Social_Login_Settings" id="XS_Social_Login_Settings" class="updated admin-page-framework-settings-notice-message admin-page-framework-settings-notice-container notice is-dismissible" style="margin: 1em 0px; visibility: visible; opacity: 1;">
		<p><?php echo esc_html__('Global setting data have been updated.', 'wslu-social-login');?></p>
		<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo esc_html__('Dismiss this notice.', 'wslu-social-login');?></span></button>
	</div>
</div>
<?php }?>


<div class="xs-provider-section">
	<h1 class="ekit_section-title"><?php echo esc_html__('Global Settings', 'wslu-social-login');?></h1>
</div>

<form action="<?php echo esc_url(admin_url().'admin.php?page=wslu_global_setting');?>" name="global_setting_submit_form" method="post" id="xs_global_form">
	<div class="social-block-wraper">
		<div class="global-section">
			<table class="form-table">
				<tbody>
					<!-- Redirect custom URL-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Custom login redirect ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="custom_login_url_enable" name="xs_global[custom_login_url][enable]" value="1" <?php echo (isset($return_data['custom_login_url']['enable']) && $return_data['custom_login_url']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="custom_login_url_enable" onclick="<?php echo esc_js( 'xs_show_hide(1);' ); ?>" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__1" class="deactive_tr  <?php echo isset($return_data['custom_login_url']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">
							<label for="custom_login_url_data"><?php echo'';?>
							</label>
						</th>
						<td>
							<input class="global-input-text"  type="text" id="custom_login_url_data" name="xs_global[custom_login_url][data]" value="<?php echo esc_html(isset($return_data['custom_login_url']['data']) ? $return_data['custom_login_url']['data'] : '');?>" >
						</td>
					</tr>

					<!-- Wp login Page-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Show button to wp-login page ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="wp_login_page_enable" name="xs_global[wp_login_page][enable]" value="1" <?php echo (isset($return_data['wp_login_page']['enable']) && $return_data['wp_login_page']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="wp_login_page_enable" onclick="<?php echo esc_js( 'xs_show_hide(2);' ); ?>"  class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__2" class="deactive_tr  <?php echo isset($return_data['wp_login_page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">

						</th>
						<td>
							<label class="xs_label_wp_login" for="wp_login_page_data__login_form">
								<input type="radio" id="wp_login_page_data__login_form" name="xs_global[wp_login_page][data]" value="login_form" <?php echo (isset($return_data['wp_login_page']['data']) && $return_data['wp_login_page']['data'] == 'login_form') ? 'checked' : 'checked'; ?>>
								<?php echo esc_html__('wp login form middle ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wp_login_page_data__login_head">
								<input type="radio" id="wp_login_page_data__login_head" name="xs_global[wp_login_page][data]" value="login_head" <?php echo (isset($return_data['wp_login_page']['data']) && $return_data['wp_login_page']['data'] == 'login_head') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wp login form head', 'wslu-social-login')?>
							</label>
							<br/>

							<label class="xs_label_wp_login" for="wp_login_page_data__login_footer">
								<input type="radio" id="wp_login_page_data__login_footer" name="xs_global[wp_login_page][data]" value="login_footer" <?php echo (isset($return_data['wp_login_page']['data']) && $return_data['wp_login_page']['data'] == 'login_footer') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wp login footer ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wp_login_page_data__login_message">
								<input type="radio" id="wp_login_page_data__login_message" name="xs_global[wp_login_page][data]" value="login_message" <?php echo (isset($return_data['wp_login_page']['data']) && $return_data['wp_login_page']['data'] == 'login_message') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wp login message section ', 'wslu-social-login')?>
							</label>
						</td>
					</tr>

					<!-- Wp register Page-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Show button to wp-register page ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="wp_register_page_enable" name="xs_global[wp_register_page][enable]" value="1" <?php echo (isset($return_data['wp_register_page']['enable']) && $return_data['wp_register_page']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="wp_register_page_enable" onclick="<?php echo esc_js( 'xs_show_hide(3);' ); ?>"  class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__3" class="deactive_tr  <?php echo isset($return_data['wp_register_page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">

						</th>
						<td>
							<label class="xs_label_wp_login" for="wp_register_page_data__register_form">
								<input type="radio" id="wp_register_page_data__register_form" name="xs_global[wp_register_page][data]" value="register_form" <?php echo (isset($return_data['wp_register_page']['data']) && $return_data['wp_register_page']['data'] == 'register_form') ? 'checked' : 'checked'; ?>>
								<?php echo esc_html__('wp register form middle ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wp_register_page_data__register_head">
								<input type="radio" id="wp_register_page_data__register_head" name="xs_global[wp_register_page][data]" value="register_head" <?php echo (isset($return_data['wp_register_page']['data']) && $return_data['wp_register_page']['data'] == 'register_head') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wp register form head ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wp_register_page_data__register_footer">
								<input type="radio" id="wp_register_page_data__register_footer" name="xs_global[wp_register_page][data]" value="register_footer" <?php echo (isset($return_data['wp_register_page']['data']) && $return_data['wp_register_page']['data'] == 'register_footer') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wp register footer ', 'wslu-social-login')?>
							</label>
							<br/>
						</td>
					</tr>
					<!-- fundrasing -->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Show button to wfp-fundrasing login page ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="wfp_register_page_data_enable" name="xs_global[wfp_fund_login_page][enable]" value="1" <?php echo (isset($return_data['wfp_fund_login_page']['enable']) && $return_data['wfp_fund_login_page']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="wfp_register_page_data_enable" onclick="<?php echo esc_js( 'xs_show_hide(33);' ); ?>"  class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__33" class="deactive_tr  <?php echo isset($return_data['wfp_fund_login_page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">

						</th>
						<td>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_form_outer_before">
								<input type="radio" id="wfp_register_page_data__wfp_form_outer_before" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_before_outer" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_before_outer') ? 'checked' : 'checked'; ?>>
								<?php echo esc_html__('wfp login form outer before ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_form_outer_after">
								<input type="radio" id="wfp_register_page_data__wfp_form_outer_after" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_after_outer" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_after_outer') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wfp login form outer after ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_form_inner_before">
								<input type="radio" id="wfp_register_page_data__wfp_form_inner_before" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_before_inner" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_before_inner') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wfp login form inner before ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_form_inner_after">
								<input type="radio" id="wfp_register_page_data__wfp_form_inner_after" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_after_inner" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_after_inner') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wfp login form inner after ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_login_form_start">
								<input type="radio" id="wfp_register_page_data__wfp_login_form_start" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_start" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_start') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wfp login form start ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_login_form_end">
								<input type="radio" id="wfp_register_page_data__wfp_login_form_end" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_end" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_end') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wfp login form end ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_login_form_button_before">
								<input type="radio" id="wfp_register_page_data__wfp_login_form_button_before" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_button_before" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_button_before') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wfp login form button before ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_login_form_button_after">
								<input type="radio" id="wfp_register_page_data__wfp_login_form_button_after" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_button_after" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_button_after') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wfp login form button after ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wfp_register_page_data__wfp_login_form_message">
								<input type="radio" id="wfp_register_page_data__wfp_login_form_message" name="xs_global[wfp_fund_login_page][data]" value="wfp_login_form_message" <?php echo (isset($return_data['wfp_fund_login_page']['data']) && $return_data['wfp_fund_login_page']['data'] == 'wfp_login_form_message') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wfp login form message ', 'wslu-social-login')?>
							</label>
							<br/>
						</td>
					</tr>

					<!-- Wp comment Page-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Show button in wp-comment page ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="wp_comment_page_enable" name="xs_global[wp_comment_page][enable]" value="1" <?php echo (isset($return_data['wp_comment_page']['enable']) && $return_data['wp_comment_page']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="wp_comment_page_enable" onclick="<?php echo esc_js( 'xs_show_hide(4);' ); ?>" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__4" class="deactive_tr  <?php echo isset($return_data['wp_comment_page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">

						</th>
						<td>
							<label class="xs_label_wp_login" for="wp_comment_page_data__comment_form_top">
								<input type="radio" id="wp_comment_page_data__comment_form_top" name="xs_global[wp_comment_page][data]" value="comment_form_top" <?php echo (isset($return_data['wp_comment_page']['data']) && $return_data['wp_comment_page']['data'] == 'comment_form_top') ? 'checked' : 'checked'; ?>>
								<?php echo esc_html__('wp comment form top ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="wp_comment_page_data__comment_form_must_log_in_after">
								<input type="radio" id="wp_comment_page_data__comment_form_must_log_in_after" name="xs_global[wp_comment_page][data]" value="comment_form_must_log_in_after" <?php echo (isset($return_data['wp_comment_page']['data']) && $return_data['wp_comment_page']['data'] == 'comment_form_must_log_in_after') ? 'checked' : ''; ?>>
								<?php echo esc_html__('wp comment form after login', 'wslu-social-login')?>
							</label>
							<br/>

						</td>
					</tr>

					<!-- woocommerce login Page-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Show button to woocommerce login page ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="woocommerce_login_page_enable" name="xs_global[woocommerce_login_page][enable]" value="1" <?php echo (isset($return_data['woocommerce_login_page']['enable']) && $return_data['woocommerce_login_page']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="woocommerce_login_page_enable" onclick="<?php echo esc_js( 'xs_show_hide(5);' ); ?>" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__5" class="deactive_tr  <?php echo isset($return_data['woocommerce_login_page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">

						</th>
						<td>
							<label class="xs_label_wp_login" for="woocommerce_login_page_data__login_form_start">
								<input type="radio" id="woocommerce_login_page_data__login_form_start" name="xs_global[woocommerce_login_page][data]" value="woocommerce_login_form_start" <?php echo (isset($return_data['woocommerce_login_page']['data']) && $return_data['woocommerce_login_page']['data'] == 'woocommerce_login_form_start') ? 'checked' : 'checked'; ?>>
								<?php echo esc_html__('woocommerce login form start ', 'wslu-social-login')?>
							</label>
							<br/>

							<label class="xs_label_wp_login" for="woocommerce_login_page_data__login_form">
								<input type="radio" id="woocommerce_login_page_data__login_form" name="xs_global[woocommerce_login_page][data]" value="woocommerce_login_form" <?php echo (isset($return_data['woocommerce_login_page']['data']) && $return_data['woocommerce_login_page']['data'] == 'woocommerce_login_form') ? 'checked' : ''; ?>>
								<?php echo esc_html__('woocommerce login form middle ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="woocommerce_login_page_data__login_form_end">
								<input type="radio" id="woocommerce_login_page_data__login_form_end" name="xs_global[woocommerce_login_page][data]" value="woocommerce_login_form_end" <?php echo (isset($return_data['woocommerce_login_page']['data']) && $return_data['woocommerce_login_page']['data'] == 'woocommerce_login_form_end') ? 'checked' : ''; ?>>
								<?php echo esc_html__('woocommerce login form end ', 'wslu-social-login')?>
							</label>
							<br/>

						</td>
					</tr>


					<!-- woocommerce register Page-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Show button to woocommerce register page ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="woocommerce_register_page_enable" name="xs_global[woocommerce_register_page][enable]" value="1" <?php echo (isset($return_data['woocommerce_register_page']['enable']) && $return_data['woocommerce_register_page']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="woocommerce_register_page_enable" onclick="<?php echo esc_js( 'xs_show_hide(6);' ); ?>" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__6" class="deactive_tr  <?php echo isset($return_data['woocommerce_register_page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">

						</th>
						<td>
							<label class="xs_label_wp_login" for="woocommerce_register_page_data__register_form_start">
								<input type="radio" id="woocommerce_register_page_data__register_form_start" name="xs_global[woocommerce_register_page][data]" value="woocommerce_register_form_start" <?php echo (isset($return_data['woocommerce_register_page']['data']) && $return_data['woocommerce_register_page']['data'] == 'woocommerce_register_form_start') ? 'checked' : 'checked'; ?>>
								<?php echo esc_html__('woocommerce registration form start ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="woocommerce_register_page_data__register_form">
								<input type="radio" id="woocommerce_register_page_data__register_form" name="xs_global[woocommerce_register_page][data]" value="woocommerce_register_form" <?php echo (isset($return_data['woocommerce_register_page']['data']) && $return_data['woocommerce_register_page']['data'] == 'woocommerce_register_form') ? 'checked' : ''; ?>>
								<?php echo esc_html__('woocommerce registration form middle ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="woocommerce_register_page_data__register_form_end">
								<input type="radio" id="woocommerce_register_page_data__register_form_end" name="xs_global[woocommerce_register_page][data]" value="woocommerce_register_form_end" <?php echo (isset($return_data['woocommerce_register_page']['data']) && $return_data['woocommerce_register_page']['data'] == 'woocommerce_register_form_end') ? 'checked' : ''; ?>>
								<?php echo esc_html__('woocommerce registration form end ', 'wslu-social-login')?>
							</label>
							<br/>

						</td>
					</tr>

					<!-- woocommerce billing Page-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Show button to woocommerce billing page ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="woocommerce_billing_page_enable" name="xs_global[woocommerce_billing_page][enable]" value="1" <?php echo (isset($return_data['woocommerce_billing_page']['enable']) && $return_data['woocommerce_billing_page']['enable'] == 1) ? 'checked' : ''; ?> >
							<label for="woocommerce_billing_page_enable" onclick="<?php echo esc_js( 'xs_show_hide(7);' ); ?>" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__7" class="deactive_tr  <?php echo isset($return_data['woocommerce_billing_page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">

						</th>
						<td>
							<label class="xs_label_wp_login" for="woocommerce_register_page_data__before_checkout_billing_form">
								<input type="radio" id="woocommerce_register_page_data__before_checkout_billing_form" name="xs_global[woocommerce_billing_page][data]" value="woocommerce_before_checkout_billing_form" <?php echo (isset($return_data['woocommerce_billing_page']['data']) && $return_data['woocommerce_billing_page']['data'] == 'woocommerce_before_checkout_billing_form') ? 'checked' : 'checked'; ?>>
								<?php echo esc_html__('woocommerce before checkout billing form ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="woocommerce_register_page_data__after_checkout_billing_form">
								<input type="radio" id="woocommerce_register_page_data__after_checkout_billing_form" name="xs_global[woocommerce_billing_page][data]" value="woocommerce_after_checkout_billing_form" <?php echo (isset($return_data['woocommerce_billing_page']['data']) && $return_data['woocommerce_billing_page']['data'] == 'woocommerce_after_checkout_billing_form') ? 'checked' : ''; ?>>
								<?php echo esc_html__('woocommerce after checkout billing form ', 'wslu-social-login')?>
							</label>
							<br/>

						</td>
					</tr>

					<!-- BuddyPress Page-->
					<tr>
						<th scope="row">
							<label for=""><?php echo esc_html__('Show button to BuddyPress ', 'wslu-social-login');?>
							</label>
						</th>
						<td>
							<input class="social_switch_button" type="checkbox" id="buddypress_billing_page_enable" name="xs_global[buddypress_page][enable]" value="1" <?php echo (isset($return_data['buddypress_page']['enable']) && $return_data['buddypress_page']['enable'] == 1) ? 'checked' : ''; ?>  >
							<label for="buddypress_billing_page_enable" onclick="<?php echo esc_js( 'xs_show_hide(8);' ); ?>" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
						</td>
					</tr>
					<tr id="xs_data_tr__8" class="deactive_tr  <?php echo isset($return_data['buddypress_page']['enable']) ? 'active_tr' : '';?>">
						<th scope="row">

						</th>
						<td>
							<label class="xs_label_wp_login" for="buddypress_page_data__bp_before_register_page">
								<input type="radio" id="buddypress_page_data__bp_before_register_page" name="xs_global[buddypress_page][data]" value="bp_before_register_page" <?php echo (isset($return_data['buddypress_page']['data']) && $return_data['buddypress_page']['data'] == 'bp_before_register_page') ? 'checked' : 'checked'; ?>>
								<?php echo __('BuddyPress before register form ', 'wslu-social-login')?>
							</label>
							<br/>
							<label class="xs_label_wp_login" for="buddypress_page_data__bp_before_account_details_fields">
								<input type="radio" id="buddypress_page_data__bp_before_account_details_fields" name="xs_global[buddypress_page][data]" value="bp_before_account_details_fields" <?php echo (isset($return_data['buddypress_page']['data']) && $return_data['buddypress_page']['data'] == 'bp_before_account_details_fields') ? 'checked' : ''; ?>>
								<?php echo __('BuddyPress account details fileds ', 'wslu-social-login')?>
							</label>
							<br/>

							<label class="xs_label_wp_login" for="buddypress_page_data__bp_after_register_page">
								<input type="radio" id="buddypress_page_data__bp_after_register_page" name="xs_global[buddypress_page][data]" value="bp_after_register_page" <?php echo (isset($return_data['buddypress_page']['data']) && $return_data['buddypress_page']['data'] == 'bp_after_register_page') ? 'checked' : ''; ?>>
								<?php echo __('BuddyPress after register form ', 'wslu-social-login')?>
							</label>
							<br/>

						</td>
					</tr>

					


					<!-- Save change section-->
					<tr>
						<th >
						</th>
						<td>
							<button type="submit" name="global_setting_submit_form" class="xs-btn btn-special small"><?php echo esc_html__('Save');?></button>
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
									<li>[xs_social_login] </li>
									<li>[xs_social_login provider="facebook,twitter,github" class="custom-class"] </li>
									<li>[xs_social_login provider="facebook" class="custom-class" btn-text="Button Text"]</li>
								</ol>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</form>