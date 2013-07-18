<?php
function get_serverinfo_x2() {
        global $wpdb;
        $sqlversion = $wpdb->get_var("SELECT VERSION() AS version");
        $mysqlinfo = $wpdb->get_results("SHOW VARIABLES LIKE 'sql_mode'");
        if (is_array($mysqlinfo)) $sql_mode = $mysqlinfo[0]->Value;
        if (empty($sql_mode)) $sql_mode = __('Not set');
        $sm = ini_get('safe_mode');
        if (strcasecmp('On', $sm) == 0) { $safe_mode = __('On'); }
        else { $safe_mode = __('Off'); }
        if(ini_get('allow_url_fopen')) $allow_url_fopen = __('On');
        else $allow_url_fopen = __('Off');
        if(ini_get('upload_max_filesize')) $upload_max = ini_get('upload_max_filesize');
        else $upload_max = __('N/A');
        if(ini_get('post_max_size')) $post_max = ini_get('post_max_size');
        else $post_max = __('N/A');
        if(ini_get('max_execution_time')) $max_execute = ini_get('max_execution_time');
        else $max_execute = __('N/A');
        if(ini_get('memory_limit')) $memory_limit = ini_get('memory_limit');
        else $memory_limit = __('N/A');
        if (function_exists('memory_get_usage')) $memory_usage = round(memory_get_usage() / 1024 / 1024, 2) . __(' MByte');
        else $memory_usage = __('N/A');
        if (is_callable('exif_read_data')) $exif = __('Yes'). " ( V" . substr(phpversion('exif'),0,4) . ")" ;
        else $exif = __('No');
        if (is_callable('iptcparse')) $iptc = __('Yes');
        else $iptc = __('No');
        if (is_callable('xml_parser_create')) $xml = __('Yes');
        else $xml = __('No');

?>
        <li><?php _e('Operating System'); ?> : <strong><?php echo PHP_OS; ?></strong></li>
        <li><?php _e('Server'); ?> : <strong><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></strong></li>
        <li><?php _e('Memory usage'); ?> : <strong><?php echo $memory_usage; ?></strong></li>
        <li><?php _e('MYSQL Version'); ?> : <strong><?php echo $sqlversion; ?></strong></li>
        <li><?php _e('SQL Mode'); ?> : <strong><?php echo $sql_mode; ?></strong></li>
        <li><?php _e('PHP Version'); ?> : <strong><?php echo PHP_VERSION; ?></strong></li>
        <li><?php _e('PHP Safe Mode'); ?> : <strong><?php echo $safe_mode; ?></strong></li>
        <li><?php _e('PHP Allow URL fopen'); ?> : <strong><?php echo $allow_url_fopen; ?></strong></li>
        <li><?php _e('PHP Memory Limit'); ?> : <strong><?php echo $memory_limit; ?></strong></li>
        <li><?php _e('PHP Max Upload Size'); ?> : <strong><?php echo $upload_max; ?></strong></li>
        <li><?php _e('PHP Max Post Size'); ?> : <strong><?php echo $post_max; ?></strong></li>
        <li><?php _e('PHP Max Script Execute Time'); ?> : <strong><?php echo $max_execute; ?>s</strong></li>
        <li><?php _e('PHP Exif support'); ?> : <strong><?php echo $exif; ?></strong></li>
        <li><?php _e('PHP IPTC support'); ?> : <strong><?php echo $iptc; ?></strong></li>
        <li><?php _e('PHP XML support'); ?> : <strong><?php echo $xml; ?></strong></li>
<?php
}
?>

<div class="wrap"><h2><img src="<?php echo WP_PLUGIN_URL; ?>/hijri-calendar/images/icon3.png" alt="i"> Server Information</h2>
<br/><div style="width: 65%; float: left;">

<div class="postbox" style="display: block;float:left;margin:5px;clear:left; width: 99%;">
	<h3 class="hndle" style="padding:5px;"><span>Server/System Information</span></h3>
<div class="inside">
<ul><?php echo get_serverinfo_x2(); ?></ul>
</div></div>

<div class="postbox" style="display: block;float:left;margin:5px;clear:left; width: 99%;">
<div class="inside">
<p align="justify">- SQL Mode (sql_mode) is a MySQL system variable. By means of this variable the MySQL Server SQL Mode is controlled. Many operational characteristics of MySQL Server can be configured by setting the SQL Mode. By setting the SQL Mode appropriately, a client program can instruct the server how strict or forgiving to be about accepting input data, enable or disable behaviors relating to standard SQL conformance, or provide better compatibility with other database systems. By default, the server uses a sql_mode value of  \' \'  (the empty string), which enables no restrictions. Thus, the server operates in forgiving mode (non-strict mode) by default. In non-strict mode, the MySQL server converts erroneous input values to the closest legal values (as determined from column definitions) and continues on its way.</p>
<p align="justify">- The PHP Safe Mode (safe_mode) is an attempt to solve the shared-server security problem. It is architecturally incorrect to try to solve this problem at the PHP level, but since the alternatives at the web server and OS levels aren\'t very realistic, many people, especially ISP\'s, use safe mode for now.</p>
<p align="justify">- PHP allow_url_fopen option, if enabled (allows PHP\'s file functions - such as \'file_get_contents()\' and the \'include\' and \'require\' statements), can retrieve data from remote locations, like an FTP or web site, which may pose a security risk.</p>
<p align="justify">- PHP memory_limit option sets the maximum amount of memory in bytes that a script is allowed to allocate. By enabling a realistic memory_limit you can protect your applications from certain types of Denial of Service attacks, and also from bugs in applications (such as infinite loops, poor use of image based functions, or other memory intensive mistakes).</p>
<p align="justify">- PHP upload_max_filesize option limits the maximum size of files that PHP will accept through uploads. Attackers may attempt to send grossly oversized files to exhaust your system resources; by setting a realistic value here you can mitigate some of the damage by those attacks.</p>
<p align="justify">- PHP post_max_size option limits the maximum size of the POST request that PHP will process. Attackers may attempt to send grossly oversized POST requests to exhaust your system resources; by setting a realistic value here you can mitigate some of the damage by those attacks.</p>
<p align="justify">- PHP max_execution_time option sets the maximum time in seconds a script is allowed to run before it is terminated by the parser. This helps prevent poorly written scripts from tying up the server.</p>
<p align="justify">- PHP exif extension enables you to work with image meta data. For example, you may use exif functions to read meta data of pictures taken from digital cameras by working with information stored in the headers of the JPEG and TIFF images.</p>
<p align="justify">- IPTC data is a method of storing textual information in images defined by the International Press Telecommunications Council. It was developed for press photographers who need to attach information to images when they are submitting them electronically but it is useful for all photographers. It provides a standard way of storing information such as captions, keywords, location. Because the information is stored in the image in a standard way this information can be accessed by other IPTC aware applications.</p>
<p align="justify">- XML (eXtensible Markup Language) is a data format for structured document interchange on the Web. It is a standard defined by the World Wide Web Consortium (W3C).</p>
</div></div>

</div>

<?php echo hijri_calendar_sidebar(); ?>
</div>