<?php

/* Declaring namespace. */
namespace App\Controllers;

/* Calling namespace(s). */
use App\Renderer as Renderer;
use App\Models\UserTimeline as UserTimeline;

/**
 * UserTimelineController class that accesses data from the
 * UserTimeline model class and passes it to a rendering class
 * to be rendered as a view.
 * 
 * @author Bailey Granam
 *
 */
class UserTimelineController
{
    /* Default page for the UserTimeline. */
    public function index()
    {
        $view = new Renderer('views/userTimeline/');
        $view->render('index.php');
    }

    /* Method to display the results page if the form has been submitted. */
    public function results()
    {
        /* Check to see if the form value 'id' is set. If not redirect to the index page. */
        if (!isset($_GET['id']))
            $this->index();

        /* Retrieve the user's timeline from the model. */
        $userTimeline = UserTimeline::getTimeline($_GET['id']);

        /* Load/render and display the results to the user. */
        $view = new Renderer('views/userTimeline/');
        $view->userTimeline = $userTimeline;
        $view->render('results.php');
    }
}
