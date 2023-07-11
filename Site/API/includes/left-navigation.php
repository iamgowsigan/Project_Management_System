<?php

$uid = $_SESSION['uid'];
$power = $_SESSION['power'];
include('includes/config.php');

$cservice=Countdata("Select * from inspection WHERE adminview='0'");
$creplacement=Countdata("Select * from replacement WHERE adminview='0'");
$ccomplient=Countdata("Select * from compliant WHERE adminview='0'");
		


?>
<div class="left-side-menu">

	<a href="dashboard.php" class="logo text-center logo-light">
		<span class="logo-lg">
			<img src="assets/images/logowhitetext.png" alt="" height="50">
		</span>
		<span class="logo-sm">
			<img src="assets/images/logowhitetext.png" alt="" height="50">
		</span>
	</a>

	<!-- LOGO -->
	<a href="dashboard.php" class="logo text-center logo-dark">
		<span class="logo-lg">
			<img src="assets/images/logowhitetext.png" alt="" height="50">
		</span>
		<span class="logo-sm">
			<img src="assets/images/logowhitetext.png" alt="" height="50">
		</span>
	</a>



	<div class="h-100" id="left-side-menu-container" data-simplebar>


		<!--- Sidemenu -->
		<ul class="metismenu side-nav">



			<li class="side-nav-title side-nav-item">
				<?php mylan("SETTINGS ", " إعدادات"); ?>
			</li>

			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="mdi mdi-shield-star"></i>
					<span>
						<?php mylan("Administrator ", "مدير "); ?>
					</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li> <a href="myaccount.php">
							<?php mylan(" My Account", "حسابي "); ?>
						</a> </li>
					<li> <a href="account.php">
							<?php mylan("Project Info ", "معلومات المشروع "); ?>
						</a> </li>
					<li> <a href="admin-user.php">
							<?php mylan("User Management ", " إدارةالمستخدم"); ?>
						</a> </li>
					<li> <a href="view-userlog.php">
							<?php mylan("User Logs ", "سجلات المستخدم "); ?>
						</a> </li>
					<li> <a href="theams-settings.php">
							<?php mylan("Themes Settings ", "إعدادات السمات "); ?>
						</a> </li>


				</ul>
			</li>

			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="mdi mdi-cellphone-android"></i>
					<span>
						<?php mylan("Application ", "طلب "); ?>
					</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li> <a href="setting.php">
							<?php mylan("App Functions ", "وظائف التطبيق "); ?>
						</a> </li>

				</ul>
			</li>



			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="mdi mdi-iframe-braces"></i>
					<span>
						<?php mylan("Backup Solution ", "حل احتياطي "); ?>
					</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li> <a href="sql-backup.php">
							<?php mylan("SQL-Backup ", "SQL- النسخ الاحتياطي "); ?>
						</a> </li>
					<li> <a href="data-backup.php">
							<?php mylan("Media Backup ", " وسائط النسخ الاحتياطي"); ?>
						</a> </li>
				</ul>
			</li>

			<li class="side-nav-title side-nav-item">
				<?php mylan(" USER MANAGEMENT", "إدارةالمستخدم "); ?>
			</li>

			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-users-alt"></i>
					<span>
						<?php mylan("Service Persons ", "المستعمل "); ?>
					</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="service-persons.php">
							<?php mylan("Manage Service Persons ", "إدارة المستخدم "); ?>
						</a>
					</li>
				</ul>
			</li>

			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="uil-book-reader"></i>
					<span>
						<?php mylan("Bank Persons ", "المستعمل "); ?>
					</span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li>
						<a href="bank-persons.php">
							<?php mylan("Manage Bank Persons ", "إدارة المستخدم "); ?>
						</a>
					</li>
				</ul>
			</li>


			<li class="side-nav-title side-nav-item">APP MANAGEMENT</li>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link"><i
						class="mdi mdi-map-marker-alert"></i><span>Cities</span><span class="menu-arrow"></span></a>
				<ul class="side-nav-second-level" aria-expanded="true">
					<li><a href="city.php">Manage City</a></li>
				</ul>
			</li>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link"><i
						class="mdi mdi-tools"></i><span>Generator</span><span class="menu-arrow"></span></a>
				<ul class="side-nav-second-level" aria-expanded="true">
					<li><a href="generator.php">Manage Generator</a></li>
				</ul>
			</li>

			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link"><i
						class="mdi mdi-bank-outline"></i><span>Bank</span><span class="menu-arrow"></span></a>
				<ul class="side-nav-second-level" aria-expanded="true">
					<li><a href="bank.php">Manage Bank</a></li>
				</ul>
			</li>

			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link"><i
						class="dripicons-map"></i><span>Sites</span><span class="menu-arrow"></span></a>
				<ul class="side-nav-second-level" aria-expanded="true">
					<li><a href="sites.php">Manage Sites</a></li>
				</ul>
			</li>

			<li class="side-nav-title side-nav-item">ENQUIRY MANAGEMENT</li>

			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link"><i
						class="uil-window"></i>
						<span>Service Visits</span>
						<?php
						if($cservice==null || $cservice==0 || $cservice==''){
							echo '<span class="menu-arrow"></span>';
							}else{
							echo '<span class="badge badge-success float-right">'.$cservice.'</span>';
						}
					?>

					</a>
				<ul class="side-nav-second-level" aria-expanded="true">
					<li><a href="inspection.php?view=all">Manage AMC Service</a></li>
				</ul>
			</li>

			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link"><i
						class=" mdi mdi-file-replace-outline"></i><span>Replacement</span><?php
						if($creplacement==null || $creplacement==0 || $creplacement==''){
							echo '<span class="menu-arrow"></span>';
							}else{
							echo '<span class="badge badge-success float-right">'.$creplacement.'</span>';
						}
					?></a>
				<ul class="side-nav-second-level" aria-expanded="true">
					<li><a href="replacement.php?view=all">Manage Replacement</a></li>
				</ul>
			</li>

			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link"><i
						class="mdi mdi-settings-transfer-outline"></i><span>Complaint</span><?php
						if($ccomplient==null || $ccomplient==0 || $ccomplient==''){
							echo '<span class="menu-arrow"></span>';
							}else{
							echo '<span class="badge badge-success float-right">'.$ccomplient.'</span>';
						}
					?></a>
				<ul class="side-nav-second-level" aria-expanded="true">
					<li><a href="complaint.php?view=all">Manage Complaint</a></li>
				</ul>
			</li>


			<li class="side-nav-title side-nav-item">REPORT MANAGEMENT</li>

			
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link"><i
						class="uil-window"></i>
						<span>Reports</span>
						<span class="menu-arrow"></span>

					</a>
				<ul class="side-nav-second-level" aria-expanded="true">
					<li><a href="report-screen.php">Manage Report</a></li>
				</ul>
			</li>


			<br><br><br><br><br>



		</ul>


		<div class="clearfix"></div>

	</div>
	<!-- Sidebar -left -->

</div>