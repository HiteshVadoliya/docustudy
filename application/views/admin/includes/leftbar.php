<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
         <li class="header">MAIN NAVIGATION</li>
         <li class="treeview <?= $this->general->active_class('Home') ?>">
            <a href="<?= base_url(ADMIN) ?>">
               <i class="fa fa-th"></i> <span>Dashboard</span>
            </a>
         </li>

         <li class="treeview <?php if(isset($ActiveMenu) && $ActiveMenu == 'documents'){ echo 'active'; } ?> ">
            <a href="<?= base_url(ADMIN) ?>manage-documents">
               <i class="fa fa-book"></i> <span>Documents</span>
            </a>
         </li>
         <?php /*
         <li class="treeview <?php if(isset($ActiveMenu) && ($ActiveMenu == 'Manage School' || $ActiveMenu == 'Add School')) { echo 'active'; } ?>">
            <a href="javascript:void(0);">
               <i class="fa fa-university"></i> <span>Salary</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage School'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'salary') ?>"><i class="fa fa-angle-double-right"></i>Manage Salary</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Add School'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'salary/add') ?>"><i class="fa fa-angle-double-right"></i> Add Salary</a></li>
            </ul>
         </li>
         
         
         <li class="treeview <?php if(isset($ActiveMenu) && ($ActiveMenu == 'Manage School' || $ActiveMenu == 'Add School')) { echo 'active'; } ?>">
            <a href="javascript:void(0);">
               <i class="fa fa-university"></i> <span>Demo</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage School'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-demo') ?>"><i class="fa fa-angle-double-right"></i>Manage Demo</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Add School'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'add-demo') ?>"><i class="fa fa-angle-double-right"></i> Add Demo</a></li>
            </ul>
         </li>
         */ ?>

         <li class="treeview <?php if(isset($ActiveMenu) && ($ActiveMenu == 'Manage Story' || $ActiveMenu == 'Add Story')) { echo 'active'; } ?>">
            <a href="javascript:void(0);">
               <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span>Story</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage Story'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-story') ?>"><i class="fa fa-angle-double-right"></i>Manage Story</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Add Story'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'add-story') ?>"><i class="fa fa-angle-double-right"></i> Add Story</a></li>
            </ul>
         </li>

         <li class="treeview <?php if(isset($ActiveMenu) && ($ActiveMenu == 'Manage Faq' || $ActiveMenu == 'Add Faq')) { echo 'active'; } ?>">
            <a href="javascript:void(0);">
               <i class="fa fa-question" aria-hidden="true"></i> <span>FAQ</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage Faq'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-faq') ?>"><i class="fa fa-angle-double-right"></i>Manage FAQ</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Add Faq'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'add-faq') ?>"><i class="fa fa-angle-double-right"></i> Add FAQ</a></li>
            </ul>
         </li>



         <li class="treeview <?php if(isset($ActiveMenu) && $ActiveMenu == 'users'){ echo 'active'; } ?>">
            <a href="<?= base_url(ADMIN.'manage-users') ?>">
               <i class="fa fa-users"></i> <span>Users</span>
            </a>
         </li>

         <li class="treeview <?php if(isset($ActiveMenu) && ($ActiveMenu == 'Manage about' || $ActiveMenu == 'Manage who we are' || $ActiveMenu == 'Manage What we do' )) { echo 'active'; } ?>">
            <a href="javascript:void(0);">
               <i class="fa fa-product-hunt"></i> <span>About Pages</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage about') { echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-about') ?>"><i class="fa fa-angle-double-right"></i>Manage About</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage who we are') { echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-who-we-are') ?>"><i class="fa fa-angle-double-right"></i>Who we are</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage What we do') { echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-what-we-do') ?>"><i class="fa fa-angle-double-right"></i>What we do</a></li>
            </ul>
         </li>

         <li class="treeview <?php if(isset($ActiveMenu) && ($ActiveMenu == 'Manage Terms' || $ActiveMenu == 'Manage Privacy' || $ActiveMenu == 'Manage How it Works' || $ActiveMenu == 'Manage cookie statement' )) { echo 'active'; } ?>">
            <a href="javascript:void(0);">
               <i class="fa fa-product-hunt"></i> <span>CMS Pages</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage Terms'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-terms') ?>"><i class="fa fa-angle-double-right"></i>Terms Of Use</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage Privacy'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-privacy') ?>"><i class="fa fa-angle-double-right"></i>Privacy policy</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage cookie statement'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'cookie-statement') ?>"><i class="fa fa-angle-double-right"></i>Manage cookie statement</a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage about'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-about') ?>"><i class="fa fa-angle-double-right"></i>Manage About</a></li>
               <!-- <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage How it Works'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'manage-howitworks') ?>"><i class="fa fa-angle-double-right"></i>How it Works</a></li> -->
            </ul>
         </li>

         <li class="treeview <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage Newsletter'){ echo 'class="active"'; } ?>">
            <a href="<?= base_url(ADMIN.'newsletter') ?>">
               <i class="fa fa-envelope"></i> <span>Newsletter</span>
            </a>
         </li>
         
         
         
         <li class="treeview <?php if(isset($ActiveMenu) && ($ActiveMenu == 'Setting' || $ActiveMenu == 'Edit-contact' || $ActiveMenu == 'Manage Social Media')){ echo 'active'; } ?>">
            <a href="javascript:void(0);">
               <i class="fa fa-cog" aria-hidden="true"></i> <span>Website Settings</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Edit-contact'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'edit-contact') ?>"><i class="fa fa-phone"></i> Edit Contact </a></li>
               <li class="treeview <?php if(isset($ActiveMenu) && $ActiveMenu == 'Manage Social Media'){ echo 'class="active"'; } ?>"><a href="<?= base_url(ADMIN.'social-media') ?>"><i class="fa fa-globe"></i> <span>Social Media</span></a></li>
               <li <?php if(isset($ActiveMenu) && $ActiveMenu == 'Setting'){ echo 'class="active"'; } ?>><a href="<?= base_url(ADMIN.'Configuration/setting') ?>"><i class="fa fa-cog" aria-hidden="true"></i>Manage Website Identity</a></li>
            </ul>
         </li>
         
      </ul>
   </section>
   <!-- /.sidebar -->
</aside>