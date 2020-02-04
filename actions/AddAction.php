<?php


class AddAction
{

    public $plugin   ;
    public $pluginRoot   ;
    public $menu_args   ;

    public function __construct()
    {
        $this->plugin = $GLOBALS['plugin_base'];
        $this->pluginRoot = plugin_dir_path($this->plugin);
    }

    public function addInitAction()
    {
        //  add_action( 'init', [$this, 'addPostType'] );

        add_action('admin_menu', array($this, 'addAdminMenu'));
        add_action('admin_enqueue_scripts', array($this, 'addCss_and_JS'));

        add_filter('plugin_action_links_'.$this->plugin, [$this, 'settings_link']);

    }

    /**
     * Admin Menu hook
     *
     * @return void
     */
    public function addAdminMenu() {
        $this->registerMenu();
        $this->registerSubMenu();
    }


    public function registerMenu()
    {
        add_menu_page(
            __('BotNinja', 'Dashboard'),
            'BotNinja',
            'manage_options',
            'Bot-Ninja-Page',
            [$this, 'admin_index'],
            'dashicons-admin-site',
            100
        );
     }

    /**
     * Register submenu
     * @return void
     */
    public function registerSubMenu() {
        add_submenu_page(
            'Bot-Ninja-Page',
            'Purchase Phone No.',
            'Purchase Phone No.',
            'manage_options',
            'BotNinja',
            array($this, 'submenu_page_callback')
        );
    }

    /**
     * Render submenu
     * @return void
     */
    public function submenu_page_callback() {
        echo '<div class="wrap">';
        echo '<h2>Submenu title</h2>';
        echo '</div>';
    }

    public function settings_link($links)
    {

        $settings_link = "<a href='admin.php?page=Bot-Ninja-Page'> Settings </a>";
        array_push($links, $settings_link) ;
        return $links;
    }


    public function admin_index()
    {
        require_once plugin_dir_path(__FILE__) . '../templates/admin.php';
    }


    function addCss_and_JS()
    {
        wp_enqueue_script( 'botNinjaStyle', plugins_url($this->pluginRoot). 'assets/index.js', array(), '1.0.0', true );
        wp_enqueue_style( 'botNinjaStyle', plugins_url($this->pluginRoot). 'assets/style.css', array(), '1.0.0', true );

    }


    public function addPostType()
    {
        register_post_type('BotNinja', [
            'label' => 'BotNinja',
            'public' => true,
            'show_ui' => true,
            'rewrite' => [
                'slug' => 'news'
            ]
        ]);

        flush_rewrite_rules();
    }


}

