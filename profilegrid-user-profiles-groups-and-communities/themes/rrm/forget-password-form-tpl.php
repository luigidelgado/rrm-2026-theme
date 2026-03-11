<?php
global $wpdb;
$path =  plugin_dir_url(__FILE__);
$pmrequests = new PM_request;
if (function_exists('is_wpe')):
$forgot_pwd_url= "/wp-login.php?action=lostpassword&wpe-login=true";
else:
$forgot_pwd_url= "/wp-login.php?action=lostpassword";
endif;

?>
<div class="pmagic rrm recovery">  
 	<div class="pm-login-box"> 
		<?php if(isset($pm_error) && $pm_error!='' && !is_user_logged_in()):?>
				<div class="pm-login-box-error pm-dbfl pm-pad10 pm-border-bt"><?php echo wp_kses_post($pm_error);?></div>
			<?php endif;?>
			<?php 
			if ( is_user_logged_in()) : ?>
			<?php
				$redirect_url = $pmrequests->profile_magic_get_frontend_url('pm_user_profile_page','');
			?> 
			<div class="pm-login-header pm-dbfl pm-pad10">
				<h4><?php esc_html_e( "You can reset your password by accessing Change Password tab in your profile's Settings section.",'profilegrid-user-profiles-groups-and-communities' );?></h4>
				<p><?php esc_html_e('PROCEED TO','profilegrid-user-profiles-groups-and-communities');?></p>
			</div>
			<div class="pm-login-header-buttons  pm-pad10">
				<a href="<?php echo esc_url($redirect_url);?>" class="pm_button"><?php esc_html_e('My Profile','profilegrid-user-profiles-groups-and-communities');?></a>
				<a href="<?php echo esc_url(wp_logout_url( $pmrequests->profile_magic_get_frontend_url('pm_user_login_page',''))); ?>" class="pm_button"><?php esc_html_e('Logout','profilegrid-user-profiles-groups-and-communities');?></a>
			</div>
			<?php
		else:
		?>
		<form id="lostpasswordform" class="pmagic-form" action="<?php echo esc_url(site_url($forgot_pwd_url)); ?>" method="post">
			<div class="pm-login-header pm-pad10">
				<?php esc_html_e('If you have lost your password, we can help you reset it. To initiate password reset process, please enter your username or email in the box below and click on the button.','profilegrid-user-profiles-groups-and-communities');?>
			</div>
			<div class="pm-row">
				<div class="pm-field-input">
					<input type="text" name="<?php echo esc_attr('user_login');?>" id="user_login" placeholder="<?php esc_attr_e('Email or Username','profilegrid-user-profiles-groups-and-communities');?>">
					<i class="icon-mail"></i>
				</div>
			</div>
			
			
			<input type="submit" name="submit" class="lostpassword-button" value="<?php esc_attr_e( 'Reset Password','profilegrid-user-profiles-groups-and-communities' ); ?>"/>
			
		</form>
		<?php endif;?>
 	</div>
</div>
