<?php


 function UpdateFluxPost() {
$PlugNeditPosturl=admin_url();
global $post,$current_user;

if (current_user_can('unfiltered_html') && current_user_can('editor') || current_user_can('administrator') ){
if( isset($_GET['PlugNeditInsert'])  )  { 

$FluxPostingType=strtolower($_GET['PlugNeditInsert']);

if ( $FluxPostingType != 'post' && $FluxPostingType != 'page'  ) {
 echo 'Flux Editor Error: Code 5 ';
return;
 }
 
 $InsertFluxHTML = '<div id = "ICGDeepWrapper"></div>';
 
 if ($FluxPostingType=="page"){
 
  if ( isset($_GET['FluxthemeFull']) ){
 $InsertFluxHTML ='<div id = "ICGDeepWrapper" data-isvideobackgroundcreate="true"  data-isfluxthemecreate="true"></div>';
}
 
 if ( isset($_GET['Fluxthemeless']) ){
 $InsertFluxHTML ='<div id = "ICGDeepWrapper" data-isvideobackgroundcreate="true"></div>';
}
 
if( isset( $_GET['FluxvideoNew'] )){
  $InsertFluxHTML ='<div id = "ICGDeepWrapper" data-isvideobackgroundcreate="true"></div>';
 }
 
 if( isset( $_GET['FluxthemeNew'] )){
  $InsertFluxHTML ='<div id = "ICGDeepWrapper" data-isfluxthemecreate="true"></div>';
 }
 
 }

$PlugNedit_Insert_Post = array(
  'post_title'            => ' ',
  'post_status'           => 'draft', 
  'post_type'             => $FluxPostingType,
  'post_author'           => '', 
  'post_parent'           => 0,
  'menu_order'            => 0,
  'to_ping'               =>  '',
  'pinged'                => '',
  'post_password'         => '',
  'guid'                  => '',
  'post_content_filtered' => '',
  'post_excerpt'          => '',
  'import_id'             => 0,
  'post_content'          => $InsertFluxHTML,
);


$post_id = wp_insert_post( $PlugNedit_Insert_Post, true );

$PlugNeditPosturl = plugin_dir_url(__FILE__).'editor.php?pnepageurl='.get_permalink($post_id);
if (headers_sent()) {
echo  '<meta http-equiv="Location" content="'.$PlugNeditPosturl.'">';
}
else{
 header('Location: '. $PlugNeditPosturl);
}

exit;

}


if (!isset($_POST['FluxPageID']) ){ return;}


$isFluxPageID = intval( $_POST['FluxPageID'] );

if ( ! $isFluxPageID ) {
echo 'Flux Editor Error: Code 2 ';
exit;
}

if ( strlen( $isFluxPageID  ) > 8 ) {
echo 'Flux Editor Error: Code 3 ';
exit;
}

$PNEFluxPostType = strtolower($_POST['FluxType']);

if ($PNEFluxPostType == "trash"){
wp_trash_post($_POST['FluxPageID']); 
if (headers_sent()) {
echo  '<meta http-equiv="Location" content="'.$PlugNeditPosturl.'">';
}
else{
 header('Location: '. $PlugNeditPosturl);
}


exit;
}

else {
 
if ($PNEFluxPostType=='publish' || $PNEFluxPostType=='draft' || $PNEFluxPostType=='save' ){

if ($PNEFluxPostType=='publish' || $PNEFluxPostType=='draft' ){
  $PlugNedit_Update_Post = array (
      'ID'           => $_POST['FluxPageID'],
      'post_content' => $_POST['FluxPageContent'],
      'post_status'  =>  $PNEFluxPostType, 
  );
  
$PlugNeditPosturl = plugin_dir_url(__FILE__).'editor.php?pnepageurl='.$_POST['FluxReturnUrl'];
 
} 
else {
  
$PlugNedit_Update_Post = array (
      'ID'           => $_POST['FluxPageID'],
      'post_content' => $_POST['FluxPageContent'],
    
  );
  
$PlugNeditPosturl = get_post_permalink($_POST['FluxPageID']);

if ( strpos($PlugNeditPosturl, '?')  ){
 $PlugNeditPosturl = $PlugNeditPosturl.'&fluxdisplaymobile=1';
  } else {
   $PlugNeditPosturl = $PlugNeditPosturl.'?fluxdisplaymobile=1';
  
  }
}
   

wp_update_post( $PlugNedit_Update_Post );


}
}
   
if (isset($_POST['FluxAdmin']) && $_POST['FluxAdmin'] =='true' ){ $PlugNeditPosturl=$_POST['FluxReturnUrl'];}

echo "<script>window.location.href = '".$PlugNeditPosturl."';</script>";
exit;
}

}

add_action('init','UpdateFluxPost');
?>
