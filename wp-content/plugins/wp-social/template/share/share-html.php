<?php if(is_array($counter_provider) && sizeof($counter_provider) > 0):?>
<div class="xs_social_share_widget <?php echo esc_attr($className);?>">
	<ul class="xs_share_url <?php echo  esc_attr('ul-'.$widget_style); ?>">
		<?php
	
		foreach( $counter_provider AS $k=>$v):
			if( isset($v['enable']) && in_array($k, $provider) ){
				$label = isset($v['data']['label']) ? $v['data']['label'] : '';
				$default = isset($v['data']['value']) ? (int) $v['data']['value'] : 0;
				$text = isset($v['data']['text']) ? $v['data']['text'] : '';
				
				$counter = isset($post_meta[0][$k]) ? $post_meta[0][$k] : 1;
				
				$counter = ($default) > $counter ? $default : $counter;
				
				$id = isset($v['id']) ? $v['id'] : '';
				$type = isset($v['type']) ? $v['type'] : '';
				$url_get = isset($core_provider[$k]['url']) ? $core_provider[$k]['url'] : '';
				$params_data = isset($core_provider[$k]['params']) ? $core_provider[$k]['params'] : '';
				
				$urlCon = array_combine(
								 array_keys($params_data), 
								 array_map( function($v){ 
									global $currentUrl, $title, $author, $details, $source, $media, $app_id;
									return str_replace(['[%url%]', '[%title%]', '[%author%]', '[%details%]', '[%source%]', '[%media%]', '[%app_id%]'], [$currentUrl, $title, $author, $details, $source, $media, $app_id], $v); 
								 }, $params_data)
							);
				
				$params = http_build_query($urlCon, '&');
				
				?>
					<li title="<?php echo $label;?>" class="xs-share-li <?php echo  esc_attr('share-'.$widget_style.' '.$k); ?>" >
						<a href="javascript:void();" id="xs_feed_<?php echo $k?>" onclick="xs_feed_share(this);" data-xs-href="<?php echo $url_get.'?'.$params;?>">
							<?php if(!isset($global_data['show_icon']['enable'])):?>
							<div class="xs-social-icon">
								<span class="met-social met-social-<?php echo $k;?>"></span>
							</div>
							<?php endif;
							if(!isset($global_data['show_counter']['enable'])):?>
							<div class="xs-social-follower">
								<?php echo xs_format_num($counter);?>
							</div>
							<?php endif;
							if(!isset($global_data['show_text']['enable'])):?>
							<div class="xs-social-follower-text">
								<?php echo $text;?>
							</div>
							<?php endif;
							if(!isset($global_data['show_label']['enable'])):
							?>
							<div class="xs-social-follower-label">
								<?php echo $label;?>
							</div>
							<?php endif;?>
						</a>
					</li>
				<?php
			}
		endforeach;
		?>
	</ul>
</div>
<?php endif;?>
<script>
function xs_feed_share(e){
	if(e){
		var getLink = e.getAttribute('data-xs-href');
		window.open(getLink, 'xs_feed_sharer', 'width=626,height=436');
	}
}
</script>