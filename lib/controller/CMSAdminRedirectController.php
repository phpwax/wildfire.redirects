<?php

class CMSAdminRedirectController extends AdminComponent{

  public $module_name = "redirect";
  public $model_class = 'WildfireUrlMap';
  public $display_name = "Redirects";
  public $dashboard = false;
  public $singular = "Item";
  public $filter_fields=array(
                          'text' => array('columns'=>array('origin_url', 'title', 'destination_url'), 'partial'=>'_filters_text', 'fuzzy'=>true)
                        );

  protected function events(){
    parent::events();
    //always add in the track_url filter
    WaxEvent::add("cms.model.init", function(){
      $obj = WaxEvent::data();
      $obj->model = new $obj->model_class($obj->model_scope);
      $obj->model->filter("track_url", 1);
    });
    //anything saved in the cms should be track_url=1
    WaxEvent::add("cms.save.before", function(){
      $obj = WaxEvent::data();
      $obj->model->track_url = 1;
      if(!$obj->date_start) $obj->date_start = date("Y-m-d");
      if(!$obj->date_end) $obj->date_end = date("Y-m-d", strtotime("-10 years"));
    });

  }
}

?>