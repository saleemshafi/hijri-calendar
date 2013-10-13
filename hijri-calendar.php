<?php
/*
Plugin Name: Hijri Calendar
Plugin URI: http://i-onlinemedia.net/
Description: "Hijri Calendar" is a simple and easy to use plugin that allows you to show hijri/islamic date according to hijri calendar, anywhere in your blog!
Author: M.A. IMRAN
Version: 3.0
Author URI: http://facebook.com/imran2w
*/


function hcal_lang_rplc($lang) {

  $rplc = get_option("language_rplc");
  if (!is_array($rplc)) {
    $rplc = array( 'n1' => '1', 'n2' => '2', 'n3' => '3', 'n4' => '4', 'n5' => '5', 'n6' => '6', 'n7' => '7', 'n8' => '8', 'n9' => '9', 'n0' => '0', 'm1' => 'Muharram', 'm2' => 'Safar', 'm3' => 'Rabi I', 'm4' => 'Rabi II', 'm5' => 'Jumada I', 'm6' => 'Jumada II', 'm7' => 'Rajab', 'm8' => 'Shaaban', 'm9' => 'Ramadan', 'm10' => 'Shawwal', 'm11' => 'Dhu al-Qidah', 'm12' => 'Dhu al-Hijjah' );
}

  $options = get_option("hcal_options");

if ( $options['language'] == "custom" ) {
$lang = str_replace("1", $rplc['n1'], $lang);
$lang = str_replace("2", $rplc['n2'], $lang);
$lang = str_replace("3", $rplc['n3'], $lang);
$lang = str_replace("4", $rplc['n4'], $lang);
$lang = str_replace("5", $rplc['n5'], $lang);
$lang = str_replace("6", $rplc['n6'], $lang);
$lang = str_replace("7", $rplc['n7'], $lang);
$lang = str_replace("8", $rplc['n8'], $lang);
$lang = str_replace("9", $rplc['n9'], $lang);
$lang = str_replace("0", $rplc['n0'], $lang);
$lang = str_replace('Muharram', $rplc['m1'], $lang);
$lang = str_replace('Safar', $rplc['m2'], $lang);
$lang = str_replace('Rabi I', $rplc['m3'], $lang);
$lang = str_replace('Rabi II', $rplc['m4'], $lang);
$lang = str_replace('Jumada I', $rplc['m5'], $lang);
$lang = str_replace('Jumada II', $rplc['m6'], $lang);
$lang = str_replace('Rajab', $rplc['m7'], $lang);
$lang = str_replace('Shaaban', $rplc['m8'], $lang);
$lang = str_replace('Ramadan', $rplc['m9'], $lang);
$lang = str_replace('Shawwal', $rplc['m10'], $lang);
$lang = str_replace('Dhu al-Qidah', $rplc['m11'], $lang);
$lang = str_replace('Dhu al-Hijjah', $rplc['m12'], $lang);
}

$lang = str_replace("11st", "11th", $lang);
$lang = str_replace("12nd", "12th", $lang);
$lang = str_replace("13rd", "13th", $lang);
return $lang;
}

function en_hijri_calendar() { include "calendarGEN.php"; }

function en_hijri_date() {
include "uCal2.class.php";
$d = new uCal2;

  $options = get_option("hcal_options");
  if (!is_array($options)) { $options = array( 'time_zone' => 'Asia/Dhaka', 'adjust_hour' => '24', 'language' => 'en', 'format' => '1' ); }

$tz = date_default_timezone_set($options['time_zone']);

$offset = $options['adjust_hour'] * 60 * 60;

if ($options['language'] == "en") {
if ($options['format'] == "1") { echo hcal_lang_rplc($d->date("jS F, Y", time()-$offset)) . " A.H."; }
elseif ($options['format'] == "2") { echo hcal_lang_rplc($d->date("jS F, Y", time()-$offset)); }
elseif ($options['format'] == "3") { echo hcal_lang_rplc($d->date("F jS, Y", time()-$offset)); }
elseif ($options['format'] == "4") { echo hcal_lang_rplc($d->date("Y F jS", time()-$offset)); }
elseif ($options['format'] == "5") { echo hcal_lang_rplc($d->date("j F Y", time()-$offset)); }
elseif ($options['format'] == "6") { echo hcal_lang_rplc($d->date("d F Y", time()-$offset)); }
elseif ($options['format'] == "7") { echo hcal_lang_rplc($d->date("Y F j", time()-$offset)); }
elseif ($options['format'] == "8") { echo hcal_lang_rplc($d->date("Y F d", time()-$offset)); }
elseif ($options['format'] == "9") { echo hcal_lang_rplc($d->date("d-m-Y", time()-$offset)); }
elseif ($options['format'] == "10") { echo hcal_lang_rplc($d->date("Y-m-d", time()-$offset)); }
else { echo hcal_lang_rplc($d->date("jS F, Y", time()-$offset)) . " A.H."; }
}

elseif ($options['language'] == "custom") {
if ($options['format'] == "1") { echo hcal_lang_rplc($d->date("j F, Y", time()-$offset)) . " A.H."; }
elseif ($options['format'] == "2") { echo hcal_lang_rplc($d->date("j F, Y", time()-$offset)); }
elseif ($options['format'] == "3") { echo hcal_lang_rplc($d->date("F j, Y", time()-$offset)); }
elseif ($options['format'] == "4") { echo hcal_lang_rplc($d->date("Y F j", time()-$offset)); }
elseif ($options['format'] == "5") { echo hcal_lang_rplc($d->date("j F Y", time()-$offset)); }
elseif ($options['format'] == "6") { echo hcal_lang_rplc($d->date("d F Y", time()-$offset)); }
elseif ($options['format'] == "7") { echo hcal_lang_rplc($d->date("Y F j", time()-$offset)); }
elseif ($options['format'] == "8") { echo hcal_lang_rplc($d->date("Y F d", time()-$offset)); }
elseif ($options['format'] == "9") { echo hcal_lang_rplc($d->date("d-m-Y", time()-$offset)); }
elseif ($options['format'] == "10") { echo hcal_lang_rplc($d->date("Y-m-d", time()-$offset)); }
else { echo hcal_lang_rplc($d->date("d F, Y", time()-$offset)) . " A.H."; }
}

}

function widget_hijri_calendar($args) {
extract($args);
  $options = get_option("hcal_options");
  if (!is_array($options)) { $options = array( 'wgt_title' => 'Hijri Calendar' ); } ?>
<?php echo $before_widget; ?>
<?php echo $before_title . $options['wgt_title'] . $after_title; ?>
<ul>
<?php echo do_shortcode('[en_hijri_calendar]'); ?>
</ul>
<?php echo $after_widget; ?>
<?php
}


if(is_admin())
	include 'hijri_calendar_admin.php';


register_sidebar_widget('Hijri Calendar', 'widget_hijri_calendar');
add_shortcode('en_hijri_date', 'en_hijri_date');
add_shortcode('en_hijri_calendar', 'en_hijri_calendar');

?>