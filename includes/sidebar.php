 <!--sidebar start-->
 <aside>
     <div id="sidebar" class="nav-collapse ">
         <!-- sidebar menu start-->
         <ul class="sidebar-menu">
             <li class="active">
                 <a class="" href="index.php">
                     <i class="icon_house_alt"></i>
                     <span>Dashboard</span>
                 </a>
             </li>
             <li class="sub-menu">
                 <a href="javascript:;" class="">
                     <i class="icon_document_alt"></i>
                     <span>Cases</span>
                     <span class="menu-arrow arrow_carrot-right"></span>
                 </a>
                 <ul class="sub">
                     <li><a class="" href="<?php echo BASE_URL . '/police/cases/index.php' ?>">View Cases</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/police/cases/accuser.php' ?>">Register Accuser</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/police/cases/accused.php' ?>">Register Accused</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/police/cases/case.php' ?>">Register case</a></li>
                 </ul>
             </li>
             <li class="sub-menu">
                 <a href="javascript:;" class="">
                     <i class="icon_desktop"></i>
                     <span>Case Monitoring</span>
                     <span class="menu-arrow arrow_carrot-right"></span>
                 </a>
                 <ul class="sub">
                     <li><a class="" href="<?php echo BASE_URL . '/police/Investigation/investigation.php' ?>">Investigation</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/police/Investigation/evidences.php' ?>">Evidences</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/police/Investigation/repo.php' ?>">Investigation Report</a></li>
                 </ul>
             </li>
      
   
             <li class="sub-menu">
                 <a href="javascript:;" class="">
                     <i class="icon_documents_alt"></i>
                     <span>Pages</span>
                     <span class="menu-arrow arrow_carrot-right"></span>
                 </a>
                 <ul class="sub">
                 <li><a class="" href="<?php echo BASE_URL . '/police/profile/profile.php' ?>">Profile</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/logout.php' ?>"><span>Logout</span></a></li>
                 </ul>
             </li>

         </ul>
         <!-- sidebar menu end-->
     </div>
 </aside>
 <!--sidebar end-->
