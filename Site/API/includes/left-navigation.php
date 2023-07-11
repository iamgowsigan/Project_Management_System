<?php 
	
 
?>
<div class="left-side-menu">
    
	<!-- LOGO -->
	<a href="dashboard.php" class="logo text-center logo-light">
		<span class="logo-lg">
			<img src="assets/images/logo.png" alt="" width="40%">
		</span>
		<span class="logo-sm">
			<img src="assets/images/logo.png" alt="" width="40%">
		</span>
	</a>
	
	<!-- LOGO -->
	<a href="dashboard.php" class="logo text-center logo-dark">
		<span class="logo-lg">
			<img src="assets/images/logo.png" alt="" width="40%">
		</span>
		<span class="logo-sm">
			<img src="assets/images/logo.png" alt="" width="40%">
		</span>
	</a>
    
	<div class="h-100" id="left-side-menu-container" data-simplebar>
		
		
		<!--- Sidemenu -->
		<ul class="metismenu side-nav">
			
			
			
			<li class="side-nav-title side-nav-item" style="color:#fff;"><?php mylan("SETTINGS "," الإعدادات"); ?></li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="mdi mdi-shield-star"></i>
					<span> <?php mylan("Administrator ","مدير "); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li> <a href="myaccount.php"><?php mylan(" My Account","حسابي "); ?></a> </li>
					<li> <a href="add-user.php"><?php mylan("User Management "," إدارةالمستخدم"); ?></a> </li>
					<li> <a href="view-userlog.php"><?php mylan("User Logs ","سجلات المستخدم "); ?></a> </li>
					<li> <a href="theams-settings.php"><?php mylan("Themes Settings ","إعدادات Themes "); ?></a> </li>
					
					
				</ul>
			</li>
			
			
			<li class="side-nav-title side-nav-item" style="color:#fff;">STUDENT MANAGEMENT</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-users-alt"></i>
					<span> Students </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="student.php">Manage Students</a>
					</li>
					
					
				</ul>

			</li>

			
			<li class="side-nav-title side-nav-item" style="color:#fff;">ACADEMIC MANAGEMENT</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil uil-puzzle-piece"></i>
					<span> Department </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					
					<li><a href="department.php">Manage Department</a></li>
					
					
					
				</ul>
			</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="mdi mdi-school"></i>
					<span> Faculty</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li><a href="faculty.php">Manage Faculty</a></li>
					
				</ul>
				
			</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="mdi mdi-account-group"></i>
					<span> SIG</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li><a href="sig.php">Manage SIG</a></li>
					
				</ul>
				
			</li>
			
 
			
			<li class="side-nav-title side-nav-item" style="color:#fff;">PROJECT MANAGEMENT</li>
			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-briefcase"></i>
					<span>Projects</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="projects.php">Manage Projects</a>
					</li>
					
				</ul>
			</li>	
			
			<li class="side-nav-title side-nav-item" style="color:#fff;">ENQUIRY MANAGEMENT</li>
						<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-comment-question"></i>
					<span>Enquiry</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="enquiry.php">Manage Enquiry</a>
					</li>
					
				</ul>
			</li>
			
			
			<br><br><br><br><br>
			
			
			
		</ul>
		
		
		<div class="clearfix"></div>
		
	</div>
	<!-- Sidebar -left -->
	
</div>							