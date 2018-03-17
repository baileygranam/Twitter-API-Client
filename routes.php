<?php

/** 
* Method to route the user to the appropriate controller/action. 
*/
function route($controller, $action) 
{


	switch($controller) {
      case 'main':
        $controller = new App\Controllers\MainController();
      break;
      case 'userTimeline':
        $controller = new App\Controllers\UserTimelineController();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array('main' => ['home', 'error'],
                       'userTimeline' => ['index', 'results']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      route($controller, $action);
    } else {
      route('main', 'error');
    }
  } else {
    route('main', 'error');
  }
