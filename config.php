<?php


$config = Array();


$config['w2box_title'] = "";

$config['storage_path'] = "data";

$config['max_filesize'] = 50000; // MBytes

$config['allowed_ext'] = array("gif","jpg","jpeg","png","pdf","wma","mp4","mp3","cpp","txt","doc","rtf","zip","7z","mp3");
//aqui se muestran los formatos disponibles para subir al servidor 
$config['delete_after'] = 0;

$config['disable_directlink'] = false;

$config['allow_overwrite'] = false;

$config['confirm_delete'] = false;

$config['show_warning'] = false;

$config['utf8encode_directlink'] = false;

$config['enable_folder_maxdepth'] = 3;


$config['upload_progressbar']=false;

$config['upload_cgiscript']=rooturl()."upload.cgi";

$config['upload_tmpdir']="tmp";



$config['admin_actived'] = false;

$config['admin_username'] = "admin";

$config['admin_password'] = "w2pass";

$config['protect_upload'] = true;

$config['hide_upload'] = true;

$config['protect_delete'] = true;

$config['hide_delete'] = true;

$config['protect_makedir'] = true;

$config['hide_makedir'] = true;


$config['log'] = false;

$config['log_filename'] = "w2box.log";

$config['log_upload'] = true;

$config['log_delete'] = true;

$config['log_download'] = false;

require("lang/index.php");
?>