<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
add_action( 'admin_menu', 'cstdnt_add_admin_menu' );
add_action( 'admin_init', 'cstdnt_settings_init' );


function cstdnt_add_admin_menu(  ) { 

	add_menu_page( 'Custom Donations', 'Custom Donations', 'manage_options', 'custom_donations', 'cstdnt_options_page' );

}


function cstdnt_settings_init(  ) { 

		register_setting( 'cstdnt_pluginPage', 'cstdnt_settings' );

	register_setting( 'cstdnt_single', 'cstdnt_settings' );

	register_setting( 'cstdnt_recurring', 'cstdnt_settings' );

	register_setting( 'cstdnt_donate_image', 'cstdnt_settings' );

	register_setting('disable_css', 'cstdnt_settings');


	add_settings_section(
	'cstdnt_pluginPage_section', 
	__( '', 'wordpress' ), 
	'cstdnt_settings_section_callback', 
	'cstdnt_pluginPage'
	);

	add_settings_section(
		'cstdnt_single_section',
		__( '', 'wordpress' ), 
		'cstdnt_settings_section_callback', 
		'cstdnt_single'
	);


	add_settings_section(
		'cstdnt_recurring_section',
		__( '', 'wordpress' ), 
		'cstdnt_settings_section_callback', 
		'cstdnt_recurring'
	);

	add_settings_section(
		'cstdnt_donate_image_section',
		__( '', 'wordpress' ), 
		'cstdnt_settings_section_callback', 
		'cstdnt_donate_image'
	);

	add_settings_section(
		'cstdnt_disable_css_section',
		__( '', 'wordpress' ), 
		'cstdnt_settings_section_callback', 
		'disable_css'
	);


	add_settings_field( 
		'cstdnt_disable_css_handle', 
		__( 'Disable Plugin CSS', 'wordpress' ), 
		'cstdnt_disable_css_render', 
		'disable_css', 
		'cstdnt_disable_css_section' 
	);

	add_settings_field( 
		'cstdnt_paypal_email', 
		__( 'Paypal Email Account', 'wordpress' ), 
		'cstdnt_paypal_email_render', 
		'cstdnt_pluginPage', 
		'cstdnt_cstdnt_pluginPage_section' 
	);

	add_settings_field( 
		'cstdnt_organization_name', 
		__( 'Organization Name', 'wordpress' ), 
		'cstdnt_organization_name_render', 
		'cstdnt_pluginPage', 
		'cstdnt_cstdnt_pluginPage_section' 
	);

	add_settings_field( 
		'cstdnt_single_enable', 
		__( 'Enable One Time Donation', 'wordpress' ), 
		'cstdnt_single_enable_render', 
		'cstdnt_single', 
		'cstdnt_single_section' 
	);

	add_settings_field( 
		'cstdnt_single_header', 
		__( 'Header for Single Donation Section', 'wordpress' ), 
		'cstdnt_single_header_render', 
		'cstdnt_single', 
		'cstdnt_single_section' 
	);

	add_settings_field( 
		'cstdnt_single_meta', 
		__( 'Extra Text Field to pass to Paypal', 'wordpress' ), 
		'cstdnt_single_meta_render', 
		'cstdnt_single', 
		'cstdnt_single_section' 
	);

	add_settings_field( 
		'cstdnt_enable_recurring', 
		__( 'Enable Recurring Donation', 'wordpress' ), 
		'cstdnt_enable_recurring_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);

	add_settings_field( 
		'cstdnt_recurring_header', 
		__( 'Recurring Donation Header', 'wordpress' ), 
		'cstdnt_recurring_header_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);


	add_settings_field( 
		'cstdnt_recurring_duration', 
		__( 'Duration Header', 'wordpress' ), 
		'cstdnt_recurring_duration_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);


	add_settings_field( 
		'cstdnt_recurring_daily', 
		__( 'Daily', 'wordpress' ), 
		'cstdnt_recurring_daily_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);

	add_settings_field( 
		'cstdnt_recurring_weekly', 
		__( 'Weekly', 'wordpress' ), 
		'cstdnt_recurring_weekly_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);

	add_settings_field( 
		'cstdnt_recurring_monthly', 
		__( 'Monthly', 'wordpress' ), 
		'cstdnt_recurring_monthly_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);

	add_settings_field( 
		'cstdnt_recurring_yearly', 
		__( 'Yearly', 'wordpress' ), 
		'cstdnt_recurring_yearly_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);


	add_settings_field( 
		'cstdnt_recurring_options_header', 
		__( 'Recurring Options Header', 'wordpress' ), 
		'cstdnt_recurring_options_header_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);

	add_settings_field( 
		'cstdnt_recurring_amount_header', 
		__( 'Recurring Amount Header', 'wordpress' ), 
		'cstdnt_recurring_amount_header_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);

	add_settings_field( 
		'cstdnt_recurring_meta', 
		__( 'Extra Text Field to pass to Paypal', 'wordpress' ), 
		'cstdnt_recurring_meta_render', 
		'cstdnt_recurring', 
		'cstdnt_recurring_section' 
	);

	add_settings_field( 
		'cstdnt_donate_image', 
		__( 'custom donate button image URL', 'wordpress' ), 
		'cstdnt_donate_image_render', 
		'cstdnt_donate_image', 
		'cstdnt_donate_image_section' 
	);


}

function cstdnt_paypal_email_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_paypal_email]' value='<?php if(isset($options['cstdnt_paypal_email']))
	{echo $options['cstdnt_paypal_email'];} ?>' class='wide' required>
	<?php

}

function cstdnt_organization_name_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_organization_name]' value='<?php if(isset($options['cstdnt_organization_name']))
	{echo $options['cstdnt_organization_name'];} ?>' class='wide' required>
	<?php

}


function cstdnt_single_enable_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='checkbox' id='cstdnt_single_enable' name='cstdnt_settings[cstdnt_single_enable]' 
	<?php checked( isset($options['cstdnt_single_enable']), 1 ); ?> value='1' class='enable'>
	<?php

}


function cstdnt_single_header_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_single_header]' value= "<?php if(isset($options['cstdnt_single_header']))
	{echo $options['cstdnt_single_header'];} else{ echo('One Time Donation');} ?>">
	<?php

}


function cstdnt_single_meta_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_single_meta]' value="<?php if(isset($options['cstdnt_single_meta']))
	{echo $options['cstdnt_single_meta'];} ?>">
	<?php

}


