 <!--sidebar start-->
 <aside>
     <div id="sidebar" class="nav-collapse ">
         <!-- sidebar menu start-->
         <ul class="sidebar-menu">
             <li class="active">
                 <a class="" href="<?php echo BASE_URL . '/OCS/index.php' ?>">
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
                     <li><a class="" href="<?php echo BASE_URL . '/OCS/cases/index.php' ?>">View Cases</a></li>
                 </ul>
             </li>
             <li class="sub-menu">
                 <a href="javascript:;" class="">
                     <i class="icon_desktop"></i>
                     <span>Officers</span>
                     <span class="menu-arrow arrow_carrot-right"></span>
                 </a>
                 <ul class="sub">
                     <li><a class="" href="<?php echo BASE_URL . '/OCS/officers/view.php' ?>">View Officers</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/OCS/officers/register.php' ?>">Register</a></li>
                 </ul>
             </li>
             <li class="sub-menu">
                 <a href="javascript:;" class="">
                     <i class="icon_desktop"></i>
                     <span>Investigation</span>
                     <span class="menu-arrow arrow_carrot-right"></span>
                 </a>
                 <ul class="sub">
                     <li><a class="" href="<?php echo BASE_URL . '/OCS/investigation/investigator.php' ?>">Cases Investigators</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/OCS/investigation/evidences.php' ?>">Case Evidences</a></li>
                 </ul>
             </li>

             <li class="sub-menu">
                 <a href="javascript:;" class="">
                     <i class="icon_documents_alt"></i>
                     <span>Pages</span>
                     <span class="menu-arrow arrow_carrot-right"></span>
                 </a>
                 <ul class="sub">
                     <li><a class="" href="<?php echo BASE_URL . '/OCS/profile/profile.php' ?>">Profile</a></li>
                     <li><a class="" href="<?php echo BASE_URL . '/logout.php' ?>"><span>Logout</span></a></li>
                 </ul>
             </li>

         </ul>
         <!-- sidebar menu end-->
     </div>
 </aside>
 <!--sidebar end-->
