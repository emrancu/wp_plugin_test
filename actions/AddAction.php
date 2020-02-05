<?php

class AddAction
{

    public $plugin   ;
    public $pluginRoot   ;
    public $namespace ;
    public function __construct()
    {
        $this->namespace = 'BotNinja/v1' ;
        $this->plugin = $GLOBALS['plugin_base'];
        $this->pluginRoot = plugin_dir_path($this->plugin);
    }

    public function addInitAction()
    {
        add_action('admin_enqueue_scripts', array($this, 'addCss_and_JS'));
        add_filter('plugin_action_links_'.$this->plugin, [$this, 'settings_link']);


    }




    public function settings_link($links)
    {

        $settings_link = "<a href='admin.php?page=Bot-Ninja-Page'> Settings </a>";
        array_push($links, $settings_link) ;
        return $links;
    }


    function addCss_and_JS($hook)
    {

        if ( 'toplevel_page_BotNinja' == $hook ) {
            wp_enqueue_script('botNinjaScriptVue', 'https://cdn.jsdelivr.net/npm/vue', array(), '1.0.0', false);
            wp_enqueue_script('botNinjaScriptVueRouter', 'https://cdnjs.cloudflare.com/ajax/libs/vue-router/2.3.0/vue-router.js', array(), '1.0.0', false);
            wp_enqueue_script('botNinjaScriptVueX', 'https://unpkg.com/vuex@latest', array(), '1.0.0', false);

            wp_enqueue_style('botNinjaStyleBootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '1.0.0', false);
            wp_enqueue_script('botNinjaScriptBootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '1.0.0', true);
            wp_enqueue_script('botNinjaScriptIndex', plugins_url($this->pluginRoot) . 'assets/index.js', array(), '1.0.0', true);
            wp_enqueue_style('botNinjaStyleIndex', plugins_url($this->pluginRoot) . 'assets/style.css', array(), '1.0.0', 'all');

            wp_enqueue_script('botNinjaStyleVueStore', plugins_url($this->pluginRoot) . 'assets/vueComponent/store.js', array(), '1.0.0', true);
            wp_enqueue_script('botNinjaStyleVueActions', plugins_url($this->pluginRoot) . 'assets/vueComponent/vueActions.js', array(), '1.0.0', true);
            wp_enqueue_script('botNinjaStyleVueApp', plugins_url($this->pluginRoot) . 'assets/vueComponent/vueApp.js', array(), '1.0.0', true);
        }
    }


}

