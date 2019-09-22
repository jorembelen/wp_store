<?php 
require_once( WSLU_LOGIN_PLUGIN . '/template/admin/tab-menu.php');
if($message_provider == 'show'){?>
<div class="admin-page-framework-admin-notice-animation-container">
	<div 0="XS_Social_Login_Settings" id="XS_Social_Login_Settings" class="updated admin-page-framework-settings-notice-message admin-page-framework-settings-notice-container notice is-dismissible" style="margin: 1em 0px; visibility: visible; opacity: 1;">
		<p><?php echo esc_html__('Providers data have been updated.', 'wslu-social-login');?></p>
		<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo esc_html__('Dismiss this notice.', 'wslu-social-login');?></span></button>
	</div>
</div>
<?php }?>



<div class="xs-provider-section">
	<h1 class="ekit_section-title"><?php echo esc_html__('Login Providers', 'wslu-social-login');?></h1>
</div>

<form action="<?php echo esc_url(admin_url().'admin.php?page=wslu_global_setting&tab=wslu_providers');?>" name="xs_provider_submit_form" method="post" id="xs_provider_form">
	<div class="xs-social-block-wraper">
		<ul class="xs-social-block">
		<?php
			foreach(xs_services_provider() AS $keyType=>$valueType):
		?>
		<li>
			<div class="xs-single-social-block <?php echo $keyType;?>">
				<div class="xs-block-header" data-type="modal-trigger" data-target="example-modal-<?php echo $keyType;?>">
					<span class="drag-icon"></span>
					<div class="xs-social-icon">
						<span class="met-social met-social-<?php echo $keyType;?>"></span>
					</div>
					<h2 class="xs-social-icon-title"><?php echo esc_html($valueType, 'wslu-social-login');?></h2>
				</div>
				<div class="xs-block-footer">
					<div class="left-content">
						<div class="configure <?php echo isset($return_data[$keyType]['enable']) ? 'enable' : 'disable';?>">
							<span class="enable"><?php echo esc_html__('Enabled', 'wslu-social-login');?></span>
							<span class="disable"><?php echo esc_html__('Disabled', 'wslu-social-login');?></span>
						</div>
					</div>
					<div class="right-content">
						<a href="javascript:void()" class="xs-btn btn-special small" data-type="modal-trigger" data-target="example-modal-<?php echo $keyType;?>"> <?php if( isset($return_data[$keyType]['enable']) ? $return_data[$keyType]['enable'] : 0 == 1){ echo esc_html__('Settings', 'wslu-social-login');?> <?php }else{?> <?php echo esc_html__('Getting Started', 'wslu-social-login'); }?></a>
					</div>
				</div>
			</div>
		</li>
		<?php endforeach;?>
	</ul>
