<?php
namespace Craft;

class FacebookEventsPlugin extends BasePlugin
{
  function getName()
  {
    return Craft::t('Facebook Events');
  }

  function getVersion()
  {
    return '1.0.0-alpha';
  }

  function getDeveloper()
  {
    return 'Shankar Poncelet';
  }

  function getDeveloperUrl()
  {
    return 'https://ShankxWebDev.com';
  }

  protected function defineSettings()
  {
    return array(
      'facebookAppId'  => array(AttributeType::String,'required' => true),
      'facebookSecret' => array(AttributeType::String,'required' => true),
      'facebookPage' => array(AttributeType::String,'required' => true)
    );
  }

  public function getSettingsHtml()
  {
    return craft()->templates->render('facebookevents/settings', array(
      'settings' => $this->getSettings()
    ));
  }
}
