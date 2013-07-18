<?php

//set here font, background etc for the calendar
$fontfamily = isset($fontfamily) ? $fontfamily : "Verdana";
$defaultfontcolor = isset($defaultfontcolor) ? $defaultfontcolor : "#000000";
$defaultbgcolor = isset($defaultbgcolor) ? $defaultbgcolor : "#E0E0E0";
$defaultwbgcolor = isset($defaultwbgcolor) ? $defaultwbgcolor : "#F5F4D3";
$todayfontcolor = isset($todayfontcolor) ? $todayfontcolor : "#000000";
$todaybgcolor = isset($todaybgcolor) ? $todaybgcolor : "#F2BFBF";
$monthcolor = isset($monthcolor) ? $monthcolor : "#000000";
$relfontsize = isset($relfontsize) ? $relfontsize : "1";
$cssfontsize = isset($cssfontsize) ? $cssfontsize : "7pt";

// obtain month, today date etc
$month = (isset($month)) ? $month : gmdate("n",time());
$monthnames = array("January","February","March","April","May","June","July","August","September","October","November","December");
$textmonth = $monthnames[$month - 1];
$year = (isset($year)) ? $year : gmdate("Y",time());
$today = (isset($today))? $today : gmdate("j", time());
$today = ($month == gmdate("n",time())) ? $today : 32;

// The Names of Hijri months
$mname = array("Muharram","Safar","Rabi'ul Awal","Rabi'ul Akhir","Jamadil Awal","Jamadil Akhir","Rajab","Sha'ban","Ramadhan","Shawwal","Zul Qida","Zul Hijja");
// End of the names of Hijri months

// Setting how many days each month has
if ( (($month <8 ) && ($month % 2 == 1)) || (($month > 7) && ($month % 2 ==
0)) ) $days = 31;
if ( (($month <8 ) && ($month % 2 == 0)) || (($month > 7) && ($month % 2 ==
1)) )
$days = 30;

//checking leap year to adjust february days
if ($month == 2)
$days = (gmdate("L",time())) ? 29 : 28;

$dayone = gmdate("w",mktime(1,1,1,$month,1,$year));
$daylast = gmdate("w",mktime(1,1,1,$month,$days,$year));
$middleday = intval(($days-1)/2);

//checking the hijri month on beginning of gregorian calendar
$date_hijri = gmdate("$year-$month-1");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
$smon_hijridone = $mname[$HMonths-1];
$syear_hijridone = $HYear;

//checking the hijri month on end of gregorian calendar
$date_hijri = gmdate("$year-$month-$days");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
$smon_hijridlast = $mname[$HMonths-1];
$syear_hijridlast = $HYear;
//checking the hijri month on middle of gregorian calendar
$date_hijri = gmdate("$year-$month-$middleday");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
$smon_hijridmiddle = $mname[$HMonths-1];
$syear_hijridmiddle = $HYear;

// checking if there's a span of a year
if ($syear_hijridone == $syear_hijridlast) {
$syear_hijridone = "";
}

