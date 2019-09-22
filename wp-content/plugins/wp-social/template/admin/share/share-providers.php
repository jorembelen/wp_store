<?php 
require_once( WSLU_LOGIN_PLUGIN . '/template/admin/share/tab-menu.php');
if($message_provider == 'show'){?>
<div class="admin-page-framework-admin-notice-animation-container">
	<div 0="XS_Social_Login_Settings" id="XS_Social_Login_Settings" class="updated admin-page-framework-settings-notice-message admin-page-framework-settings-notice-container notice is-dismissible" style="margin: 1em 0px; visibility: visible; opacity: 1;">
		<p><?php echo esc_html__('Providers data have been updated.', 'wslu-social-login');?></p>
		<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo esc_html__('Dismiss this notice.', 'wslu-social-login');?></span></button>
	</div>
</div>
<?php }?>



<div class="xs-provider-section">
	<h1 class="ekit_section-title"><?php echo esc_html__('Share Providers', 'wslu-social-login');?></h1>
</div>

<form action="<?php echo esc_url(admin_url().'admin.php?page=wslu_share_setting&tab=wslu_providers');?>" name="xs_provider_submit_form" method="post" id="xs_provider_form">
	<div class="xs-social-block-wraper">
		<ul class="xs-social-block">
		<?php
			foreach( $share_provider AS $k=>$v):
			$name = isset($v['label']) ? $v['label'] : '';
			
			$setLabel = (isset($share_provider[$k]['data']['label']) && strlen($share_provider[$k]['data']['label']) > 2) ? $share_provider[$k]['data']['label'] : $name;
			
		?>
		<li>
			<div class="xs-single-social-block <?php echo $k;?>">
				<div class="xs-block-header" data-type="modal-trigger" data-target="example-modal-<?php echo $k;?>">
					<span class="drag-icon"></span>
					<div class="xs-social-icon">
						<span class="met-social met-social-<?php echo $k;?>"></span>
					</div>
					<h2 class="xs-social-icon-title"><?php echo esc_html($setLabel, 'wslu-social-login');?></h2>
				</div>
				<div class="xs-block-footer">
					<div class="left-content">
						<div class="configure <?php echo isset($share_provider[$k]['enable']) ? 'enable' : 'disable';?> ">
							<span class="enable"><?php echo esc_html__('Enabled', 'wslu-social-login');?></span>
							<span class="disable"><?php echo esc_html__('Disabled', 'wslu-social-login');?></span>
						</div>
					</div>
					<div class="right-content">
						<a href="javascript:void()" class="xs-btn btn-special small" data-type="modal-trigger" data-target="example-modal-<?php echo $k;?>"> <?php if( isset($share_provider[$k]['enable']) ? $share_provider[$k]['enable'] : 0 == 1){ echo esc_html__('Settings', 'wslu-social-login');?> <?php }else{?> <?php echo esc_html__('Getting Started', 'wslu-social-login'); }?></a>
					</div>
				</div>
			</div>
		</li>
			<?php 
			endforeach;?>
	</ul>
</div>
	<?php
		foreach( $share_provider AS $kk=>$vv ):
			$classSet = 'setting';
			$name = isset($vv['label']) ? $vv['label'] : '';
			
			$setLabel = (isset($share_provider[$kk]['data']['label']) && strlen($share_provider[$kk]['data']['label']) > 2) ? $share_provider[$kk]['data']['label'] : $name;
			
			$defaultText = isset($vv['data']['text']) ? $vv['data']['text'] : 'Share';
			$belowText = (isset($share_provider[$kk]['data']['text']) && strlen($share_provider[$kk]['data']['text']) > 2) ? $share_provider[$kk]['data']['text'] : $defaultText;
			
			$belowValue = (isset($share_provider[$kk]['data']['value']) && $share_provider[$kk]['data']['value'] > 0) ? $share_provider[$kk]['data']['value'] : 0;
			if(strlen($kk) > 2){
	?>

	<div class="xs-modal-dialog" id="example-modal-<?php echo $kk;?>">
		<div class="xs-modal-content post__tab">
			<div class="xs-modal-header clear-both">
				<div class="tabHeader">
					<ul class="tab__list clear-both">
						<li class="<?php if($classSet == 'setting'){ echo 'active';}?> tab__list__item"><?php echo esc_html__('Settings', 'wslu-social-login');?></li>
					</ul>
				</div>
				<button type="button" class="xs-btn danger" data-modal-dismiss="modal"><?php echo esc_html__('X');?></button>
			</div>
			<div class="xs-modal-body">
				<div class="ekit--tab__post__details tabContent">
					<h6 class="ekit_section-title"><?php echo esc_html__( $setLabel , 'wslu-social-login');?></h6>
					
					<div class="tabItem <?php if($classSet == 'setting'){ echo 'active';}?>">
						<div class="setting-section">
							<table class="form-table" id="<?php echo $kk;?>_form_table">
								<tbody>
									<tr>
										<td>
											<h3><?php echo esc_html__('Settings ', 'wslu-social-login');?></h3>
										</td>
									</tr>
									<tr>
										<th scope="row">
											<div class="setting-label-wraper">
												<label class="setting-label" for="<?php echo $kk;?>_enable"><?php echo __('Enable', 'wslu-social-login');?> </label>
											</div>
											<input class="social_switch_button" type="checkbox" id="<?php echo $kk;?>_enable" name="xs_share[social][<?php echo $kk;?>][enable]" value="1" <?php if( isset($share_provider[$kk]['enable']) ? $share_provider[$kk]['enable'] : 0 == 1){ echo 'checked';}?> >
											<label for="<?php echo $kk;?>_enable" class="social_switch_button_label"> <?php echo __('Enable ', 'wslu-social-login')?></label>
										</th>
									</tr>
									<tr>
										<th scope="row">
											<div class="setting-label-wraper">
												<label class="setting-label" for="<?php echo $kk;?>_value"><?php echo __( 'Default '.$setLabel.' Share Count' , 'wslu-social-login');?> </label>
											</div>
											<input name="xs_share[social][<?php echo $kk;?>][data][value]" type="text" id="xs_<?php echo $kk;?>_value" value="<?php echo esc_html($belowValue);?>" class="regular-text">
										</th>
									</tr>
									<tr>
										<th scope="row">
											<div class="setting-label-wraper">
												<label class="setting-label" for="<?php echo $kk;?>_text"><?php echo __( 'Text below the number' , 'wslu-social-login');?> </label>
											</div>
											<input name="xs_share[social][<?php echo $kk;?>][data][text]" type="text" id="xs_<?php echo $kk;?>_text" value="<?php echo esc_html($belowText);?>" class="regular-text">
										</th>
									</tr>
									<tr>
										<th scope="row">
											<div class="setting-label-wraper">
												<label class="setting-label" for="<?php echo $kk;?>_label"><?php echo __( 'Label Name' , 'wslu-social-login');?> </label>
											</div>
											<input name="xs_share[social][<?php echo $kk;?>][data][label]" type="text" id="xs_<?php echo $kk;?>_label" value="<?php echo esc_html($setLabel);?>" class="regular-text">
										</th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
			<div class="xs-modal-footer">
				<button type="submit" name="share_settings_submit_form" class="xs-btn btn-special"><?php echo esc_html__('Save Changes');?></button>
			</div>
		</div>
	</div>
	<?php }
	endforeach;?>
	<div class="xs-backdrop"></div>
</form>