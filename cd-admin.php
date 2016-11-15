<?php

add_action( 'admin_menu', 'cd_add_admin_menu' );
add_action( 'admin_init', 'cd_settings_init' );
function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}


function cd_add_admin_menu(  ) { 

	add_menu_page( 'Custom Donations', 'Custom Donations', 'manage_options', 'custom_donations', 'cd_options_page' );

}


function cd_settings_init(  ) { 

		register_setting( 'pluginPage', 'cd_settings' );

	register_setting( 'cd_single', 'cd_settings' );

	register_setting( 'cd_recurring', 'cd_settings' );

	register_setting( 'cd_donate_image', 'cd_settings' );

	register_setting('disable_css', 'cd_settings');


	add_settings_section(
	'cd_pluginPage_section', 
	__( '', 'wordpress' ), 
	'cd_settings_section_callback', 
	'pluginPage'
	);

	add_settings_section(
		'cd_single_section',
		__( '', 'wordpress' ), 
		'cd_settings_section_callback', 
		'cd_single'
	);


	add_settings_section(
		'cd_recurring_section',
		__( '', 'wordpress' ), 
		'cd_settings_section_callback', 
		'cd_recurring'
	);

	add_settings_section(
		'cd_donate_image_section',
		__( '', 'wordpress' ), 
		'cd_settings_section_callback', 
		'cd_donate_image'
	);

	add_settings_section(
		'cd_disable_css_section',
		__( '', 'wordpress' ), 
		'cd_settings_section_callback', 
		'disable_css'
	);


	add_settings_field( 
		'cd_disable_css_handle', 
		__( 'Disable Plugin CSS', 'wordpress' ), 
		'cd_disable_css_render', 
		'disable_css', 
		'cd_disable_css_section' 
	);

	add_settings_field( 
		'cd_paypal_email', 
		__( 'Paypal Email Account', 'wordpress' ), 
		'cd_paypal_email_render', 
		'pluginPage', 
		'cd_pluginPage_section' 
	);

	add_settings_field( 
		'cd_organization_name', 
		__( 'Organization Name', 'wordpress' ), 
		'cd_organization_name_render', 
		'pluginPage', 
		'cd_pluginPage_section' 
	);

	add_settings_field( 
		'cd_single_enable', 
		__( 'Enable One Time Donation', 'wordpress' ), 
		'cd_single_enable_render', 
		'cd_single', 
		'cd_single_section' 
	);

	add_settings_field( 
		'cd_single_header', 
		__( 'Header for Single Donation Section', 'wordpress' ), 
		'cd_single_header_render', 
		'cd_single', 
		'cd_single_section' 
	);

	add_settings_field( 
		'cd_single_meta', 
		__( 'Extra Text Field to pass to Paypal', 'wordpress' ), 
		'cd_single_meta_render', 
		'cd_single', 
		'cd_single_section' 
	);

	add_settings_field( 
		'cd_enable_recurring', 
		__( 'Enable Recurring Donation', 'wordpress' ), 
		'cd_enable_recurring_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);

	add_settings_field( 
		'cd_recurring_header', 
		__( 'Recurring Donation Header', 'wordpress' ), 
		'cd_recurring_header_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);


	add_settings_field( 
		'cd_recurring_duration', 
		__( 'Duration Header', 'wordpress' ), 
		'cd_recurring_duration_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);


	add_settings_field( 
		'cd_recurring_daily', 
		__( 'Daily', 'wordpress' ), 
		'cd_recurring_daily_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);

	add_settings_field( 
		'cd_recurring_weekly', 
		__( 'Weekly', 'wordpress' ), 
		'cd_recurring_weekly_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);

	add_settings_field( 
		'cd_recurring_monthly', 
		__( 'Monthly', 'wordpress' ), 
		'cd_recurring_monthly_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);

	add_settings_field( 
		'cd_recurring_yearly', 
		__( 'Yearly', 'wordpress' ), 
		'cd_recurring_yearly_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);


	add_settings_field( 
		'cd_recurring_options_header', 
		__( 'Recurring Options Header', 'wordpress' ), 
		'cd_recurring_options_header_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);

	add_settings_field( 
		'cd_recurring_amount_header', 
		__( 'Recurring Amount Header', 'wordpress' ), 
		'cd_recurring_amount_header_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);

	add_settings_field( 
		'cd_recurring_meta', 
		__( 'Extra Text Field to pass to Paypal', 'wordpress' ), 
		'cd_recurring_meta_render', 
		'cd_recurring', 
		'cd_recurring_section' 
	);

	add_settings_field( 
		'cd_donate_image', 
		__( 'custom donate button image URL', 'wordpress' ), 
		'cd_donate_image_render', 
		'cd_donate_image', 
		'cd_donate_image_section' 
	);


}

function return_option($saved, $default) {
	if (isset($saved)) {echo $saved;}
	else {echo $default;};
}




function cd_paypal_email_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_paypal_email]' value='<?php if(isset($options['cd_paypal_email']))
	{echo $options['cd_paypal_email'];} ?>' class='wide' required>
	<?php

}

function cd_organization_name_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_organization_name]' value='<?php if(isset($options['cd_organization_name']))
	{echo $options['cd_organization_name'];} ?>' class='wide' required>
	<?php

}


function cd_single_enable_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='checkbox' id='cd_single_enable' name='cd_settings[cd_single_enable]' 
	<?php checked( isset($options['cd_single_enable']), 1 ); ?> value='1' class='enable'>
	<?php

}


function cd_single_header_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_single_header]' value= "<?php if(isset($options['cd_single_header']))
	{echo $options['cd_single_header'];} else{ echo('One Time Donation');} ?>">
	<?php

}


function cd_single_meta_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_single_meta]' value="<?php if(isset($options['cd_single_meta']))
	{echo $options['cd_single_meta'];} ?>">
	<?php

}


