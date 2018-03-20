<div class="container">
    <div class="row justify-content-md-center">
    	<div class="col-md-auto">
    		<div class="card" style="width:25em;">
			  <div class="card-body">
			    <h5 class="card-title">
			    	Search Hashtags:
			    </h5>
			    <form method="GET" action="index.php">
			    	<div class="form-group">
				    	<input type="id" class="form-control" name="query" id="query" placeholder="Enter query">
				    	<br />
				    	<input type="id" class="form-control" name="count" id="count" placeholder="# of tweets">
				    </div>
			    	<input type="hidden" name="controller" value="searchTweets">
			    	<input type="hidden" name="action" value="results">
			    	<input type="submit" class="btn btn-primary" value="Retrieve">
			    </form>
			  </div>
			</div>
    	</div>
    </div>
</div>