</div>
	<?php
		foreach(xs_services_provider() AS $keyTypeAll=>$valueTypeAll):
			$classSet = 'getting';
			if( isset($return_data[$keyTypeAll]['enable']) ? $return_data[$keyTypeAll]['enable'] : 0 == 1){
				$classSet = 'setting';
			}
	?>

	<div class="xs-modal-dialog" id="example-modal-<?php echo $keyTypeAll;?>">
		<div class="xs-modal-content post__tab">
			<div class="xs-modal-header clear-both">
				<div class="tabHeader">
					<ul class="tab__list clear-both">
						<li class="<?php if($classSet == 'getting'){ echo 'active';}?> tab__list__item"><?php echo esc_html__('Getting Started', 'wslu-social-login');?></li>
						<li class="<?php if($classSet == 'setting'){ echo 'active';}?> tab__list__item"><?php echo esc_html__('Settings', 'wslu-social-login');?></li>
						<li class="tab__list__item"><?php echo esc_html__('Buttons', 'wslu-social-login');?></li>
						<li class="tab__list__item "><?php echo esc_html__('Usage', 'wslu-social-login');?></li>
					</ul>
				</div>
				<button type="button" class="xs-btn danger" data-modal-dismiss="modal"><?php echo esc_html__('X');?></button>
			</div>
			<div class="xs-modal-body">
				<div class="ekit--tab__post__details tabContent">
					<h6 class="ekit_section-title"><?php echo esc_html__($valueTypeAll, 'wslu-social-login');?></h6>
					<div class="tabItem <?php if($classSet == 'getting'){ echo 'active';}?>">
						<div class="getting-section">
							<?php
								$gettingText = '';
								switch($keyTypeAll):
									case 'facebook':
										$gettingText = 'To allow your visitors to log in with their Facebook account, first you must create a Facebook App. The following guide will help you through the Facebook App creation process. After you have created your Facebook App, head over to "Settings" and configure the given "App ID" and "App secret" according to your Facebook App.';
										break;
									case 'linkedin':
										$gettingText = 'To connect your Auth0 app to LinkedIn, you will need to generate a Client ID and Client Secret in a LinkedIn app, copy these keys into your Auth0 settings, and enable the connection';
										break;
									case 'twitter':
										$gettingText = 'To allow your visitors to log in with their Twitter account, first you must create a Twitter App. The following guide will help you through the Twitter App creation process. After you have created your Twitter App, head over to "Settings" and configure the given "Consumer Key" and "Consumer Secret" according to your Twitter App.';
										break;
									case 'dribbble':
										$gettingText = 'To allow your visitors to log in with their Dribbble account, first you must create a Dribbble App. The following guide will help you through the Dribbble App creation process. After you have created your Dribbble App, head over to "Settings" and configure the given "App ID" and "App secret" according to your Dribbble App.';
										break;
									case 'github':
										$gettingText = 'To allow your visitors to log in with their GitHub account, first you must create a GitHub App. The following guide will help you through the GitHub App creation process. After you have created your GitHub App, head over to "Settings" and configure the given "App ID" and "App secret" according to your GitHub App.';
										break;
									case 'wordpress':
										$gettingText = 'To allow your visitors to log in with their WordPress account, first you must create a WordPress App. The following guide will help you through the WordPress App creation process. After you have created your WordPress App, head over to "Settings" and configure the given "App ID" and "App secret" according to your WordPress App.';
										break;
									case 'vkontakte':
										$gettingText = 'To allow your visitors to log in with their Vkontakte account, first you must create a Vkontakte App. The following guide will help you through the Vkontakte App creation process. After you have created your Vkontakte App, head over to "Settings" and configure the given "App ID" and "App secret" according to your Vkontakte App.';
										break;
									case 'reddit':
										$gettingText = 'To allow your visitors to log in with their Reddit account, first you must create a Reddit App. The following guide will help you through the Reddit App creation process. After you have created your Reddit App, head over to "Settings" and configure the given "App ID" and "App secret" according to your Reddit App.';
										break;
								endswitch;
							?>
							<table class="form-table">
								<tbody>
									<tr>
										<td colspan="2">
											<h3><?php echo esc_html__('Getting Started ', 'wslu-social-login');?></h3>
											<p><?php echo esc_html__($gettingText, 'wslu-social-login');?> </p>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<h3><?php echo esc_html__('Create '.$valueTypeAll.' App', 'wslu-social-login');?></h3>
											<p>
											<ol class="xs_social_ol">
												<?php if($keyTypeAll == 'facebook'){?>
													<li> <?php echo __('Go to <a href="'.esc_url('https://developers.facebook.com/apps/').'" target="_blank">https://developers.facebook.com/apps/</a>');?> </li>
												<?php }else if($keyTypeAll == 'linkedin'){?>
													<li><?php echo __('Go to <a href="'.esc_url('http://developer.linkedin.com/').'" target="_blank">http://developer.linkedin.com/</a>');?>  </li>
												<?php }else if($keyTypeAll == 'dribbble'){?>
													<li><?php echo __('Go to <a href="'.esc_url('https://developer.dribbble.com/v1/oauth/').'" target="_blank">https://developer.dribbble.com/v1/oauth/</a>');?>  </li>
												<?php }else if($keyTypeAll == 'twitter'){?>
													<li><?php echo __('Go to <a href="'.esc_url('https://developer.twitter.com/en/apps/create').'" target="_blank">https://developer.twitter.com/en/apps/create</a>');?>  </li>
												<?php }else if($keyTypeAll == 'google'){?>
													<li><?php echo __('Go to <a href="'.esc_url('https://console.developers.google.com/apis/').'" target="_blank">https://console.developers.google.com/apis/</a>');?>  </li>
												<?php }?>
												<li> <?php echo esc_html__('Log in with your '.$valueTypeAll.' ( if you are not logged in )', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('Click on "Add New App" button ', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('Fill "Display Name" and "Your Email"', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('Click on "Create App ID" button', 'wslu-social-login');?>
												</li>

												<li> <?php echo esc_html__('Enter your domain name to the App for Domains', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('Fill up the "Privacy Policy URL". ', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('Click on "Save Changes"', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('Click on "'.$valueTypeAll.' Login" and select Settings"', 'wslu-social-login');?>
												</li>

												<li>
													<?php echo esc_html__('Add the following URL to the "Valid OAuth redirect URIs" field: ', 'wslu-social-login');
													echo __(' <strong>'. esc_url(get_site_url().'/wp-json/wslu-social-login/type/'.$keyTypeAll).'</strong>');
													?>
												</li>
												<li> <?php echo esc_html__('Click on "Save Changes"', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('In the top of the left sidebar, click on "Settings" and select "Basic"', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('Here you can see your "APP ID" and you can see your "App secret" if you click on the "Show" button. These will be needed in plugin\'s settings.', 'wslu-social-login');?>
												</li>
												<li> <?php echo esc_html__('By clicking "Confirm", the Status of your App will go Live.', 'wslu-social-login');?>
												</li>
											</ol>

										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
					<div class="tabItem <?php if($classSet == 'setting'){ echo 'active';}?>">
						<div class="setting-section">
							<table class="form-table" id="<?php echo $keyTypeAll;?>_form_table">
								<tbody>
									<tr>
										<td>
											<h3><?php echo esc_html__('Settings ', 'wslu-social-login');?></h3>
										</td>
									</tr>
									<tr>
										<th scope="row">
										<div class="setting-label-wraper">
											<label class="setting-label" for="<?php echo $keyTypeAll;?>_enable"><?php echo __('Enable', 'wslu-social-login');?> </label>
										</div>
										<input class="social_switch_button" type="checkbox" id="<?php echo $keyTypeAll;?>_enable" name="xs_social[<?php echo $keyTypeAll;?>][enable]" value="1" <?php if( isset($return_data[$keyTypeAll]['enable']) ? $return_data[$keyTypeAll]['enable'] : 0 == 1){ echo 'checked';}?> >
										<label for="<?php echo $keyTypeAll;?>_enable" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
										</th>
									</tr>
									<tr>
										<th scope="row">
										<div class="setting-label-wraper">
											<label class="setting-label" for="<?php echo $keyTypeAll;?>_appid"><?php echo __('App ID - <em>(Required)</em>', 'wslu-social-login');?> </label>
										</div>
										<input placeholder="741888455955744" name="xs_social[<?php echo $keyTypeAll;?>][id]" type="text" id="<?php echo $keyTypeAll;?>_appid" value="<?php echo esc_html(isset($return_data[$keyTypeAll]['id']) ? $return_data[$keyTypeAll]['id'] : '');?>" class="regular-text">
										</th>
									</tr>
									<tr>
										<th scope="row">
										<div class="setting-label-wraper">
											<label class="setting-label" for="<?php echo $keyTypeAll;?>_secret"><?php echo __('App Secret - <em>(Required)</em>', 'wslu-social-login');?></label>
										</div>
										<input placeholder="32fd74bcaacf588c4572946f201eee8e" name="xs_social[<?php echo $keyTypeAll;?>][secret]" type="text" id="<?php echo $keyTypeAll;?>_secret" value="<?php echo esc_html(isset($return_data[$keyTypeAll]['secret']) ? $return_data[$keyTypeAll]['secret'] : '');?>" class="regular-text"></th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tabItem">
						<div class="button-section">
							<table class="form-table">
								<tbody>
									<tr>
										<td>
											<h3><?php echo esc_html__('Buttons ', 'wslu-social-login');?></h3>
										</td>
									</tr>
									<tr>
										<th scope="row">
										<div class="setting-label-wraper">
											<label class="setting-label"  for="<?php echo $keyTypeAll;?>_login_label"><?php echo esc_html__('Login Label Text ', 'wslu-social-login');?> </label>
										</div>
										<input placeholder="Login with <?php echo $valueTypeAll; ?>" name="xs_social[<?php echo $keyTypeAll;?>][login_label]" type="text" id="<?php echo $keyTypeAll;?>_login_label" value="<?php echo esc_html(isset($return_data[$keyTypeAll]['login_label']) ? $return_data[$keyTypeAll]['login_label'] : 'Login with '.$valueTypeAll.'');?>" class="regular-text">
										</th>
									</tr>
									<tr>
										<th scope="row">
										<div class="setting-label-wraper">
											<label class="setting-label" for="<?php echo $keyTypeAll;?>_logout_label"><?php echo esc_html__('Logout Label Text ', 'wslu-social-login');?> </label>
										</div>
										<input placeholder="Logout with <?php echo $valueTypeAll; ?>" name="xs_social[<?php echo $keyTypeAll;?>][logout_label]" type="text" id="<?php echo $keyTypeAll;?>_logout_label" value="<?php echo esc_html(isset($return_data[$keyTypeAll]['logout_label']) ? $return_data[$keyTypeAll]['logout_label'] : 'Logout from '.$valueTypeAll.'');?>" class="regular-text">
										</th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tabItem">
						<h3><?php echo esc_html__('Usage ', 'wslu-social-login');?></h3>
						<?php _e('<strong>Shortcode</strong>');?>
						<div class="short-code-section">
							<ol class="xs_social_ol">
								<li>[xs_social_login provider="<?php echo esc_html($keyTypeAll);?>" class="custom-class"]</li>
								<li>[xs_social_login provider="<?php echo esc_html($keyTypeAll);?>" class="custom-class" btn-text="Button Text for <?php echo esc_html($valueTypeAll);?>"]</li>
								<li>[xs_social_login provider="<?php echo esc_html($keyTypeAll);?>"]Button Text for <?php echo esc_html($valueTypeAll);?>[/xs_social_login]</li>
							</ol>
						</div>
						<?php _e('<strong>Simple Link</strong>');?>
						<div class="short-code-section">
							<?php echo esc_html('<a href="'.esc_url(get_site_url().'/wp-json/wslu-social-login/type/'.$keyTypeAll).'"> Login with '.esc_html($valueTypeAll).' </a>');?>

						</div>
					</div>
				</div>
			</div>
			<div class="xs-modal-footer">
				<button type="submit" name="xs_provider_submit_form" class="xs-btn btn-special"><?php echo esc_html__('Save Changes');?></button>
			</div>
		</div>
	</div>
	<?php endforeach;?>
	<div class="xs-backdrop"></div>
</form>