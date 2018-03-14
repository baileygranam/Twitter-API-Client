<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Algorithm as Algorithm;

/**
 * AlgorithmsController class that accesses data from the
 * Algorithm model class and passes it to a rendering class
 * to be rendered as a view.
 * 
 * @author dplante
 *
 */
class AlgorithmsController
{
    public function index()
    {
        $algorithms = Algorithm::complete();
        $view = new Renderer('views/algorithms/');
        $view->algorithms = $algorithms;
        $view->render('index.php');
    }

    public function show()
    {
        if (!isset($_GET['id']))
            $this->index();

        $algorithm = Algorithm::find($_GET['id']);
        $view = new Renderer('views/algorithms/');
        $view->algorithm = $algorithm;
        $view->render('show.php');
    }
}
