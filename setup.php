<?
CMSApplication::register_module("redirect", array("display_name"=>"Redirects", "link"=>"/admin/redirect/"));


AutoLoader::register_view_path("plugin", __DIR__."/view/");
AutoLoader::register_controller_path("plugin", __DIR__."/lib/controller/");
AutoLoader::register_controller_path("plugin", __DIR__."/resources/app/controller/");
AutoLoader::$plugin_array[] = array("name"=>"wildfire.redirects","dir"=>__DIR__);

?>