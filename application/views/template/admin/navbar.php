<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	<div class="app-header header-shadow">
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
		<div class="app-header__content">
			<div class="app-header-right">
				<div class="header-btn-lg pr-0">
					<div class="widget-content p-0">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="btn-group">
									<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
										<?php if ($user['ava'] == '') : ?>
											<img width="50" height="50" class="rounded-circle" src="<?= base_url('assets/img/user/user.png') ?>" alt="">
										<?php else : ?>
											<img width="50" height="50" class="rounded-circle" src="<?= base_url('assets/img/user/') ?><?= $user['ava']; ?>" alt="">
										<?php endif; ?>
									</a>
								</div>
							</div>
							<div class="widget-content-left  ml-3 header-user-info">
								<div class="widget-heading">
									<?= $user['username']; ?>
								</div>
								<div class="widget-subheading">
									<?= $user['role']; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
