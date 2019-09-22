<?php 
require_once( WSLU_LOGIN_PLUGIN . '/template/admin/share/tab-menu.php');
if($message_provider == 'show'){?>
<div class="admin-page-framework-admin-notice-animation-container">
	<div 0="XS_Social_Login_Settings" id="XS_Social_Login_Settings" class="updated admin-page-framework-settings-notice-message admin-page-framework-settings-notice-container notice is-dismissible" style="margin: 1em 0px; visibility: visible; opacity: 1;">
		<p><?php echo esc_html__('Styles data have been updated.', 'wslu-social-login');?></p>
		<button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo esc_html__('Dismiss this notice.', 'wslu-social-login');?></span></button>
	</div>
</div>
<?php }?>

<div class="xs-style-section">
	<h1 class="ekit_section-title"><?php echo esc_html__('Style Settings', 'wslu-social-login');?></h1>
</div>

<form action="<?php echo esc_url(admin_url().'admin.php?page=wslu_share_setting&tab=wslu_style_setting');?>" name="xs_style_submit_form" method="post" id="xs_style_form">
	<div class="xs-social-block-wraper">
        <div class="xs-global-section">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row" style="vertical-align: top;">
                            <label for=""><?php echo esc_html__('Share style ', 'wslu-social-login');?>
                            </label>
                        </th>
                        <?php
                            $td = 1;
                            foreach($styleArr AS $styleKey=>$styleValue):

                        ?>
                        <td style="vertical-align: top;">
                            <input class="social_radio_button" type="radio" id="_login_button_style__<?= $styleKey;?>" name="xs_style[login_button_style]" value="<?= $styleKey;?>" <?php echo (isset($return_data['login_button_style']) && $return_data['login_button_style'] == $styleKey) ? 'checked' : ''; ?> >
                            <label for="_login_button_style__<?= $styleKey;?>" class="social_radio_button_label"> <?php echo esc_html__($styleValue, 'wslu-social-login')?>
                                <div class="xs-login-global xs-login-<?= $styleKey;?> <?php echo (isset($return_data['login_button_style']) && $return_data['login_button_style'] == $styleKey ) ? 'style-active ' : '';?>">
                                    <ul class="_login_button_style__ul">
                                        <li><img src="<?php echo esc_url(WSLU_LOGIN_PLUGIN_URL.'assets/images/screenshort/share/img-'.$td.'.png'); ?>" alt="style-<?php echo $td; ?>"></li>
                                    </ul>
                                </div>
                            </label>
                        </td>
                        <?php
                        if(($td % 3) == 0){
                            echo '</tr><tr> <th></th>';
                         }
                        $td++;
                        endforeach;
                        ?>
                    </tr>
					 <tr>
						<th > 
							<?php echo esc_html__('Body Position ', 'wslu-social-login');?>
						</th>
						<td>
							<input class="social_radio_button" type="radio" id="_login_button_style__left_content" name="xs_style[login_button_content]" value="left_content" <?php echo (isset($return_data['login_button_content']) && $return_data['login_button_content'] == 'left_content') ? 'checked' : ''; ?> >
                            <label for="_login_button_style__left_content" class="social_radio_button_label">
                                <?php echo esc_html__('Left Floating ', 'wslu-social-login');?>
                            </label>
						</td>
						<td>
							<input class="social_radio_button" type="radio" id="_login_button_style__right_content" name="xs_style[login_button_content]" value="right_content" <?php echo (isset($return_data['login_button_content']) && $return_data['login_button_content'] == 'right_content') ? 'checked' : ''; ?> >
                            <label for="_login_button_style__right_content" class="social_radio_button_label"> 
                                <?php echo esc_html__('Right Floating ', 'wslu-social-login');?>
                            </label>
						</td>
						<td>
							<input class="social_radio_button" type="radio" id="_login_button_style__top_content" name="xs_style[login_button_content]" value="top_content" <?php echo (isset($return_data['login_button_content']) && $return_data['login_button_content'] == 'top_content') ? 'checked' : ''; ?> >
                            <label for="_login_button_style__top_content" class="social_radio_button_label">
                                <?php echo esc_html__('Top Inline ', 'wslu-social-login');?>
                            </label>
						</td>
					</tr>
					<tr>
						<th ></th>
						<td>
							<input class="social_radio_button" type="radio" id="_login_button_style__bottom_content" name="xs_style[login_button_content]" value="bottom_content" <?php echo (isset($return_data['login_button_content']) && $return_data['login_button_content'] == 'bottom_content') ? 'checked' : ''; ?> >
                            <label for="_login_button_style__bottom_content" class="social_radio_button_label"> 
                                <?php echo esc_html__('Bottom Inline ', 'wslu-social-login');?>
                            </label>
						</td>
						<td colspan="2">
							<input class="social_radio_button" type="radio" id="_login_button_style__login_content" name="xs_style[login_button_content]" value="no_content" <?php echo (isset($return_data['login_button_content']) && $return_data['login_button_content'] == 'no_content') ? 'checked' : ''; ?> >
                            <label for="_login_button_style__login_content" class="social_radio_button_label"> 
                                <?php echo esc_html__('Disable ', 'wslu-social-login');?>
                            </label>
						</td>
						
					</tr>
					<tr>
						<th > <?php echo esc_html__('Content Position ', 'wslu-social-login');?></th>
						<td>
							<input class="social_radio_button" type="radio" id="_login_button_style__after_content" name="xs_style[login_content]" value="after_content" <?php echo (isset($return_data['login_content']) && $return_data['login_content'] == 'after_content') ? 'checked' : ''; ?> >
                            <label for="_login_button_style__after_content" class="social_radio_button_label"> 
                                <?php echo esc_html__('After Content ', 'wslu-social-login');?>
                            </label>
						</td>
						<td>
							<input class="social_radio_button" type="radio" id="_login_button_style__before_content" name="xs_style[login_content]" value="before_content" <?php echo (isset($return_data['login_content']) && $return_data['login_content'] == 'before_content') ? 'checked' : ''; ?> >
                            <label for="_login_button_style__before_content" class="social_radio_button_label"> 
                                <?php echo esc_html__('Before Content ', 'wslu-social-login');?>
                            </label>
						</td>
						<td >
							<input class="social_radio_button" type="radio" id="_login_button_style__login_content1" name="xs_style[login_content]" value="no_content" <?php echo (isset($return_data['login_content']) && $return_data['login_content'] == 'no_content') ? 'checked' : ''; ?> >
                            <label for="_login_button_style__login_content1" class="social_radio_button_label"> 
                                <?php echo esc_html__('Disable ', 'wslu-social-login');?>
                            </label>
						</td>
						
					</tr>
                    <tr>
						<th >
						</th>
						<td colspan="3">
							<button type="submit" name="style_setting_submit_form" class="xs-btn btn-special small"><?php echo esc_html__('Save');?></button>
						</td>
					</tr>
                </tbody>
            </table>
        </div>
	</div>
	<div class="xs-backdrop"></div>
</form>