<?php
	$active_tab = isset($_GET["tab"]) ? $_GET["tab"] : 'wslu_counter_setting';
?>
 <h2 class="nav-tab-wrapper">
	<a href="?page=wslu_share_setting" class="nav-tab <?php if($active_tab == 'wslu_counter_setting'){echo 'nav-tab-active';} ?> "><?php _e('Share Settings', 'wslu-social-login'); ?></a>
	<a href="?page=wslu_share_setting&tab=wslu_providers" class="nav-tab <?php if($active_tab == 'wslu_providers'){echo 'nav-tab-active';} ?>"><?php _e('Providers', 'wslu-social-login'); ?></a>
	<a href="?page=wslu_share_setting&tab=wslu_style_setting" class="nav-tab <?php if($active_tab == 'wslu_style_setting'){echo 'nav-tab-active';} ?>"><?php _e('Style Settings', 'wslu-social-login'); ?></a>
</h2>