<?php 
require_once( WSLU_LOGIN_PLUGIN . '/template/admin/counter/tab-menu.php');
if($message_provider == 'show'){?>
<div class="admin-page-framework-admin-notice-animation-container">
	<div 0="XS_Social_Login_Settings" id="XS_Social_Login_Settings" class="updated admin-page-framework-settings-notice-message admin-page-framework-settings-notice-container notice is-dismissible" style="margin: 1em 0px; visibility: visible; opacity: 1;">
		<p><?php echo esc_html__('Providers data have been updated.', 'wslu-social-login');?></p>
		<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo esc_html__('Dismiss this notice.', 'wslu-social-login');?></span></button>
	</div>
</div>
<?php }?>


<div class="xs-provider-section">
	<h1 class="ekit_section-title"><?php echo esc_html__('Counter Providers', 'wslu-social-login');?></h1>
</div>

<form action="<?php echo esc_url(admin_url().'admin.php?page=wslu_counter_setting&tab=wslu_providers');?>" name="xs_provider_submit_form" method="post" id="xs_provider_form">
	<div class="xs-social-block-wraper">
		<ul class="xs-social-block" >
		<?php
		$m = 1;
		$counter = New \XsSocialCounter\Counter(false);
		$filed = $counter->xs_counter_providers_data();
		
		foreach( $counter_provider AS $k=>$v):
			$name = isset($v['label']) ? $v['label'] : '';
			
			if(strlen($name) > 2){
		?>
		<li >
			<div class="xs-single-social-block <?php echo $k;?>">
				<div class="xs-block-header" onclick="xs_counter_open(this);" xs-target-id="#open_counter__<?php echo $k;?>__<?php echo $m;?>">
					<div class="xs-social-icon">
						<span class="met-social met-social-<?php echo $k;?>"></span>
					</div>
					<h2 class="xs-social-icon-title"><?php echo esc_html__( $name , 'wslu-social-login');?></h2>
					
				</div>
				<div class="xs-block-footer">
					<div class="left-content">
						<div class="configure <?php echo isset($counter_provider[$k]['enable']) ? 'enable' : 'disable';?> ">
							<span class="enable"><?php echo esc_html__('Enabled', 'wslu-social-login');?></span>
							<span class="disable"><?php echo esc_html__('Disabled', 'wslu-social-login');?></span>
						</div>
					</div>
					<div class="right-content">
						<a href="javascript:void()" class="xs-btn btn-special small" onclick="xs_counter_open(this);" xs-target-id="#open_counter__<?php echo $k;?>__<?php echo $m;?>" > <?php if( isset($counter_provider[$k]['enable']) ? $counter_provider[$k]['enable'] : 0 == 1){ echo esc_html__('Settings', 'wslu-social-login');?> <?php }else{?> <?php echo esc_html__('Getting Started', 'wslu-social-login'); }?></a>
					</div>
				</div>
			</div>
		</li>
		<?php }
		$m++;
		endforeach;?>
	</ul>
</div>

