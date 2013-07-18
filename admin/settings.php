<div class="wrap">
<h2><img src="<?php echo WP_PLUGIN_URL; ?>/hijri-calendar/images/icon4.png" alt=""> Hijri Calendar Plugin Settings</h2>

<?php if ( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) { 
echo '<div id="message" class="updated"><p>'. __('Settings saved.') .'</p></div>'.PHP_EOL;
} ?>

<form method="post" action="options.php">
    <?php
settings_fields( 'hijri_calendar-settings-group' );

$hijri_calendar_option1 = get_option('hijri_calendar_option1');if($hijri_calendar_option1 == "") { $hijri_calendar_option1 = "0"; }
?>

<br/><div style="width: 65%; float: left;">
<div class="postbox" style="display: block;float:left;margin:5px;clear:left; width: 99%;">
	<h3 class="hndle" style="padding:5px;"><span>Hijri Date Adjustment</span></h3>
<div class="inside"><p align="justify">Here you can adjust hijri date output. For example, if you want to minus two days, input 48 hours and Save Changes.</p>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Minus Hours:</th>
        <td>-<input type="text" name="hijri_calendar_option1" size="3" value="<?php echo $hijri_calendar_option1; ?>"></td><td> Status: -<?php echo $hijri_calendar_option1; if($hijri_calendar_option1 == "0") { echo " Hour"; }
elseif($hijri_calendar_option1 == "1") { echo " Hour"; }
else { echo " Hours"; } ?></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</div></div>

</form>
</div>
<?php echo hijri_calendar_sidebar(); ?>
</div>
