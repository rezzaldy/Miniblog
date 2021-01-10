<div class="app-main">
	<div class="app-sidebar sidebar-shadow">
		<div class="app-header__logo">
			<div class="logo-src"></div>
			<div class="header__pane ml-auto">
				<div>
					<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
		</div>
		<div class="app-header__mobile-menu">
			<div>
				<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
		<div class="app-header__menu">
			<span>
				<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
					<span class="btn-icon-wrapper">
						<i class="fa fa-ellipsis-v fa-w-6"></i>
					</span>
				</button>
			</span>
		</div>
		<div class="scrollbar-sidebar">
			<div class="app-sidebar__inner">
				<ul class="vertical-nav-menu">

					<li class="app-sidebar__heading">Dashboards</li>
					<li>
						<a href="<?= base_url('administrator'); ?>" class="<?php if ($sidebar == 'dashboard') echo 'mm-active'; ?>">
							<i class="metismenu-icon fas fa-fw fa-tachometer-alt"></i>
							Dashboard
						</a>
						<a href="<?= base_url(); ?>">
							<i class="metismenu-icon fas fa-fw fa-home"></i>
							Home
						</a>
					</li>
					<li class="app-sidebar__heading">Settings</li>
					<li>
						<a href="<?= base_url('administrator/editprofile'); ?>" class="<?php if ($sidebar == 'editprofile') echo 'mm-active'; ?>">
							<i class="metismenu-icon fas fa-fw fa-user-cog"></i>
							Setting Profile
						</a>
					</li>
					<li class="app-sidebar__heading">Tols</li>
					<?php if ($this->session->userdata('role') == 'admin') : ?>
						<li>
							<a href="<?= base_url('administrator/category') ?>" class="<?php if ($sidebar == 'category') echo 'mm-active'; ?> mt-3">
								<i class="metismenu-icon fas fa-fw fa-layer-group"></i>
								Category
							</a>
							<a href="<?= base_url('administrator/resetpassword') ?>" class="mt-3" class="<?php if ($sidebar == 'resetpassword') echo 'mm-active'; ?>">
								<i class="metismenu-icon fas fa-key"></i>
								Reset Password
							</a>
						</li>
					<?php elseif ($this->session->userdata('role') == 'penulis') : ?>
						<li>
							<a href="<?= base_url('administrator/write') ?>" style="margin-top: 0.5em;" class="<?php if ($sidebar == 'write') echo 'mm-active'; ?>">
								<i class="metismenu-icon far fa-edit"></i>
								Write
							</a>
							<a href="<?= base_url('administrator/comment') ?>" style="margin-top: 0.5em;" class="<?php if ($sidebar == 'comment') echo 'mm-active'; ?>">
								<i class="metismenu-icon fas fa-comments"></i>
								Comment
							</a>
							</a>
							<a href="<?= base_url('administrator/post'); ?>" style="margin-top: 0.5em;" class="<?php if ($sidebar == 'list') echo 'mm-active'; ?>">
								<i class="metismenu-icon fas fa-fw fa-list-ul"></i>
								List Post
							</a>
							<a href="<?= base_url('administrator/testimoni'); ?>" style="margin-top: 0.5em;" class="<?php if ($sidebar == 'testimoni') echo 'mm-active'; ?>">
								<i class="metismenu-icon fas fa-fw fa-hand-holding-heart"></i>
								Testimoni
							</a>
						</li>
					<?php endif; ?>
					<li>
						<a href="<?= base_url('auth/logout') ?>" class="mt-3">
							<i class="metismenu-icon fas fa-power-off"></i>
							Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
