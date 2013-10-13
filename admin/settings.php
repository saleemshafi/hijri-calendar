<div class="wrap">
<h2><img src="<?php echo WP_PLUGIN_URL; ?>/hijri-calendar/images/icon4.png" alt=""> Hijri Calendar Plugin Settings</h2>

<?php if ( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) { echo '<div id="message" class="updated"><p>'. __('Settings saved.') .'</p></div>'.PHP_EOL; } ?>

<form method="post" action="options.php">
    <?php
settings_fields( 'hijri_calendar-settings-group' );

  $options = get_option("hcal_options");
  if (!is_array($options)) {
    $options = array(
'adjust_hour' => '24',
'time_zone' => 'Asia/Dhaka',
'language' => 'en',
'format' => '1',
'wgt_title' => 'Hijri Calendar' );
}

  $rplc = get_option("language_rplc");
  if (!is_array($rplc)) {
    $rplc = array( 'n1' => '1', 'n2' => '2', 'n3' => '3', 'n4' => '4', 'n5' => '5', 'n6' => '6', 'n7' => '7', 'n8' => '8', 'n9' => '9', 'n0' => '0', 'm1' => 'Muharram', 'm2' => 'Safar', 'm3' => 'Rabi I', 'm4' => 'Rabi II', 'm5' => 'Jumada I', 'm6' => 'Jumada II', 'm7' => 'Rajab', 'm8' => 'Shaaban', 'm9' => 'Ramadan', 'm10' => 'Shawwal', 'm11' => 'Dhu al-Qidah', 'm12' => 'Dhu al-Hijjah' );
}
?>

<br/><div style="width: 65%; float: left;">
<div class="postbox" style="display: block;float:left;margin:5px;clear:left; width: 99%;">
	<h3 class="hndle" style="padding:5px;"><span>Hijri Date Adjustment</span></h3>
<div class="inside"><p align="justify">Here you can adjust time zone and hijri date output. Example: if your city is Dhaka, Bangladesh, then select Asia/Dhaka from time zone city list and then if you want to minus two days, input 48 hours.</p>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Choose Time Zone:</th>
        <td><?php include "time_zones.php"; ?>
</td><td>Current Time Zone:<br/><span style="color: green;"><?php echo $options['time_zone']; ?></span></td>
        </tr>
        <tr valign="top">
        <th scope="row">Minus Hours:</th>
        <td>-<input type="text" name="hcal_options[adjust_hour]" size="3" value="<?php echo $options['adjust_hour']; ?>"></td><td> Status: <span style="color: red;">-<?php echo $options['adjust_hour']; if($options['adjust_hour'] == "0") { echo " Hour"; }
elseif($options['adjust_hour'] == "1") { echo " Hour"; }
else { echo " Hours"; } ?></span></td>
        </tr>
    </table>
    <?php submit_button(); ?>
<div style="background-color: white; color: red; text-align: justify; padding: 3px; margin: 3px; border: green solid 1px;"><b>Note:</b>These settings are only for single line hijri date, not for monthly calendar.</div>
</div></div>

<div class="postbox" style="display: block;float:left;margin:5px;clear:left; width: 99%;">
	<h3 class="hndle" style="padding:5px;"><span>Date format</span></h3>
<div class="inside"><p align="justify">Choose Hijri date output format.</p>

    <table class="form-table">
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="1"<?php if($options['format'] == "1") { echo " checked"; } ?>></th><td>1st Muharram, 1434 A.H.</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="2"<?php if($options['format'] == "2") { echo " checked"; } ?>></th><td>1st Muharram, 1434</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="3"<?php if($options['format'] == "3") { echo " checked"; } ?>></th><td>Muharram 1st, 1434</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="4"<?php if($options['format'] == "4") { echo " checked"; } ?>></th><td>1434 Muharram 1st</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="5"<?php if($options['format'] == "5") { echo " checked"; } ?>></th><td>1 Muharram 1434</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="6"<?php if($options['format'] == "6") { echo " checked"; } ?>></th><td>01 Muharram 1434</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="7"<?php if($options['format'] == "7") { echo " checked"; } ?>></th><td>1434 Muharram 1</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="8"<?php if($options['format'] == "8") { echo " checked"; } ?>></th><td>1434 Muharram 01</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="9"<?php if($options['format'] == "9") { echo " checked"; } ?>></th><td>01-01-1434</td></tr>
<tr valign="top"><th scope="row"><input type="radio" name="hcal_options[format]" value="10"<?php if($options['format'] == "10") { echo " checked"; } ?>></th><td>1434-01-01</td></tr>
    </table>
    <?php submit_button(); ?>
