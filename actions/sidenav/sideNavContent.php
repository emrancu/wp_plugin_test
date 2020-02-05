<?php


trait sideNavContent
{



    public function DashboardContent() {

        require_once plugin_dir_path(__FILE__) . '../../templates/dashboard.php';
    }


    public function CampaignContent() {
        require_once plugin_dir_path(__FILE__) . '../../templates/campaign.php';
    }

    public function ReportContent() {
        echo '<div class="wrap">';
        echo '<h2>ReportContent</h2>';
        echo '</div>';
    }


}