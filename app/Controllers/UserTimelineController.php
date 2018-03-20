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
        {
            $this->index();
            exit;
        }

        /* Retrieve the user's timeline from the model. */
        $userTimeline = UserTimeline::getTimeline($_GET['id']);

        /* Check to see if there were any errors getting the userTimeline. */
        if (isset($userTimeline->errors))
        {
            $this->index();
            exit;
        }

        /* Load/render and display the results to the user. */
        $view = new Renderer('views/userTimeline/');
        $view->userTimeline = $this->parseTimeline($userTimeline);
        $view->render('results.php');
    }

    /**
    * Method to parse the timeline received by the Twitter API.
    * @param $userTimeLine - timeline received by the Twitter API.
    * @return parsed timeline.
    */
    private function parseTimeline($userTimeline)
    {
        /* Loop through each tweet. */
        foreach($userTimeline as $tweet) 
        {
            /* If the tweet is a retweet then format it specific for retweets. */
            if (isset($tweet->retweeted_status)) 
            {
                $tweet_text = "RT <a href='https://twitter.com/{$tweet->retweeted_status->user->screen_name}'>@{$tweet->retweeted_status->user->screen_name}</a>: 
                {$tweet->retweeted_status->full_text}";
                $favorites = $tweet->retweeted_status->favorite_count;
            } 
            else 
            {
                $tweet_text = $tweet->full_text;
                $favorites = $tweet->favorite_count;
            }

            /* Check to see if the tweet has a media url. */
            if(isset($tweet->entities->media))
            {
                $media_url = $tweet->entities->media[0]->media_url;
            }
            else
            {
                $media_url = "";
            }
    
            /* Parse the data. */
            $twitter_feed[] = array(
                'text' => $tweet_text, 
                'name' => $tweet->user->name,
                'username' => $tweet->user->screen_name,
                'user-profile-img' => $tweet->user->profile_image_url,
                'media-url' => $media_url,
                'date-created' => (new \DateTime(($tweet->created_at)))->format('M j'),
                'favorites' => $favorites,
                'retweets' => $tweet->retweet_count,
                'link' => "http://twitter.com/".$tweet->user->screen_name."/status/".$tweet->id
            );
 
        unset($tweet_text);
        }

        return $twitter_feed;
    }
}
