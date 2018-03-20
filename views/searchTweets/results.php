<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
			<?php foreach($this->tweets as $tweet) { ?>
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