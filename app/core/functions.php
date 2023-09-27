<?php

/** splits the query string in the url **/
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
  $plugins_folder = 'plugins/';
  $res = [];
  $folders = scandir('plugins/');
  foreach ($folders as $folder) {
    if ($folder != '.' && $folder != '..' && is_dir($plugins_folder . $folder))
      $res[] = $folder;
  }
  return $res;
}

function load_plugins($plugin_folders)
{
  $loaded = false;
  foreach ($plugin_folders as $folder) {

    $file = 'plugins/' . $folder . '/plugin.php';
    if (file_exists($file)) {
      require $file;
      $loaded = true;

    }
  }
  return $loaded;
}

function add_action(string $hook, mixed $func)
{
  global $ACTIONS;
  $ACTIONS[$hook] = $func;

  return true;

}

function do_action(string $hook, array $data = [])
{
  global $ACTIONS;

  if(!empty($ACTIONS[$hook]))
  {
    $ACTIONS[$hook]($data);
  }

}

function do_filter()
{

}

function add_filter()
{

}

function dd($data)
{
  echo "<div style='margin: 1; background-color:#444;color:white;padding: 6px 10px'>";
  print_r($data);
  echo "</div>";
}

function page()
{
  return URL(0);
}