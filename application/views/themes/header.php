<header class="main-header">
	<a href="#" class="logo">
		<span class="logo-mini"><b>A</b>LT</span>
		<span class="logo-lg"><b>Admin</b>LTE</span>
	</a>
	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
		 		<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-user"></i>
					<b><span class="hidden-xs"><?php echo $_SESSION['login']['nama_petugas']; ?></span></b>
				</a>
					<ul class="dropdown-menu">
						<li class="user-footer">
							<div align="center">
								<a href="<?php echo site_url('C_login/logout'); ?>" class="btn btn-block btn-danger btn-flat">
									<i class="fa fa-user-times"></i>
									<b>Log out</b>
									<i class="fa fa-sign-out"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>