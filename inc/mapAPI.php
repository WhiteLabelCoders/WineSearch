<?php

namespace WPC;

class Widget_Loader {

    private static $_instance = null;

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function include_widgets_files()
    {
        require_once(__DIR__ . '/widgets/map.php');
    }

    public function register_widgets()
    {	
        $this->include_widgets_files();
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Map());
    }

    public function __construct() 
    {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
    }
}

Widget_Loader::instance();