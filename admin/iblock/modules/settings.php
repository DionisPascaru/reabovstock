<?

// полчим адрес раздела 
$pathSection = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$pathSection = str_replace( WS_PANEL , '{WS_PANEL}' , $pathSection );
$getSection = mysqli_query($db,"SELECT * FROM ws_menu_admin WHERE link = '".$pathSection."'"); 
$Section = mysqli_fetch_assoc($getSection);
$_params['table'] = $Section['assoc_table'];
$_params['title'] = $Section['title'];
$_params['access'] = $Section['access'];
$_params['num_page'] = $Section['num_page'];
$_params['access_delete'] = $Section['access_delete'];
$_params['page_id'] = $Section['page_id'];

// параметры раздела 
$getSectionParams = mysqli_query($db,"SELECT * FROM ws_menu_admin_settings WHERE section_id = ".$Section['id']);
while($SectionParam = mysqli_fetch_assoc($getSectionParams)){
    $SectionParam['value'] = str_replace( '{WS_PANEL}' , WS_PANEL ,  $SectionParam['value'] );
    $_params[$SectionParam['param']] = $SectionParam['value'];
}
if (isset($_GET['id'])) {$id = (int)$_GET['id'];}else{$id = 0;} 
if (isset($_GET['parent'])) {$parent = (int)$_GET['parent'];}else{$parent = 0;} 

?>