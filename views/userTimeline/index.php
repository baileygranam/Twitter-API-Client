<div class="container">
    <div class="row justify-content-md-center">
    	<div class="col-md-auto">
    		<div class="card" style="width:25em;">
			  <div class="card-body">
			    <h5 class="card-title">
			    	Get Timeline:
			    </h5>
			    <form method="GET" action="index.php">
			    	<div class="form-group">
				    	<input type="id" class="form-control" name="id" id="username" placeholder="Enter username">
				    	<br />
				    	<input type="id" class="form-control" name="count" id="count" placeholder="# of tweets">
				    </div>
			    	<input type="hidden" name="controller" value="userTimeline">
			    	<input type="hidden" name="action" value="results">
			    	<input type="submit" class="btn btn-primary" value="Retrieve">
			    </form>
			  </div>
			</div>
    	</div>
    </div>
</div>