<?php function mu_html_add_new_url($error_msg = '') {
$site = YOURLS_SITE;

// Display the form
echo <<<HTML
<center>
<form method="post" action="?act=add_new_url">
<p><label>URL: <input type="text" class="text" name="url" value="http://" /></label></p>
<p><label>Optional custom short URL: $site/<input type="text" class="text" name="keyword" /></label></p>
<p><label>Optional title: <input type="text" class="text" name="title" /></label></p>
<p><input type="submit" class="button primary" value="Shorten" /></p>
</form></center>
HTML;
}
?>
<?php
function mu_html_loginForm($error_msg = '') {

	?>

<div id="login">
	<form method="post" action="?act=login">


	<?php
	if(!empty($error_msg)) {
		echo '<p class="error">'.$error_msg.'</p>';
		unset($_SESSION['error_msg']);
	}
	?>



		<p>
			<label for="username">Username</label><br /> <input type="text"
				id="username" name="username" size="30" class="text" />
		</p>
		<p>
			<label for="password">Password</label><br /> <input type="password"
				id="password" name="password" size="30" class="text" />
		</p>
		<p style="text-align: right;">
			<input type="submit" id="submit" name="submit" value="Login"
				class="button" />
		</p>
	</form>
	<script type="text/javascript">$('#username').focus();</script>
</div>
	<?php
}

function mu_html_signupForm($error_msg = '') {
	?>
<script type="text/javascript">
		 var RecaptchaOptions = {
		    theme : '<?php echo YOURLS_MULTIUSER_CAPTCHA_THEME ?>'
		 };
</script>
<div id="login">
	<form method="post" action="?act=join">
	<?php // reset any QUERY parameters ?>
	<?php
	if(!empty($error_msg)) {
		echo '<p class="error">'.$error_msg.'</p>';
		unset($_SESSION['error_msg']);
	}
	?>
		<p>
			<label for="username">Username (e-mail)</label><br /> <input
				type="text" id="username" name="username" size="30" class="text" />
		</p>
		<p>
			<label for="password">Password</label><br /> <input type="password"
				id="password" name="password" size="30" class="text" />
		</p>
		<p>
		<?php
		if(captchaEnabled()) {
			require_once 'recaptchalib.php';
			$publickey = YOURLS_MULTIUSER_CAPTCHA_PUBLIC_KEY;
			echo recaptcha_get_html($publickey);
		}
		?>
		</p>



		<input type="submit" id="submit" name="submit" value="Join!"
			class="button" />
		</p>








	</form>
	<script type="text/javascript">$('#username').focus();</script>
</div>
		<?php
}

function mu_html_menu() {
	echo "
		<script type=\"text/javascript\">
		//<![CDATA[
			var ajaxurl = '" . muAdminUrl("admin-ajax.php") . "';
		//]]>
		</script>";
	?>

<ul id="admin_menu">
	<li><a href="<?php  echo YOURLS_SITE; ?>">Home</a> <?php
	if(isLogged()) {
		?>

	<li><a href="http://urlslice.me/index.php?act=logout">Logout</a>
	</li>
	<?php
	} else {
		?>
	<li><a href="http://urlslice.me/index.php?act=log_in">Log in</a></li>
	<li><a href="http://urlslice.me/index.php?act=joinform">Sign
			in</a></li>
			<?php
	}
	?>
</ul>
	<?php
}
?>