</div></div>

<div class="postbox" style="display: block;float:left;margin:5px;clear:left; width: 99%;">
	<h3 class="hndle" style="padding:5px;"><span>Date Language</span></h3>
<div class="inside"><p align="justify">Choose Hijri date output language. You can use default (english) language or customize as you want. Just select "Custom Language" and change the numbers and month names...</p>

    <table class="form-table">
<tr valign="top"><td><input type="radio" name="hcal_options[language]" value="en"<?php if($options['language'] == "en") { echo " checked"; } ?>></td><td>English</td></tr>
<tr valign="top"><td><input type="radio" name="hcal_options[language]" value="custom"<?php if($options['language'] == "custom") { echo " checked"; } ?>></td><td>Custom Language (Configure below):</td></tr>

<tr valign="top"><td>Numbers:<br/><input type="text" name="language_rplc[n1]" size="4" value="<?php echo $rplc['n1']; ?>"><br/>
<input type="text" name="language_rplc[n2]" size="4" value="<?php echo $rplc['n2']; ?>"><br/>
<input type="text" name="language_rplc[n3]" size="4" value="<?php echo $rplc['n3']; ?>"><br/>
<input type="text" name="language_rplc[n4]" size="4" value="<?php echo $rplc['n4']; ?>"><br/>
<input type="text" name="language_rplc[n5]" size="4" value="<?php echo $rplc['n5']; ?>"><br/>
<input type="text" name="language_rplc[n6]" size="4" value="<?php echo $rplc['n6']; ?>"><br/>
<input type="text" name="language_rplc[n7]" size="4" value="<?php echo $rplc['n7']; ?>"><br/>
<input type="text" name="language_rplc[n8]" size="4" value="<?php echo $rplc['n8']; ?>"><br/>
<input type="text" name="language_rplc[n9]" size="4" value="<?php echo $rplc['n9']; ?>"><br/>
<input type="text" name="language_rplc[n0]" size="4" value="<?php echo $rplc['n0']; ?>"><br/></td>

<td>Months:<br/><input type="text" name="language_rplc[m1]" size="8" value="<?php echo $rplc['m1']; ?>"><br/>
<input type="text" name="language_rplc[m2]" size="8" value="<?php echo $rplc['m2']; ?>"><br/>
<input type="text" name="language_rplc[m3]" size="8" value="<?php echo $rplc['m3']; ?>"><br/>
<input type="text" name="language_rplc[m4]" size="8" value="<?php echo $rplc['m4']; ?>"><br/>
<input type="text" name="language_rplc[m5]" size="8" value="<?php echo $rplc['m5']; ?>"><br/>
<input type="text" name="language_rplc[m6]" size="8" value="<?php echo $rplc['m6']; ?>"><br/>
<input type="text" name="language_rplc[m7]" size="8" value="<?php echo $rplc['m7']; ?>"><br/>
<input type="text" name="language_rplc[m8]" size="8" value="<?php echo $rplc['m8']; ?>"><br/>
<input type="text" name="language_rplc[m9]" size="8" value="<?php echo $rplc['m9']; ?>"><br/>
<input type="text" name="language_rplc[m10]" size="8" value="<?php echo $rplc['m10']; ?>"><br/>
<input type="text" name="language_rplc[m11]" size="8" value="<?php echo $rplc['m11']; ?>"><br/>
<input type="text" name="language_rplc[m12]" size="8" value="<?php echo $rplc['m12']; ?>"><br/>
    </table>
    <?php submit_button(); ?>
</div></div>

<div class="postbox" style="display: block;float:left;margin:5px;clear:left; width: 99%;">
	<h3 class="hndle" style="padding:5px;"><span>Widget Customization</span></h3>
<div class="inside"><p align="justify">Set your desired titles for available widgets below.</p>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Title for <span style="color: green;">Hijri Calendar</span> widget:</th>
        <td><input type="text" name="hcal_options[wgt_title]" value="<?php echo $options['wgt_title']; ?>"></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</div></div>

</form>
</div>
<?php echo hijri_calendar_sidebar(); ?>
</div>