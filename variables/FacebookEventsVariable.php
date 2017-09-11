<?php
namespace Craft;

class FacebookEventsVariable
{
  public function getEvents()
  {
    return craft()->facebookEvents->getEvents();
  }
}