function cd_enable_recurring_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='checkbox' id='cd_recurring_enable' name='cd_settings[cd_recurring_enable]' 
	<?php checked( isset($options['cd_recurring_enable']), 1 ); ?> value='1' class='enable'>
	<?php

}


function cd_recurring_header_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_recurring_header]' value='<?php if(isset($options['cd_recurring_header']))
	{echo $options['cd_recurring_header'];} else{ echo('Recurring Donation');} ?>'>
	<?php

}


function cd_recurring_duration_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_recurring_duration]' value="<?php if(isset($options['cd_recurring_duration']))
	{echo $options['cd_recurring_duration'];} else{ echo('How often would you like your donation to recur?');} ?> " class='wide'>
	<?php

}

function cd_recurring_daily_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='checkbox' id='cd_recurring_daily' name='cd_settings[cd_recurring_daily]' 
	<?php checked( isset($options['cd_recurring_daily']), 1 ); ?> value='1' >
	<?php

}

function cd_recurring_weekly_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='checkbox' id='cd_recurring_weekly' name='cd_settings[cd_recurring_weekly]' 
	<?php checked( isset($options['cd_recurring_weekly']), 1 ); ?> value='1' >
	<?php


}

function cd_recurring_monthly_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='checkbox' id='cd_recurring_monthly' name='cd_settings[cd_recurring_monthly]' 
	<?php checked( isset($options['cd_recurring_monthly']), 1 ); ?> value='1' >
	<?php


}

function cd_recurring_yearly_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='checkbox' id='cd_recurring_yearly' name='cd_settings[cd_recurring_yearly]' 
	<?php checked( isset($options['cd_recurring_yearly']), 1 ); ?> value='1' >
	<?php

}


function cd_recurring_options_header_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_recurring_options_header]' value='<?php if(isset($options['cd_recurring_options_header']))
	{echo $options['cd_recurring_options_header'];} else{ echo('How many times would you like this to recur? (including this payment)');} ?>' class='wide'>
	<?php

}


function cd_recurring_amount_header_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_recurring_amount_header]' value='<?php if(isset($options['cd_recurring_amount_header']))
	{echo $options['cd_recurring_amount_header'];} else{ echo('Enter your donation amount');} ?>' class='wide'>
	<?php

}


function cd_recurring_meta_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_recurring_meta]' value="<?php  if(isset($options['cd_recurring_meta']))
	{echo $options['cd_recurring_meta'];} ?> ">
	<?php

}

function cd_donate_image_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='text' name='cd_settings[cd_donate_image]' 
	value='<?php if(isset($options['cd_donate_image']))
	{echo $options['cd_donate_image'];} else{ echo("https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif");} ?>' class='wide'>
	<?php

}

function cd_disable_css_render(  ) { 

	$options = get_option( 'cd_settings' );
	?>
	<input type='checkbox' id='cd_disable_css' name='cd_settings[cd_disable_css]' 
	<?php checked( isset($options['cd_disable_css']), 1 ); ?> value='1'>
	<?php

}

function cd_settings_section_callback(  ) { 

	echo __( '', 'wordpress' );

}


function cd_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		<input type="hidden" name="destination" value="/wp-admin/admin.php?page=custom_donations"/>

		<div id='cd-admin'>

			<h2>Custom Donations</h2>

			<?php
			settings_fields( 'pluginPage' );
			settings_fields( 'cd_single' );
			settings_fields( 'cd_recurring' );
			settings_fields( 'cd_donate_image' );
			settings_fields('disable_css');
			
			do_settings_sections( 'pluginPage' );
			?> <div class='cd_form_section'> <?php
			do_settings_sections( 'cd_single' );
			?> </div><div class='cd_form_section'> <?php
			do_settings_sections( 'cd_recurring' );
			?> </div><div class='cd_form_section'> <?php
			do_settings_sections( 'cd_donate_image' );
			?> </div> <div class='cd_form_section'> <?php
			do_settings_sections( 'disable_css' );
			?> </div><?php
			submit_button();
			?>


		</div>

	</form>
	<?php

}


?>