<div class="xs-social-block-wraper-counter">
	<?php 
	$m = 1;
	foreach( $counter_provider AS $k=>$v):
		$name = isset($v['label']) ? $v['label'] : '';
				
		$setLabel = (isset($counter_provider[$k]['label']) && strlen($counter_provider[$k]['label']) > 2) ? $counter_provider[$k]['label'] : $name;
		
		$defaultText = isset($v['data']['text']) ? $v['data']['text'] : '';
		$belowText = (isset($counter_provider[$k]['data']['text']) && strlen($counter_provider[$k]['data']['text']) > 2) ? $counter_provider[$k]['data']['text'] : $defaultText;
		$belowValue = (isset($counter_provider[$k]['data']['value']) && $counter_provider[$k]['data']['value'] > 0) ? $counter_provider[$k]['data']['value'] : 0;
		
		$filedData = isset($filed[$k]) ? $filed[$k] : '';
		if(strlen($name) > 2){
		?>	
			<div class="xs-modal-dialog <?php echo ($getType == $k) ? 'is-open' : '';?> xs-counter-body" id="#open_counter__<?php echo $k;?>__<?php echo $m;?>">
				<div class="xs-modal-header clear-both">
					<div class="tabHeader">
						<ul class="tab__list clear-both">
							<li class="active tab__list__item"><?php echo esc_html__('Settings', 'wslu-social-login');?></li>
						</ul>
					</div>
					<button type="button" class="xs-btn danger" onclick="xs_counter_open(this);" xs-target-id="#open_counter__<?php echo $k;?>__<?php echo $m;?>"><?php echo esc_html__('X');?></button>
				</div>
				<div class="xs-modal-body">
					<h6 class="ekit_section-title"><?php echo esc_html__( $setLabel , 'wslu-social-login');?></h6>
					
					<div class="xs-counter-lavel form-table">
						<div class="setting-label-wraper">
							<label class="setting-label" for="<?php echo $k;?>_enable"><?php echo __('Enable', 'wslu-social-login');?> </label>
						</div>
						<input class="social_switch_button" type="checkbox" id="<?php echo $k;?>_enable" name="xs_counter[social][<?php echo $k;?>][enable]" value="1" <?php if( isset($counter_provider[$k]['enable']) ? $counter_provider[$k]['enable'] : 0 == 1){ echo 'checked';}?> >
						<label for="<?php echo $k;?>_enable" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
					</div>
					<?php
					
					if(is_array($filedData)){
						foreach($filedData as $fk=>$fv):
						
						$lavelFIled = isset($fv['label']) ? $fv['label'] : 'Id';
						
						$input = isset($fv['input']) ? $fv['input'] : 'text';
						$type = isset($fv['type']) ? $fv['type'] : 'normal';
						
						$setId = (isset($counter_provider[$k][$fk]) && strlen($counter_provider[$k][$fk]) > 2) ? $counter_provider[$k][$fk] : '';
						
						if($type == 'access' && $k == $getType){
							$setId = get_option('xs_counter_'.$k.'_token') ? get_option('xs_counter_'.$k.'_token') : '';
							if($getType == 'instagram'){
								$code = isset($_GET['code']) ? $_GET['code'] : '';
								if(strlen($code) > 0){
									$credentials = get_transient('xs_counter_'.$k.'_client_id') . ':' . get_transient('xs_counter_'.$k.'_client_secret');
									$toSend 	 = base64_encode($credentials);
									$cur_page =  admin_url().'admin.php?page=wslu_counter_setting&tab=wslu_providers&xs_access='.$k.'' ;
					
									$args = array(
										'method'      => 'POST',
										'httpversion' => '1.1',
										'blocking' 		=> true,
										'headers' 		=> array(
											'Authorization' => 'Basic ' . $toSend,
											'Content-Type' 	=> 'application/x-www-form-urlencoded;charset=UTF-8'
										),
										'body' 				=> array( 'grant_type' => 'authorization_code', 'code' => $code, 'client_id' => get_transient('xs_counter_'.$k.'_client_id'), 'client_secret' => get_transient('xs_counter_'.$k.'_client_secret'), 'redirect_uri' => $cur_page)
									);

									add_filter('https_ssl_verify', '__return_false');
									$response = wp_remote_post('https://api.instagram.com/oauth/access_token', $args);

									$keys = json_decode(wp_remote_retrieve_body($response));
									if(isset($keys->access_token)){
										$setId = $keys->access_token;
										
										update_option('xs_counter_'.$k.'_token', $keys->access_token);
										update_option('xs_counter_'.$k.'_app_id', get_transient('xs_counter_'.$k.'_client_id'));
										update_option('xs_counter_'.$k.'_app_secret', get_transient('xs_counter_'.$k.'_client_secret'));
									}
								}
							}else if($getType == 'linkedin'){
								
								$code = isset($_GET['code']) ? $_GET['code'] : '';
								if(strlen($code) > 0){
									$cur_page =  admin_url().'admin.php?page=wslu_counter_setting&tab=wslu_providers&xs_access='.$k.'' ;
					
									$credentials = get_transient('xs_counter_'.$k.'_api_key') . ':' . get_transient('xs_counter_'.$k.'_secret_key');
									$toSend 	 = base64_encode($credentials);
									
									$args = array(
										'method'      => 'POST',
										'httpversion' => '1.1',
										'blocking' 		=> true,
										'headers' 		=> array(
											'Authorization' => 'Basic ' . $toSend,
											'Content-Type' 	=> 'application/x-www-form-urlencoded;charset=UTF-8'
										),
										'body' 				=> array( 'grant_type' => 'authorization_code', 'code' => $code, 'client_id' => get_transient('xs_counter_'.$k.'_api_key'), 'client_secret' => get_transient('xs_counter_'.$k.'_secret_key'), 'redirect_uri' => $cur_page)
									);

									add_filter('https_ssl_verify', '__return_false');
									$response = wp_remote_post('https://www.linkedin.com/oauth/v2/accessToken', $args);

									$keys = json_decode(wp_remote_retrieve_body($response));
									
									if(isset($keys->access_token)){
										$setId = $keys->access_token;
										update_option('xs_counter_'.$k.'_token', $setId);
										update_option('xs_counter_'.$k.'_app_id', get_transient('xs_counter_'.$k.'_api_key'));
										update_option('xs_counter_'.$k.'_app_secret', get_transient('xs_counter_'.$k.'_secret_key'));
									}
								}
							}else if($getType == 'dribbble'){
								$setId = isset($_GET['code']) ? $_GET['code'] : $setId;
								
								update_option('xs_counter_'.$k.'_token', $setId);
								update_option('xs_counter_'.$k.'_app_id', get_transient('xs_counter_'.$k.'_client_id'));
								update_option('xs_counter_'.$k.'_app_secret', get_transient('xs_counter_'.$k.'_client_secret'));
					
							}
						}
						?>
							<div class="xs-counter-lavel form-table <?php echo ($type == 'access') ? 'xs-access-button-inline' : '';?>">
								<label class="setting-label" for="xs_<?php echo $k;?>_<?php echo $fk;?>"> <?php echo esc_html__( $lavelFIled , 'wslu-social-login');?></label>
								<?php if( $input == 'text' ){?>
									<input name="xs_counter[social][<?php echo $k;?>][<?php echo $fk;?>]" style="<?php echo ($type == 'access') ? 'cursor: no-drop; opacity: .4;' : '';?>" type="text" id="xs_<?php echo $k;?>_<?php echo $fk;?>" value="<?php echo esc_html($setId);?>" class="regular-text">				
									<?php
									if($type == 'access'){
										echo '<button class="xs-btn btn-special small" data-type="modal-trigger" data-target="example-modal-'.$k.'"> '.esc_html__('Get Access Token', 'wslu-social-login').'</button>';
									}
									?>
								<?php } else if($input == 'select'){
									$dataSelect = isset($fv['data']) ? $fv['data'] : '';
									
									if(is_array($dataSelect)){
									?>
									<select name="xs_counter[social][<?php echo $k;?>][<?php echo $fk;?>]" id="xs_<?php echo $k;?>_<?php echo $fk;?>">
										<?php foreach($dataSelect as $dk=>$dv):?>
											<option value="<?php echo $dk;?>" <?php echo ($setId == $dk) ? 'selected' : '';?>><?php echo $dv;?> </option>
										<?php endforeach;?>
									</select>
									<?php }?>
								<?php }?>
							</div>
						<?php	
						endforeach;
					}
					?>
					<div class="xs-counter-lavel form-table">
						<label class="setting-label" for="xs_<?php echo $k;?>_text"> <?php echo esc_html__( 'Default '.$setLabel.' '.$belowText , 'wslu-social-login');?></label>
						<input name="xs_counter[social][<?php echo $k;?>][data][value]" type="text" id="xs_<?php echo $k;?>_text" value="<?php echo esc_html($belowValue);?>" class="regular-text">				
					</div>
					<div class="xs-counter-lavel form-table">
						<label class="setting-label" for="xs_<?php echo $k;?>_text"> <?php echo esc_html__( 'Text below the number' , 'wslu-social-login');?></label>
						<input name="xs_counter[social][<?php echo $k;?>][data][text]" type="text" id="xs_<?php echo $k;?>_text" value="<?php echo esc_html($belowText);?>" class="regular-text">				
					</div>
					<div class="xs-counter-lavel form-table">
						<label class="setting-label" for="xs_<?php echo $k;?>_label"> <?php echo esc_html__( 'Label Name' , 'wslu-social-login');?></label>
						<input name="xs_counter[social][<?php echo $k;?>][label]" type="text" id="xs_<?php echo $k;?>_label" value="<?php echo esc_html($setLabel);?>" class="regular-text">				
					</div>
				
				</div>
				<div class="xs-modal-footer">
					<button type="submit" name="counter_settings_submit_form" class="xs-btn btn-special"><?php echo esc_html__('Save', 'wslu-social-login');?></button>
				</div>
			</div>
		
		<?php 
		}
		$m++;
	endforeach;
	?>
