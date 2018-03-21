<div class="card" id="user-profile">
    <img class="card-img-top" src="<?php echo ($user)['profile_image']; ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">
            <?php echo ($user)['name']; ?> 
            <?php if(($user)['isVerified']) { ?> <img src="https://pbs.twimg.com/media/Cj-5x98XAAA-t8B.png" width="18"> <?php } ?>
         </h5>
         <p id="name"> @<?php echo ($user)['username']; ?></p>
         <p class="card-text"><?php echo ($user)['description']; ?></p>
    </div>
    <div class="card-footer">
        <p>Followers: <?php echo ($user)['followers_count']; ?></p>
        <p>Following: <?php echo ($user)['following_count']; ?> </p>
        <p>Likes: <?php echo ($user)['likes_count']; ?> </p>
    </div>
</div>
