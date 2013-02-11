<?php

add_action( 'admin_menu', 'hijri_calendar_admin' );

function hijri_calendar_admin() {
add_options_page( 'Hijri Calendar Plugin Options', 'Hijri Calendar',
'manage_options', 'hijri_calendar_admin_page', 'hijri_calendar_plugin_options' );
}

function hijri_calendar_plugin_options() {
if ( !current_user_can( 'manage_options' ) )  {
wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}

echo '<div class="wrap">' ?> <?php screen_icon(); ?><h2>Hijri Calendar Plugin Options</h2>
<br/>
<div class="postbox" style="display: block;width:350px;float:left;margin:10px;clear:left;">
	<h3 class="hndle" style="padding:5px;"><span>About "Hijri Calendar" Plugin</span></h3>
<div class="inside"><p align="justify">"Hijri Calendar" is a simple and easy to use wordpress plugin that allows you to show current hijri date (according to hijri calendar) anywhere in your very own wordpress blog.</p><div style="text-align: right;"><a href="http://facebook.com/islamicmediabd"><img src="http://i-onlinemedia.net/images/find-us-on-facebook.png" alt="Join with us"></a></div></div></div>

<div class="postbox" style="display: block;float:left;margin:10px;clear:left;">
	<h3 class="hndle" style="padding:5px;"><span>Widget Usage Instructions</span></h3>
<div class="inside">
To use Hijri Calendar widget, go to "Appearance > Widgets". Just drag and drop Hijri Calendar widget on your theme's sidebar. Thats all!
</div></div>

<div class="postbox" style="display: block;float:left;margin:10px;clear:left;">
	<h3 class="hndle" style="padding:5px;"><span>Shortcode Usage Instructions</span></h3>
<div class="inside">
<p> <b>Put these shortcodes in your blog post/page:</b><br/>

- Show current date according to hijri calendar: <code><span style="color: #000000"><span style="color: #0000BB"> &#91;en_hijri_date&#93;</span></span></code><br/>
<br/>
- Show monthly hijri calendar: <code><span style="color: #000000"><span style="color: #0000BB"> &#91;en_hijri_calendar&#93;</span></span></code><br/>
</p><p>
<b> Or, insert these php codes in your sidebar or any other template file:</b><br/>
<br/>
- Show current date according to hijri calendar: <code><span style="color: #000000"><span style="color: #0000BB">   &#60;&#63;php echo do_shortcode&#40;&#39;&#91;en_hijri_date&#93;&#39;&#41;; </span><span style="color: #0000BB">&#63;&#62;</span></span>
</code><br/>
<br/>
- Show monthly hijri calendar: <code><span style="color: #000000"><span style="color: #0000BB">   &#60;&#63;php echo do_shortcode&#40;&#39;&#91;en_hijri_calendar&#93;&#39;&#41;; </span><span style="color: #0000BB">&#63;&#62;</span></span>
</code><br/>
</p></div></div>
<div class="postbox" style="display: block;float:left;margin:10px;clear:left;">
<div class="inside">
<b>Credits:</b><br/>
<p>  Developer: <a href="http://facebook.com/imran2w">M.A. IMRAN</a></p><p>  E-Mail: imran2w@gmail.com</p>
<p>  Website: <a href="http://www.i-onlinemedia.net">www.i-onlinemedia.net</a></p>
<b>License:</b><br/>
<p align="justify">    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA</p>
</div></div>
</div>
<?php
}

?>