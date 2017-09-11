<?php
namespace Craft;
require_once(CRAFT_PLUGINS_PATH.'facebookevents/vendor/autoload.php');
/**
 *
 */
class FacebookEventsService extends BaseApplicationComponent
{
  public function getEvents(){

    // Get plugin settings
    $settings = craft()->plugins->getPlugin('facebookEvents')->getSettings();
    define("APPID", $settings['facebookAppId']);
    define("SECRET", $settings['facebookSecret']);
    define("PAGE", $settings['facebookPage']);
    // Get events list from Facebook API
    $fb = new \Facebook\Facebook([
      'app_id' => APPID,
      'app_secret' => SECRET,
      'default_graph_version' => 'v2.10',
      'default_access_token' => APPID.'|'.SECRET
    ]);

    $response = $fb->get('/'.PAGE.'/events?time_filter=upcoming')->getDecodedBody();
    return $response;

  }
}
