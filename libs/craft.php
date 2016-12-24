<?php
  class Craft {
    private static $instance;
    private $craft_suffix = '.craft.php';
    private $view_dir = '/views/def_view/';
    private $title;
    public $_props;

    private function __construct() {}

    /* Creates a Singleton instance of this class */
    public static function gI() {
      if(!isset(self::$instance)) {
        $cls = __CLASS__;
        self::$instance = new $cls;
      }
      return self::$instance;
    }

    /* Loads a particular View */
    public function craft($file) {
      $this->_cY = date('Y', time());
      $file = ABSPATH . $this->view_dir . $file . $this->craft_suffix;
      if(file_exists($file)) {
        if(isset($this->_props))
          $this->set_prop($this->_props);
        require($file);
      }
      //exit;
    }

    //Loads the Header
    private function getHomeHeader() {
      $this->craft('header');
    } 

    private function getDashHeader() {
      $this->craft('dashHead');
    }   

    //Loads the Header
    private function getHomeFooter() {
      $this->craft('footer');
    }

    /*  Loads the Model thats describes specific parts of a page */
    public static function getModel($model) {
      include(ABSPATH . $this->view_dir . 'air_default.php');
      if(array_key_exists($model, $air_model)) {
        return $air_model[$model];
      }
      return ' ';
    }

    /* Sets the page properties */
    public function set_prop(array $props) {
      foreach ($props as $key => $value) {
        $this->$key = $value;
      }
    }

    public function get($key) {
      return (isset($this->{$key}) && $this->{$key} != null) ? $this->{$key} : ' ';
    }



  }
?>
