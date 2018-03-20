<?php

/* Declaring namespace. */
namespace App\Controllers;

/* Calling namespace(s). */
use App\Renderer as Renderer;
use App\Models\SearchTweets as SearchTweets;

/**
 * SearchTweetsController class that accesses data from the
 * SearchTweets model class and passes it to a rendering class
 * to be rendered as a view.
 * 
 * @author Bailey Granam
 *
 */
class SearchTweetsController
{
    /* Default page for the SearchTweets. */
    public function index()
    {
        $view = new Renderer('views/searchTweets/');
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
        $tweets = SearchTweets::getTweets($_GET['query'], $_GET['count']);

        /* Check for error in model response. */
        if($tweets == false)
        {
            $this->index();
            exit;
        }
        else
        {
            /* Load/render and display the results to the user. */
            $view = new Renderer('views/searchTweets/');
            $view->tweets = $tweets;
            $view->render('results.php');
        }
    }
}