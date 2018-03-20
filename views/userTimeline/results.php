<div class="container">
    <div class="row justify-content-md-center">
    	<div class="col-md-3">
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
    	</div>
        <div class="col-md-9">
			<?php foreach($this->userTimeline as $tweet) { ?>
			<div class="card" style="max-width: 40rem;">
				<div class="card-header">
					<a href="<?php echo $tweet['user']['profile_url']; ?>" target="_blank">
						<span id="profile-image">
							<img src="<?php echo $tweet['user']['profile_image_icon']; ?>">
						</span>
			    		<span id="name">
			    			<?php echo $tweet['user']['name']; ?>
			    			<?php if($tweet['user']['isVerified']) { ?>
							<img src="https://pbs.twimg.com/media/Cj-5x98XAAA-t8B.png" width="18">
							<?php } ?>
			    		</span>
			    		<span id="screen-name"> 
			    			&#8211; @<?php echo $tweet['user']['username']; ?> 
			    		</span>
			    	</a>
			    	<span id="date">
			    		<?php echo $tweet['date_created'] ?>
			    	</span>
			  	</div>
			  	<?php if(!empty($tweet['image_url'])){ ?>
				<img class="card-img-top" src="<?php echo $tweet['image_url']; ?>" alt="Card image cap">
				<?php }?>
				<div class="card-body">
					<p class="card-text"><?php echo $tweet['text']; ?></p>
					<span id="tweet-stats">
						<img src="https://image.flaticon.com/icons/svg/126/126471.svg" width="18">
						<?php echo $tweet['favorites']; ?>
						<img src="https://image.flaticon.com/icons/svg/127/127998.svg" width="18">
						<?php echo $tweet['retweets']; ?>
						<a href="<?php echo $tweet['link_to_tweet']; ?>" target="_blank">
							<img src="https://image.flaticon.com/icons/svg/126/126481.svg" width="18">
						</a>
					</span>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
