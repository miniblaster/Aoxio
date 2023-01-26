<!DOCTYPE html>
<html lang="en" dir="<?php echo text_dir(); ?>">
<head>
  <?php $settings = get_settings(); ?>
  <?php $user = get_logged_user($this->session->userdata('id')); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="Codericks">
  <link rel="icon" href="<?php echo base_url($settings->favicon) ?>">
  
  <title>
    <?php echo html_escape($settings->site_name); ?>  

    <?php if(is_user()): ?>
      &bull; <?php if(isset($this->business->name)){echo html_escape($this->business->name);} ?>
    <?php endif; ?>

    <?php if(isset($page_title)){echo ' &bull; '.trans(str_slug($page_title));}else{echo "Dashboard";} ?>
 </title>


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/line-icons/lineicons.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/admin_default.css?var=<?= settings()->version ?>&time=<?=time();?>">
  <!-- Google Font: DM Sans -->
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,400i,700&amp;display=swap" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- sweet alert -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/sweet-alert.css">
  <!-- tags inputs -->
  <link href="<?php echo base_url() ?>assets/admin/css/bootstrap-tagsinput.css" rel="stylesheet" />
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/select2/css/select2.min.css">
  <!-- nice-select -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/nice-select.css">
  <!-- date & time picker -->
  <link href="<?php echo base_url() ?>assets/admin/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/css/timepicker.min.css" rel="stylesheet">
  <!-- css animation -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/aos.css">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/fullcalendar-main.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/summernote/summernote-bs4.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap-colorpicker.min.css">

  <?php if (isset($page_title) && $page_title == 'Holidays'): ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/holiday.css">
  <?php endif; ?>


  <?php if (settings()->layout == 1): ?>
    <link href="<?php echo base_url() ?>assets/admin/css/admin_light.css" rel="stylesheet">
  <?php endif ?>

  <?php if (text_dir() == 'rtl'): ?>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/bootstrap-rtl.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/custom-rtl.css">
  <?php endif ?>

  <script type="text/javascript">
   var csrf_token = '<?= $this->security->get_csrf_hash(); ?>';
   var token_name = '<?= $this->security->get_csrf_token_name();?>'
 </script>

  <?php if (settings()->enable_captcha == 1 && settings()->captcha_site_key != ''): ?>
      <script src='https://www.google.com/recaptcha/api.js'></script>
  <?php endif; ?>
 
  </head>

  <body class="hold-transition sidebar-mini">
  
  <div class="wrapper <?php if(settings()->site_info == 3){echo "d-none";} ?>">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav pl-3">
      <?php if(is_user()): ?>
        <li class="nav-item d-sm-inline-block">
          <a target="_blank" href="<?php echo base_url($this->business->slug) ?>" class="btn btn-outline-secondary btn-sm mt-1 ml-2"><i class="lni lni-eye"></i> <?php echo trans('view-page') ?></a>
        </li>
      <?php else: ?>
        <li class="nav-item d-sm-inline-block">
          <a target="_blank" href="<?php echo base_url() ?>" class="btn btn-outline-secondary btn-sm mt-1 ml-2"><i class="lni lni-eye"></i> <?php echo trans('view-site') ?></a>
        </li>
      <?php endif; ?>
    </ul>

    <!-- Right navbar links -->
    <ul class="rtlnav navbar-nav <?php if(text_dir() == 'ltr'){echo "ml-auto";} ?>">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown pr-4">
        <a class="nav-link user-log" data-toggle="dropdown" href="#">
          <i class="lnib lni-user"></i> <?php echo ucfirst(user()->name) ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right mr-4">
          
          <a href="#" class="dropdown-item">
            <div class="media">
              <?php if (user()->role == 'admin'): ?>
                
              <?php else: ?>
                <img src="<?php echo base_url(user()->thumb) ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <?php endif ?>
              
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo character_limiter(user()->name, 18); ?>
                </h3>
                <p class="text-sm"><?php echo user()->email; ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock"></i> <?php echo get_time_ago(user()->created_at); ?></p>
              </div>
            </div>
          </a>

          <?php if (user()->role == 'user'): ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('admin/settings/profile') ?>" class="dropdown-item">
            <i class="lni lni-user mr-2"></i> <?php echo trans('manage-profile') ?>
          </a>
          <?php endif ?>

          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('admin/settings/change_password') ?>" class="dropdown-item">
            <i class="lni lni-lock-alt mr-2"></i> <?php echo trans('change-password') ?>
          </a>

          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item">
            <i class="lni lni-exit mr-2"></i> <?php echo trans('logout') ?>
          </a>
        </div>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  
  <nav class="navbar navbar-expand-lg navbar-light topnav-menu">
    <div class="container">
      <div class="collapse navbar-collapse" id="topnav_menu_content">
        <ul class="navbar-nav">
          <?php if (is_admin()): ?>
                  
            <li class="nav-item">
              <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Dashboard"){echo "active";} ?>">
                <i class="nav-icon lni lni-grid-alt"></i> <p><?php echo trans('dashboard') ?></p>
              </a>
            </li>
            
            <li class="nav-item has-treeview <?php if(isset($page) && $page == "Settings"){echo "menu-open";} ?>">
              <a href="#" class="nav-link <?php if(isset($page) && $page == "Settings"){echo "active";} ?>">
                <i class="nav-icon lni lni-cog"></i>
                <p>
                  <?php echo trans('settings') ?>
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/settings') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "System Settings"){echo "active";} ?>">
                    <i class="lni lni-layout nav-icon"></i>
                    <p><?php echo trans('website-settings') ?></p>
                  </a>
                </li>

                <li class="nav-item <?= $uval; ?>">
                  <a href="<?php echo base_url('admin/payment/settings') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Payment Settings"){echo "active";} ?>">
                    <i class="lni lni-coin nav-icon"></i>
                    <p><?php echo trans('payment-settings') ?></p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('admin/settings/license') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "License"){echo "active";} ?>">
                    <i class="lni lni-key nav-icon rt-90"></i>
                    <p><?php echo trans('license') ?></p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('admin/settings/change_password') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Change Password"){echo "active";} ?>">
                    <i class="lni lni-lock-alt nav-icon"></i>
                    <p><?php echo trans('change-password') ?></p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item has-treeview <?php if(isset($page) && $page == "Payouts"){echo "menu-open";} ?> <?= $uval; ?>">
              <a href="#" class="nav-link <?php if(isset($page) && $page == "Payouts"){echo "active";} ?>">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                  <?php echo trans('payouts') ?>
                  <i class="right lni lni-chevron-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($page_title) && $page_title == "Add Payout"){echo "active";} ?>" href="<?php echo base_url('admin/payouts/add') ?>"><i class="far fa-plus-circle nav-icon"></i> <p><?php echo trans('add-payout') ?></p></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link <?php if(isset($page_title) && $page_title == "Payout Settings"){echo "active";} ?>" href="<?php echo base_url('admin/payouts/settings') ?>"><i class="lni lni-coin nav-icon"></i> <p><?php echo trans('payout-settings') ?></p></a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link <?php if(isset($page_title) && $page_title == "Payout Requests"){echo "active";} ?>" href="<?php echo base_url('admin/payouts/requests') ?>"><i class="fas fa-file-invoice-dollar nav-icon"></i> <p><?php echo trans('payout-requests') ?></p></a>
                </li>

                <li class="nav-item">
                  <a class="nav-link <?php if(isset($page_title) && $page_title == "Payout Completed"){echo "active";} ?>" href="<?php echo base_url('admin/payouts/completed') ?>"><i class="far fa-check-circle nav-icon"></i> <p><?php echo trans('completed') ?></p></a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Language"){echo "active";} ?>" href="<?php echo base_url('admin/language') ?>">
                <i class="nav-icon fas fa-globe"></i> <p><?php echo trans('language') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Package"){echo "active";} ?>" href="<?php echo base_url('admin/package') ?>">
                <i class="nav-icon lni lni-layers"></i> <p><?php echo trans('plans') ?></p>
              </a>
            </li>

            <li class="nav-item d-hides">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Coupons"){echo "active";} ?>" href="<?php echo base_url('admin/coupons/plan') ?>">
              <i class="nav-icon lni lni-offer"></i> <p><?php echo trans('coupons') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Category"){echo "active";} ?>" href="<?php echo base_url('admin/category') ?>">
                <i class="nav-icon lni lni-folder"></i> <p><?php echo trans('categories') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Blogs"){echo "active";} ?>" href="<?php echo base_url('admin/blog') ?>">
                <i class="nav-icon lni lni-image"></i> <p><?php echo trans('blogs') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Users"){echo "active";} ?>" href="<?php echo base_url('admin/users') ?>">
                <i class="nav-icon lni lni-users"></i> <p><?php echo trans('users') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Testimonials"){echo "active";} ?>" href="<?php echo base_url('admin/testimonial') ?>">
                <i class="nav-icon far fa-comment-dots"></i> <p><?php echo trans('testimonials') ?> </p> 
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Features"){echo "active";} ?>" href="<?php echo base_url('admin/site_features') ?>">
                <i class="nav-icon lni lni-star"></i> <p><?php echo trans('features') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Pages"){echo "active";} ?>" href="<?php echo base_url('admin/pages') ?>">
                <i class="nav-icon lni lni-layout"></i> <p><?php echo trans('pages') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Faqs"){echo "active";} ?>" href="<?php echo base_url('admin/faq') ?>">
                <i class="nav-icon lni lni-question-circle"></i> <p><?php echo trans('faqs') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "Contact"){echo "active";} ?>" href="<?php echo base_url('admin/contact') ?>">
                <i class="nav-icon lni lni-popup"></i> <p><?php echo trans('contacts') ?></p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php if(isset($page_title) && $page_title == "App Info"){echo "active";} ?>" href="<?php echo base_url('admin/dashboard/app_info') ?>">
                <i class="nav-icon far fa-question-circle"></i> <p><?php echo trans('info') ?></p>
              </a>
            </li>

          <?php endif; ?>

          <?php if (is_user()): ?>

            <li class="nav-item">
              <a href="<?php echo base_url('admin/dashboard/user') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "User Dashboard"){echo "active";} ?>">
                <i class="nav-icon lni lni-grid-alt"></i> <span><?php echo trans('dashboard') ?></span>
              </a>
            </li>

            <?php if (check_my_payment_status() == TRUE): ?>

              <?php if (settings()->enable_wallet == 1): ?>
              <li class="nav-item has-treeview <?php if(isset($page) && $page == "Payouts"){echo "menu-open";} ?> <?= $uval; ?>">
                <a href="#" class="nav-link <?php if(isset($page) && $page == "Payouts"){echo "active";} ?>">
                  <i class="nav-icon far fa-credit-card"></i>
                  <span>
                    <?php echo trans('payouts') ?>
                    <i class="right lni lni-chevron-left"></i>
                  </span>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a class="nav-link <?php if(isset($page_title) && $page_title == "Set Payout Account"){echo "active";} ?>" href="<?php echo base_url('admin/payouts/setup_account') ?>"><i class="fas fa-plus-circle nav-icon"></i> <span><?php echo trans('set-payout-account') ?></span></a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link <?php if(isset($page_title) && $page_title == "Payouts"){echo "active";} ?>" href="<?php echo base_url('admin/payouts/user ') ?>"><i class="fas fa-credit-card nav-icon"></i> <span><?php echo trans('payouts') ?></span></a>
                  </li>
                </ul>
              </li>
              <?php endif; ?>

              <?php if (check_feature_access('appointments') == TRUE): ?>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Appointments"){echo "active";} ?>" href="<?php echo base_url('admin/appointment') ?>">
                  <i class="nav-icon far fa-clock"></i> <span><?php echo trans('appointments') ?></span>
                </a>
              </li>
              <?php endif; ?>

              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Calendars"){echo "active";} ?>" href="<?php echo base_url('admin/appointment/calendars') ?>">
                  <i class="nav-icon far fa-calendar-alt"></i> <span><?php echo trans('calendars') ?></span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Location"){echo "active";} ?>" href="<?php echo base_url('admin/location') ?>">
                  <i class="nav-icon lni lni-map"></i> <span><?php echo trans('locations') ?></span>
                </a>
              </li>
              
              <?php if (check_feature_access('staffs') == TRUE): ?>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Staff"){echo "active";} ?>" href="<?php echo base_url('admin/staff') ?>">
                  <i class="nav-icon lni lni-network"></i> <span><?php echo trans('staff') ?></span>
                </a>
              </li>
              <?php endif; ?>


              <?php if (check_feature_access('customers') == TRUE): ?>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Customers" || isset($page) && $page == "Customers"){echo "active";} ?>" href="<?php echo base_url('admin/customers') ?>">
                  <i class="nav-icon lni lni-users"></i> <span><?php echo trans('customers') ?></span>
                </a>
              </li>
              <?php endif; ?>

              <?php if (check_feature_access('services') == TRUE): ?>
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Service"){echo "active";} ?>" href="<?php echo base_url('admin/services') ?>">
                  <i class="nav-icon lni lni-layers"></i> <span><?php echo trans('services') ?></span>
                </a>
              </li>
              <?php endif; ?>
              
              <li class="nav-item">
                <a class="nav-link <?php if(isset($page_title) && $page_title == "Reports"){echo "active";} ?>" href="<?php echo base_url('admin/reports') ?>">
                <i class="nav-icon far fa-chart-bar"></i> <span><?php echo trans('reports') ?> </span>
                </a>
              </li>

              <?php if (empty(get_by_user_id('plan_coupons'))): ?>
                <li class="nav-item d-hide">
                  <a class="nav-link <?php if(isset($page_title) && $page_title == "Redeem Coupon"){echo "active";} ?>" href="<?php echo base_url('admin/coupons/apply') ?>">
                  <i class="nav-icon fas fa-laptop-code"></i> <span><?php echo trans('redeem-coupon') ?> </span>
                  </a>
                </li>
              <?php endif; ?>
            
            <?php endif; ?>

          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>
      


