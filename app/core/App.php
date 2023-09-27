<?php

namespace Core;

/**
 * App Class
 */
class  App
{
  public function index()
  {
    do_action('before_controller');
    do_action('controller');
    do_action('after_controller');
    
    do_action('before_view');
    do_action('view');
    do_action('after_view');
  }
}


