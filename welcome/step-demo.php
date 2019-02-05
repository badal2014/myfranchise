<div class="feature-section import-demo-data">
	<div class="warning-msg"><?php echo esc_html__('Please install Recommended Plugins for demo to be imported completely. And Make sure you download demo in a fresh install.  Your Old Data might be deleted.','the100');
	echo wp_kses_post(__('Download plugin from here: <a href="https://github.com/8degreethemes/instant-demo-importer/archive/master.zip">IDM</a> Or you can use One Click Demo Import Plugin to import the demo contents, the files can be found inside folder : <b>the100/welcome/demo</b>','the100'));
	?></div>
	<?php
	wp_enqueue_style( 'plugin-install' );
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
	$the100_req_plugins = $this->the100_req_plugins;

	foreach($the100_req_plugins as $slug=>$plugin) :
		if($plugin['bundled'] == false) {
			?>
			<div class="action-tab warning">
				<h3><?php printf( esc_html__("Install : %s Plugin", 'the100'), esc_attr($plugin['name']) ); ?></h3>
				<p><?php echo esc_html__('Please check the plugins folder inside theme and upload the zip of plugins from plugin uploader.','the100');?></p>
			</div>
			<?php
		} else {
			$github_repo = isset($plugin['github_repo']) ? $plugin['github_repo'] : false;
			$github = false;

			if($github_repo) {
				$plugin['location'] = $this->the100_get_local_dir_path($plugin);
				$github = true;
			}

			$status = $this->check_active($plugin);
			
			switch($status['needs']) {
				case 'install' :
				$btn_class = 'install-offline button';
				$label = esc_html__('Install and Activate', 'the100');
				$link = $plugin['location'];
				break;

				case 'deactivate' :
				$btn_class = 'button';
				$label = esc_html__('Deactivate', 'the100');
				$link = admin_url('plugins.php');
				break;

				case 'activate' :
				$btn_class = 'activate-offline button button-primary';
				$label = esc_html__('Activate', 'the100');
				$link = $plugin['location'];
				break;
			}
			?>
			<?php if(!class_exists($plugin['class'])) : ?>
				<div class="action-tab warning">
					<h3><?php printf( esc_html__("Install : %s Plugin", 'the100'), esc_attr($plugin['name']) ); ?></h3>
					<p><?php echo esc_attr($plugin['info']); ?></p>

					<span class="plugin-card-<?php echo esc_attr($plugin['slug']); ?>" action_button>
						<a class="<?php echo esc_attr($btn_class); ?>" data-github="<?php echo esc_attr($github); ?>" data-file='<?php echo esc_attr($plugin['slug']).'/'.esc_attr($plugin['filename']); ?>' data-slug="<?php echo esc_attr($plugin['slug']); ?>" href="<?php echo esc_html($link); ?>"><?php echo esc_attr($label); ?></a>
					</span>
				</div>
			<?php endif; ?>
			<?php
		}

	endforeach;
	?>

	<?php do_action('instant_demo_importer'); ?>
</div>