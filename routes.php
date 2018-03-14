<?php
  
  function route($controller, $action) {
    
    switch($controller) {
      case 'main':
        $controller = new App\Controllers\MainController();
      break;
      case 'algorithms':
        $controller = new App\Controllers\AlgorithmsController();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array('main' => ['home', 'error'],
                       'algorithms' => ['index', 'show']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      route($controller, $action);
    } else {
      route('main', 'error');
    }
  } else {
    route('main', 'error');
  }
