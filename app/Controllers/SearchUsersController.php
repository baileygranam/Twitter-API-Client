<?php

/* Declaring namespace. */
namespace App\Controllers;

/* Calling namespace(s). */
use App\Renderer as Renderer;
use App\Models\SearchUsers as SearchUsers;

/**
 * SearchUsersController class that accesses data from the
 * SearchUsers model class and passes it to a rendering class
 * to be rendered as a view.
 * 
 * @author Bailey Granam
 *
 */
class SearchUsersController
{
    /* Default page for the SearchUsers. */
    public function index()
    {
        $view = new Renderer('views/searchUsers/');
        $view->render('index.php');
    }

    /* Method to display the results page if the form has been submitted. */
    public function results()
    {
        /* Check to see if the form value 'hashtag' is set. If not redirect to the index page. */
        if (!isset($_GET['query']))
        {
            $this->index();
            exit;
        }

        /* Retrieve tweets based on the query and count from the model. */
        $users = SearchUsers::getUsers($_GET['query'], $_GET['count']);

        /* Check for error in model response. */
        if($users == false)
        {
            $this->index();
            exit;
        }
        else
        {
            /* Load/render and display the results to the user. */
            $view = new Renderer('views/searchUsers/');
            $view->users = $users;
            $view->render('results.php');
        }
    }
}