function cstdnt_enable_recurring_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='checkbox' id='cstdnt_recurring_enable' name='cstdnt_settings[cstdnt_recurring_enable]' 
	<?php checked( isset($options['cstdnt_recurring_enable']), 1 ); ?> value='1' class='enable'>
	<?php

}


function cstdnt_recurring_header_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_recurring_header]' value='<?php if(isset($options['cstdnt_recurring_header']))
	{echo $options['cstdnt_recurring_header'];} else{ echo('Recurring Donation');} ?>'>
	<?php

}


function cstdnt_recurring_duration_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_recurring_duration]' value="<?php if(isset($options['cstdnt_recurring_duration']))
	{echo $options['cstdnt_recurring_duration'];} else{ echo('How often would you like your donation to recur?');} ?> " class='wide'>
	<?php

}

function cstdnt_recurring_daily_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='checkbox' id='cstdnt_recurring_daily' name='cstdnt_settings[cstdnt_recurring_daily]' 
	<?php checked( isset($options['cstdnt_recurring_daily']), 1 ); ?> value='1' >
	<?php

}

function cstdnt_recurring_weekly_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='checkbox' id='cstdnt_recurring_weekly' name='cstdnt_settings[cstdnt_recurring_weekly]' 
	<?php checked( isset($options['cstdnt_recurring_weekly']), 1 ); ?> value='1' >
	<?php


}

function cstdnt_recurring_monthly_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='checkbox' id='cstdnt_recurring_monthly' name='cstdnt_settings[cstdnt_recurring_monthly]' 
	<?php checked( isset($options['cstdnt_recurring_monthly']), 1 ); ?> value='1' >
	<?php


}

function cstdnt_recurring_yearly_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='checkbox' id='cstdnt_recurring_yearly' name='cstdnt_settings[cstdnt_recurring_yearly]' 
	<?php checked( isset($options['cstdnt_recurring_yearly']), 1 ); ?> value='1' >
	<?php

}


function cstdnt_recurring_options_header_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_recurring_options_header]' value='<?php if(isset($options['cstdnt_recurring_options_header']))
	{echo $options['cstdnt_recurring_options_header'];} else{ echo('How many times would you like this to recur? (including this payment)');} ?>' class='wide'>
	<?php

}


function cstdnt_recurring_amount_header_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_recurring_amount_header]' value='<?php if(isset($options['cstdnt_recurring_amount_header']))
	{echo $options['cstdnt_recurring_amount_header'];} else{ echo('Enter your donation amount');} ?>' class='wide'>
	<?php

}


function cstdnt_recurring_meta_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_recurring_meta]' value="<?php  if(isset($options['cstdnt_recurring_meta']))
	{echo $options['cstdnt_recurring_meta'];} ?> ">
	<?php

}

function cstdnt_donate_image_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='text' name='cstdnt_settings[cstdnt_donate_image]' 
	value='<?php if(isset($options['cstdnt_donate_image']))
	{echo $options['cstdnt_donate_image'];} else{ echo("https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif");} ?>' class='wide'>
	<?php

}

function cstdnt_disable_css_render(  ) { 

	$options = get_option( 'cstdnt_settings' );
	?>
	<input type='checkbox' id='cstdnt_disable_css' name='cstdnt_settings[cstdnt_disable_css]' 
	<?php checked( isset($options['cstdnt_disable_css']), 1 ); ?> value='1'>
	<?php

}

function cstdnt_settings_section_callback(  ) { 

	echo __( '', 'wordpress' );

}


function cstdnt_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		<input type="hidden" name="destination" value="<?php echo admin_url('admin.php?page=custom_donations')?>"/>

		<div id='cstdnt-admin'>

			<h2>Custom Donations</h2>

			<?php
			settings_fields( 'cstdnt_pluginPage' );
			settings_fields( 'cstdnt_single' );
			settings_fields( 'cstdnt_recurring' );
			settings_fields( 'cstdnt_donate_image' );
			settings_fields('disable_css');
			
			do_settings_sections( 'cstdnt_pluginPage' );
			?> <div class='cstdnt_form_section'> <?php
			do_settings_sections( 'cstdnt_single' );
			?> </div><div class='cstdnt_form_section'> <?php
			do_settings_sections( 'cstdnt_recurring' );
			?> </div><div class='cstdnt_form_section'> <?php
			do_settings_sections( 'cstdnt_donate_image' );
			?> </div> <div class='cstdnt_form_section'> <?php
			do_settings_sections( 'disable_css' );
			?> </div><?php
			submit_button();
			?>


		</div>

	</form>
	<?php

}


?>