<?php

function split_url($url)
{

  return explode("/", $url);
}

function URL($key = '')
{
  global $APP;

  if (!empty($key)) {
    if (!empty($APP['URL'][$key])) {
      return $APP['URL'][$key];
    }
  } else {
    return $APP['URL'];
  }
  return '';
}

function get_plugin_folders()
{
  return [];

}

function load_plugins($plugin_folders)
{
  return false;

}