//checking if span of month is only one or two or three hijri months
if (($smon_hijridone == $smon_hijridmiddle) AND ($smon_hijridmiddle == $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridlast."</font>";
}

if (($smon_hijridone == $smon_hijridmiddle) AND ($smon_hijridmiddle != $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone."".$syear_hijridone." - ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}
if (($smon_hijridone != $smon_hijridmiddle) AND ($smon_hijridmiddle == $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone."".$syear_hijridone." - ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}

if (($smon_hijridone != $smon_hijridmiddle) AND ($smon_hijridmiddle != $smon_hijridlast)) {
$smon_hijri = "<font color=red>".$smon_hijridone." ".$syear_hijridone." - "." - ".$smon_hijridmiddle." - ".$smon_hijridlast." ".$syear_hijridlast."</font>";
}
// next part of code generates calendar
?>

<div align="center">
<center><table border="0" cellpadding="0" cellspacing="1" width="100%"
bgcolor='black'>
<tr>
<td valign="top" align="center">
<table border="1" cellpadding="0" cellspacing="0" width="100%"
bgcolor='white'
valign='top'>
<tr>
<td bgcolor="#C6D4E5" colspan="7" align="center"><font color="<?php echo
$monthcolor ?>" face="Verdana" size="1"><b><?php echo
$textmonth." ".$year."<br />".$smon_hijri
?></b></font></td>
</tr>
<tr>
<td bgcolor="<?php echo $defaultwbgcolor; ?>" valign="middle" align="center"
width="15%"><font face="<?php echo $fontfamily; ?>"
size="1"><b> S </b></font></td>
<td bgcolor="<?php echo $defaultwbgcolor; ?>" valign="middle" align="center"
width="14%"><font face="<?php echo $fontfamily; ?>"
size="1"><b> M </b></font></td>
<td bgcolor="<?php echo $defaultwbgcolor; ?>" valign="middle" align="center"
width="14%"><font face="<?php echo $fontfamily; ?>"
size="1"><b> T </b></font></td>
<td bgcolor="<?php echo $defaultwbgcolor; ?>" valign="middle" align="center"
width="14%"><font face="<?php echo $fontfamily; ?>"
size="1"><b> W </b></font></td>
<td bgcolor="<?php echo $defaultwbgcolor; ?>" valign="middle" align="center"
width="14%"><font face="<?php echo $fontfamily; ?>"
size="1"><b> T </b></font></td>
<td bgcolor="<?php echo $defaultwbgcolor; ?>" valign="middle" align="center"
width="14%"><font face="<?php echo $fontfamily; ?>"
size="1"><b> F </b></font></td>
<td bgcolor="<?php echo $defaultwbgcolor; ?>" valign="middle" align="center"
width="15%"><font face="<?php echo $fontfamily; ?>"
size="1"><b> S </b></font></td>
</tr>
<?php

if($dayone != 0)
$span1 = $dayone;
if(6 - $daylast != 0)
$span2 = 6 - $daylast;

for($i = 1; $i <= $days; $i++):
$dayofweek = gmdate("w",mktime(1,1,1,$month,$i,$year));
$width = "14%";

if($dayofweek == 0 || $dayofweek == 6)
$width = "15%";

if($i == $today):
$fontcolor = $todayfontcolor;
$bgcellcolor = $todaybgcolor;
endif;
if($i != $today):
$fontcolor = $defaultfontcolor;
$bgcellcolor = $defaultbgcolor;
endif;
$x = strlen($i);
if ($x == 1){ $b = "0".$i;}
if ($x == 2){ $b = $i;}

$x = strlen($month);
if ($x == 1){ $c = "0".$month;}
if ($x == 2){ $c = $month;}
$data=$year."-".$c."-".$b;

if($i == 1 || $dayofweek == 0):
echo " <tr bgcolor=\"$defaultbgcolor\">\n";
if($span1 > 0 && $i == 1)
echo " <td align=\"left\" bgcolor=\"#999999\"
colspan=\"$span1\"><font face=\"null\" size=\"1\"></font></td>\n";
endif;
?>
<td bgcolor="<?php echo $bgcellcolor; ?>" valign="middle" align="center"
width="<?php echo $width; ?>">
<?php
?><font color="<?php echo $fontcolor; ?>" face="<?php echo $fontfamily; ?>" size="1"><?php

$date_hijri = gmdate("$year-$month-$i");
list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
if ($HDays == 30) {
 $i = $i + 1;
 $date_hijri = gmdate("$year-$month-$i");
 list ($HDays, $HMonths, $HYear) = Hijri($date_hijri);
 if ($HDays == 2) {
 $HDays = 1;
 }
 else {
 $HDays = 30;
 }
 $i = $i - 1;
 }

 $sday_hijri = $i."<br/><font color=red>".$HDays."</font>";
// display da data
echo $sday_hijri;
?>
</td>
<?php
if($i == $days):
if($span2 > 0)
echo " <td align=\"left\" bgcolor=\"#999999\"
colspan=\"$span2\"><font face=\"null\" size=\"1\"></font></td>\n";
endif;
if($dayofweek == 6 || $i == $days):
echo " </tr>\n";
endif;
endfor;
$ano = str_replace("20", "", $year);

$x = strlen($today);
if ($x == 1){ $b = "0".$today;}
if ($x == 2){ $b = $today;}
//echo $b;
$x = strlen($month);
if ($x == 1){ $c = "0".$month;}
if ($x == 2){ $c = $month;}
//echo $c;

$data=$year.$c.$b;

function Hijri($GetDate)
 {

$TDays=round(strtotime($GetDate)/(60*60*24));
$HYear=round($TDays/354.37419);
$Remain=$TDays-($HYear*354.37419);
$HMonths=round($Remain/29.531182);
$HDays=$Remain-($HMonths*29.531182);
$HYear=$HYear+1389;
$HMonths=$HMonths+10;
$HDays=$HDays+23;

// If the days is over 29, then update month and reset days
if ($HDays>29.531188 and round($HDays)!=30)
{
$HMonths=$HMonths+1;
$HDays=Round($HDays-29.531182);
}

else
{
$HDays=Round($HDays);
}

// If months is over 12, then add a year, and reset months
if($HMonths>12)
{
$HMonths=$HMonths-12;
$HYear=$HYear+1;
}

 return array ($HDays, $HMonths, $HYear);

// end of Hijri Conversion function
}

echo "</table>
</td>
</tr>

</td></tr>

</table>";
?>