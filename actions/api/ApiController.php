<?php


class ApiController
{

    public function init(){
        add_action( 'rest_api_init', [$this, 'activeApi'] );
    }

    public function activeApi(){
        $this->registerDashboardRoute();
    }


   public function registerDashboardRoute() {
        register_rest_route(
            'botNinja/v1',
            '/dashboard',
            array(
                'method'   => 'GET',
                'callback' => [$this, 'dashboardResponse']
            )
        );
    }


    function dashboardResponse(){
        return ['name' => 'AL EMRAN'];
    }

}