<?php
/* Declaring namespace. */
namespace App\Models;

class UserParser
{
    /**
    * Method to parse the users received by the Twitter API.
    * @param $users - users received by the Twitter API.
    * @return parsed user(s) structure.
    */
    public static function parse($users)
    {
        /* Loop through each tweet. */
        foreach($users as $user) 
        {
            /* Parse the data. */
            $user_list[] = array(  
                    'name'               => $user->name, /* User's name. */
                    'username'           => $user->screen_name, /* User's screen name. */
                    'location'           => $user->location, /* User's Location. */
                    'profile_image'      => str_replace("_normal","",$user->profile_image_url), /* Profile image of the user. */
                    'description'        => $user->description, /* User's description. */
                    'followers_count'    => number_format($user->followers_count), /* Number of followers of the user. */
                    'following_count'    => number_format($user->friends_count), /* Number of users the user is following. */
                    'likes_count'        => number_format($user->favourites_count), /* Number of likes the user has given. */
                    'isVerified'         => $user->verified /* Status of user verification. */
            );
        unset($tweet_text);
        }
        return $user_list;
    }
}