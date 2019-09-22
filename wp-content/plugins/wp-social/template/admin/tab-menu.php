<?php
	$active_tab = isset($_GET["tab"]) ? $_GET["tab"] : 'wslu_global_setting';
?>
 <h2 class="nav-tab-wrapper">
	<!-- when tab buttons are clicked we jump back to the same page but with a new parameter that represents the clicked tab. accordingly we make it active -->
	<a href="?page=wslu_global_setting" class="nav-tab <?php if($active_tab == 'wslu_global_setting'){echo 'nav-tab-active';} ?> "><?php _e('Global Settings', 'wslu-social-login'); ?></a>
	<a href="?page=wslu_global_setting&tab=wslu_providers" class="nav-tab <?php if($active_tab == 'wslu_providers'){echo 'nav-tab-active';} ?>"><?php _e('Providers', 'wslu-social-login'); ?></a>
	<a href="?page=wslu_global_setting&tab=wslu_style_setting" class="nav-tab <?php if($active_tab == 'wslu_style_setting'){echo 'nav-tab-active';} ?>"><?php _e('Style Settings', 'wslu-social-login'); ?></a>
</h2>