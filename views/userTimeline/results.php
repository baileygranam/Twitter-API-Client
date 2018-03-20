<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
			<?php foreach($this->userTimeline as $tweet) { ?>
			<div class="card" style="width: 40rem;">
				<div class="card-header">
					<a href="<?php echo $tweet->user->url; ?>">
						<span id="profile-image"><img src="<?php echo $tweet['user-profile-img']; ?>"></span>
			    		<span id="name"><?php echo $tweet['name']; ?></span>
			    		<span id="screen-name"> &#8211; @<?php echo $tweet['username']; ?> </span>
			    	</a>
			    	<span id="date"><?php echo $tweet['date-created'] ?></span>
			  	</div>
			  	<?php if(!empty($tweet['media-url'])){ ?>
				<img class="card-img-top" src="<?php echo $tweet['media-url']; ?>" alt="Card image cap">
				<?php }?>
				<div class="card-body">
					<p class="card-text"><?php echo $tweet['text']; ?></p>
					<span id="tweet-stats">
						<img src="https://image.flaticon.com/icons/svg/126/126471.svg" width="18">
						<?php echo $tweet['favorites']; ?>
						<img src="https://image.flaticon.com/icons/svg/127/127998.svg" width="18">
						<?php echo $tweet['retweets']; ?>
						<a href="<?php echo $tweet['link']; ?>" target="_blank">
							<img src="https://image.flaticon.com/icons/svg/126/126481.svg" width="18">
						</a>
					</span>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
