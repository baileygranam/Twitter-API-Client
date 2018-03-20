<?php

/* Declaring namespace. */
namespace App\Models;

class TweetParser
{
    /**
    * Method to parse the tweets received by the Twitter API.
    * @param $tweets - tweets received by the Twitter API.
    * @return parsed timeline.
    */
	public static function parse($tweets)
	{
		/* Loop through each tweet. */
        foreach($tweets as $tweet) 
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