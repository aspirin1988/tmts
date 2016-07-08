<?php

/*
Loads menu bar and editor information.
*/



function create_plugneditbar_menu() {
global $post,$current_user;

if (current_user_can('unfiltered_html') && current_user_can('editor') || current_user_can('administrator') ){
global $wp_admin_bar;
$menu_id = 'Flux Editor';
$PNEpostnew =  admin_url('admin.php?PlugNeditInsert=post');
$PNEpagenew =  admin_url('admin.php?PlugNeditInsert=page');
$Fluxthemeless =  admin_url('admin.php?PlugNeditInsert=page&Fluxthemeless=true');
$Fluxvideonew =  admin_url('admin.php?PlugNeditInsert=page&FluxvideoNew=true');
$Fluxthemenew =  admin_url('admin.php?PlugNeditInsert=page&FluxthemeNew=true');
$Fluxthemefull =  admin_url('admin.php?PlugNeditInsert=page&FluxthemeFull=true');
$wp_admin_bar->add_menu(array( 'class' =>  'ab-item', 'id' => $menu_id, 'title' => __('Simply Symphony'), ''));   
global $post;



if (have_posts() ){
$pnecheckpost = $post->post_content;

if ( is_singular($post)  &&  preg_match('/PlugNeditFluxEditor/i', $pnecheckpost)){
$PNEpageUpdate =  admin_url('admin.php?page=plugnedit/pneupdate.php');
$loadpne=plugin_dir_url(__FILE__).'editor.php?pnepageurl='.get_permalink(get_the_ID());
$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('<span style="color:red"> Edit Simply Symphony Page </span>'), 'id' => 'Flux-Editor-load', 'href' =>  $loadpne, 'class' =>  'ab-item'));

echo '<script>window.addEventListener("load", function(){if(document.getElementById("PNE-editor")) {document.getElementById("PNE-editor").style.display="none"}}, false);</script>';

}

} else { 

if (isset($_GET['post']) && is_numeric($_GET['post']) &&  preg_match('/PlugNeditFluxEditor/i',get_post_field('post_content', $_GET['post']))){ 

add_filter( 'user_can_richedit' , '__return_false', 50 );

$loadpne=plugin_dir_url(__FILE__).'editor.php?pnepageurl='.get_permalink($_GET['post']);
$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('<span style="color:red"> Edit Flux Page </span>'), 'id' => 'Flux-Editor-load2', 'href' =>  $loadpne));

$fluxadminscript=plugin_dir_url(__FILE__).'js/adminscript.js';


echo '<script>window.fluxdirpath="'.plugin_dir_url(__FILE__).'";window.fluxloadpage="'.$loadpne.'";</script><script src='.$fluxadminscript.'></script>';


}
}

  
$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('New Post'), 'id' => 'Flux-Editor-Post',  'href' =>  $PNEpostnew));
$wp_admin_bar->add_menu(array('parent' => $menu_id, 'title' => __('New page'), 'id' => 'Flux-Editor-Page',  'href' =>  $PNEpagenew));




}
}

add_action('admin_bar_menu', 'create_plugneditbar_menu' , 200);
if( isset($_GET['PNENoWPToolbars'])  )  { show_admin_bar( false ); } 

add_action( 'wp_head', 'PNEFluxFooter_header' );

function PNEFluxFooter_header(){
add_option( 'FluxMinWidth', '968');
global $post;
if (have_posts() ){
$pnecheckpost = $post->post_content;

if ( preg_match('/PlugNeditFluxEditor/i', $pnecheckpost) && !isset($_GET['PNENoWPToolbars'])){
  if(!wp_is_mobile()){
echo '<style> body { min-width: '.get_option("FluxMinWidth").'px !important;}</style>';
} else{
echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
}

 }
}
}


function PNEFluxFooter_footer(){
global $post,$current_user;
if (!have_posts() ){
have_posts();
 }
if (have_posts() ){
$pnecheckpost = $post->post_content;
echo '<!-- Flux Footer -->';
if (current_user_can('unfiltered_html') && current_user_can('editor') || current_user_can('administrator') ){

if ( preg_match('/PlugNeditFluxEditor/i', $pnecheckpost) && isset($_GET['PNENoWPToolbars']) ||  preg_match('/ICGDeepWrapper/i', $pnecheckpost)  && isset($_GET['PNENoWPToolbars'])){

echo '<input type="hidden" id="PNEFluxGallerURL" value="'. get_site_url().'?pneFluxNoTheme=gallery">';
echo '<input type="hidden" id="PNEFluxSiteurl" value="'. get_site_url().'">';
echo '<input type="hidden" id="PNEFluxAdminurl" value="'.get_edit_post_link().'">';
echo '<input type="hidden" id="PNEFluxupdateURL" value="'.admin_url("admin.php?page=plugnedit/pneupdate.php").'">';
echo '<input type="hidden" id="PNEFluxPluginDir" value="'.plugin_dir_url(__FILE__).'">';
echo '<input type="hidden" id="PNEFluxID" value="'.get_the_ID().'">';
echo '<input type="hidden" id="PNEFluxInlinePath" value="'.plugin_dir_url(__FILE__).'js/ckeditor/ckeditor.js">';
echo '<input type="hidden" id="PNEFluxInlineFullPath" value="'.plugin_dir_url(__FILE__).'js/ckeditorfull/ckeditor/ckeditor.js">';
echo '<input type="hidden" id="LoadCKEDITOR" value="'.get_option( 'CKEditortoFlux' ).'">';
echo '<input type="hidden" id="LoadJSCOLOR" value="'.get_option( 'JSColortoFlux' ).'">';


if( isset($PNEpageUpdate)  )  { 
echo '<input type="hidden" id="UpdateFluxURL" value="'.$PNEpageUpdate.'">';
echo '<input type="hidden" id="UpdateFluxValue" value="'.get_the_ID().'">';
 } }}}} 
  
 add_action( 'wp_footer', 'PNEFluxFooter_footer' );


?>
