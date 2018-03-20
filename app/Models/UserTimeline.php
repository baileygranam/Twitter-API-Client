<?php

/* Declaring namespace. */
namespace App\Models;

/* Calling namespace. */
use j7mbo as j7mbo;

/**
 * UserTimeline model class that accesses data from the
 * Twitter API and passes the results back to the 
 * UserTimelineController. 
 * 
 * @author Bailey Granam
 *
 */
class UserTimeline
{
    /**
    * Method to retrieve a specific user's timeline from twitter. 
    * @param $username - Username to be accessed.
    * @return - Json data retrieved from Twitter.
    */
    public static function getTimeline($username, $count)
    {
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "744391147884273664-k4HVkfq4oCQtvm0zRzoBv4SOX9OkKzx",
            'oauth_access_token_secret' => "WWJ47e2gZaUOvjOHzqgqJbyGKfAJ2pletRLkdCYBYiYjz",
            'consumer_key' => "VEKAllSJ4Kohy28sMUsRZRXXs",
            'consumer_secret' => "BZpt2UwcOWFwkodFFuKXgBjqmDQBEuNMVv4e3JXBNdzlvy7POj"
        );

        /* Define the API URL. */
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

        /* Define the GET 'screen_name' request field. */
        $getfield = '?count='.$count.'&tweet_mode=extended&screen_name='.$username;

        /* Define the request method. */
        $requestMethod = 'GET';

        /* Create a new TwitterAPIExchange object. */
        $twitter = new \TwitterAPIExchange($settings);

        /* Retrieve the data from the Twitter API. */
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

        /* Json decode the data. */
        $result = json_decode($result);


        if(isset($result->errors))
        {
            return false;
        }

        /* Parse the data into a specific format and return to the controller. */
        return (UserTimeline::parseTimeline($result));
    }

     /**
    * Method to parse the timeline received by the Twitter API.
    * @param $userTimeLine - timeline received by the Twitter API.
    * @return parsed timeline.
    */
    private static function parseTimeline($userTimeline)
    {
        /* Loop through each tweet. */
        foreach($userTimeline as $tweet) 
        {
            /* Check to see if the tweet is a retweet and perform specific styling. */
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

            /* Check to see if the tweet has an image. */
            if(isset($tweet->entities->media))
            {
                $image_url = $tweet->entities->media[0]->media_url;
            }
            else
            {
                $image_url = "";
            }
    
            /* Parse the data. */
            $timeline[] = array(

                'text'          => $tweet_text, /* Content of the tweet. */
                'image_url'     => $image_url, /* URL of the tweet image (if it exists). */
                'date_created'  => (new \DateTime(($tweet->created_at)))->format('M j'), /* Date the post was created. */
                'favorites'     => number_format($favorites), /* Number of favorites. */
                'retweets'      => number_format($tweet->retweet_count), /* Number of retweets. */
                'link_to_tweet' => "http://twitter.com/".$tweet->user->screen_name."/status/".$tweet->id, /* Link to the tweet itself. */

                'user' => array(
                    'name'               => $tweet->user->name, /* Name of the user who tweeted/retweeted. */
                    'username'           => $tweet->user->screen_name, /* Username of the user who tweeted/retweeted. */
                    'profile_image_icon' => $tweet->user->profile_image_url, /* Profile image icon of the user. */
                    'profile_image'      => str_replace("_normal","",$tweet->user->profile_image_url), /* Profile image of the user. */
                    'profile_url'        => "https://twitter.com/".$tweet->user->screen_name, /* Link to the profile of the user. */
                    'description'        => $tweet->user->description, /* Description of the user. */
                    'followers_count'    => number_format($tweet->user->followers_count), /* Number of followers of the user. */
                    'following_count'    => number_format($tweet->user->friends_count), /* Number of users the user is following. */
                    'likes_count'        => number_format($tweet->user->favourites_count), /* Number of likes the user has given. */
                    'isVerified'         => $tweet->user->verified /* Status of user verification. */
                )
            );
        unset($tweet_text);
        }

        return $timeline;
    }
}