</div>

</form>
<div class="xs-counter-popup-access-box">
	<?php 

	if(is_array($filed)){
		foreach($filed as $fk=>$fv):
		$apiCheck = isset($fv['api']) ? $fv['api'] : '';
		if(is_array($apiCheck)){
			$name = isset($apiCheck['label']) ? $apiCheck['label'] : 'Key';
			$filedApi = isset($apiCheck['filed']) ? $apiCheck['filed'] : '';
			
			$popupLabel = (isset($counter_provider[$fk]['label']) && strlen($counter_provider[$fk]['label']) > 2) ? $counter_provider[$fk]['label'] : ucfirst($fk);
	?>
		<form method="post" action="<?php echo esc_url(admin_url().'admin.php?page=wslu_counter_setting&tab=wslu_providers&xs_access='.$fk.'');?>">
		<div class="xs-modal-dialog" id="example-modal-<?php echo $fk;?>">
			<div class="xs-modal-content post__tab">
				<div class="xs-modal-header clear-both">
					<div class="tabHeader"> <ul class="tab__list clear-both"> <li class="active tab__list__item"><?php echo esc_html__($popupLabel.' Access Token', 'wslu-social-login');?></li></ul></div>
					<button type="button" class="xs-btn danger" data-modal-dismiss="modal"><?php echo esc_html__('X');?></button>
				</div>
				<div class="xs-modal-body">
					<div class="ekit--tab__post__details tabContent">
						<?php 
						if(is_array($filedApi)){
							foreach($filedApi as $fkl=>$fvl){
								$valueAPp = get_option('xs_counter_'.$fk.'_'.$fkl) ? get_option('xs_counter_'.$fk.'_'.$fkl) : '';
								?>
									<div class="xs-counter-lavel form-table">
										<label class="setting-label" for="xs_<?php echo $fk;?>_<?php echo $fkl;?>"> <?php echo esc_html__( $fvl , 'wslu-social-login');?></label>
										<input type="text" name="accesskey[<?php echo $fk;?>][<?php echo $fkl;?>]" class="regular-text" id="xs_<?php echo $fk;?>_<?php echo $fkl;?>" value="<?php echo $valueAPp;?>" >
									</div>
								<?php
							}
						}
						?>
					</div>
					<?php
					if($fk == 'instagram'){
						$cur_page =  admin_url().'admin.php?page=wslu_counter_setting&tab=wslu_providers&xs_access='.$fk.'';
					?>
						<p class="document"><?php echo esc_html__('Go to APP Settings and Set Callback URL', 'wslu-social-login');?><a href="<?php echo esc_url('https://www.instagram.com/developer/clients/manage/');?>"> <?php echo esc_html__('App Settings ', 'wslu-social-login');?></a></p>
						<p class="document"><?php echo esc_html__('Add the following URL to the "Valid OAuth redirect URIs" field:', 'wslu-social-login');?> <strong><?php echo esc_url($cur_page);?></strong></p>
					<?php }
					if($fk == 'linkedin'){
						$cur_page =  admin_url().'admin.php?page=wslu_counter_setting&tab=wslu_providers&xs_access='.$fk.'';
					?>
						<p class="document"><?php echo esc_html__('Go to APP Settings and Set Callback URL', 'wslu-social-login');?><a href="<?php echo esc_url('https://www.linkedin.com/developers/');?>"> <?php echo esc_html__('App Settings ', 'wslu-social-login');?></a></p>
						<p class="document"><?php echo esc_html__('Add the following URL to the "Valid OAuth redirect URIs" field:', 'wslu-social-login');?> <strong><?php echo esc_url($cur_page);?></strong></p>
					<?php }
					if($fk == 'dribbble'){
						$cur_page =  admin_url().'admin.php?page=wslu_counter_setting&tab=wslu_providers&xs_access='.$fk.'';
					?>
						<p class="document"><?php echo esc_html__('Go to APP Settings and Set Callback URL', 'wslu-social-login');?><a href="<?php echo esc_url('https://dribbble.com/account/applications/');?>"> <?php echo esc_html__('App Settings ', 'wslu-social-login');?></a></p>
						<p class="document"><?php echo esc_html__('Add the following URL to the "Valid OAuth redirect URIs" field:', 'wslu-social-login');?> <strong><?php echo esc_url($cur_page);?></strong></p>
					<?php }?>
				</div>
				<div class="xs-modal-footer">
					<button type="submit" name="xs_provider_submit_form_access_counter" class="xs-btn btn-special"><?php echo esc_html__('Generate Key', 'wslu-social-login');?></button>
				</div>
			</div>
		</div>
		</form>
	<?php } endforeach; }?>
	<div class="xs-backdrop <?php echo strlen($getType) > 1 && isset($_GET['code']) ? 'is-open' : '';?>"></div>
</div>
