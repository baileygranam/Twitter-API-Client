<div class="card" id="user-profile">
	<img class="card-img-top" src="<?php echo ($this->userInformation)['profile_image']; ?>" alt="Card image cap">
	<div class="card-body">
		<h5 class="card-title">
    		<?php echo ($this->userInformation)['name']; ?> 
			<?php if(($this->userInformation)['isVerified']) { ?>
				<img src="https://pbs.twimg.com/media/Cj-5x98XAAA-t8B.png" width="18">
			<?php } ?>
    	</h5>
    	<p id="name"> @<?php echo ($this->userInformation)['username']; ?></p>
    	<p class="card-text"><?php echo ($this->userInformation)['description']; ?></p>
  	</div>
    <div class="card-footer">
  		<p>Followers: <?php echo ($this->userInformation)['followers_count']; ?></p>
  		<p>Following: <?php echo ($this->userInformation)['following_count']; ?> </p>
  		<p>Likes: <?php echo ($this->userInformation)['likes_count']; ?> </p>
    </div>
</div>