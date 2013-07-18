<?php
/*
Plugin Name: Hijri Calendar
Plugin URI: http://i-onlinemedia.net/
Description: "Hijri Calendar" is a simple and easy to use plugin that allows you to show hijri/islamic date according to hijri calendar, anywhere in your blog!
Author: M.A. IMRAN
Version: 2.1
Author URI: http://facebook.com/imran2w
*/

function en_hijri_calendar() {
include "calendarGEN.php";

}

function en_hijri_date() {
include "uCal2.class.php";
$d = new uCal2;

$hijri_calendar_option1 = get_option('hijri_calendar_option1');
if ($hijri_calendar_option1 == "") { $hijri_calendar_option1 = "0"; }
$hdoffset = $hijri_calendar_option1 * 60 * 60;

$Hmonth = $d->date("M", time()-$hdoffset);

if($Hmonth == "Muh") {$Hmonth = "Muharram";}
elseif($Hmonth == "Saf") {$Hmonth = "Safar"; }
elseif($Hmonth == "Rb1") {$Hmonth = "Rabi'ul Awal";}
elseif($Hmonth == "Rb2") {$Hmonth = "Rabi'ul Akhir";}
elseif($Hmonth == "Jm1") {$Hmonth = "Jamadil Awal";}
elseif($Hmonth == "Jm2") {$Hmonth = "Jamadil Akhir";}
elseif($Hmonth == "Raj") {$Hmonth = "Rajab";}
elseif($Hmonth == "Shb") {$Hmonth = "Sha'ban";}
elseif($Hmonth == "Rmd") {$Hmonth = "Ramadan";}
elseif($Hmonth == "Shw") {$Hmonth = "Shawaal";}
elseif($Hmonth == "DhQ") {$Hmonth = "Zul Qida";}
elseif($Hmonth == "DhH") {$Hmonth = "Zul Hijja";}

$en_hijridate = $d->date("jS", time()-$hdoffset) . " " . $Hmonth . ", " . $d->date("Y", time()-$hdoffset) . " A.H.";
return $en_hijridate;
}


function widget_hijri_calendar($args) {
extract($args);
?>
<?php echo $before_widget; ?>
<?php echo $before_title . 'Hijri Calendar' . $after_title; ?>
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