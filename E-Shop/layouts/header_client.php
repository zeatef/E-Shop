<div id = "header">

			<div class="col-md-1"> <img src="/E-Shop/assets/images/logo.png" class="img-logo" length="150px" width="150px"> </div>
			<div class="col-md-11"> 
				<ul class="nav nav-pills">
					<li class = "active">
						<a href="home.php"><span class="glyphicon glyphicon-home"> Home</a>
					</li>
					<li>
						<form class="navbar-form featurette" role="search">
							<div class="input-group input-group-lg">
								<input type="search" placeholder="Search for..." class="form-control">
								<span class="input-group-btn">
									<button class="btn btn-primary" type="button">Go!</button>
								</span>
							</div>
						</form>
					</li>
					<li class="dropdown pull-right">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Welcome, <?php echo "$fname "; ?><span class="glyphicon glyphicon-user"><strong class="caret"></strong></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Profile</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href = 'logout.php'>Logout!</a>
						</li>
					</ul>
				</li>				
				</ul>
			</div>
		</div>