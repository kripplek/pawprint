
<!-- Main content starts -->

<div class="content">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <div class="sidebar-inner">

          <!--- Sidebar navigation -->
          <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
          <ul class="navi">

            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet, yellow, grey or norange to add background color. You need to use this in <li> tag. -->

            <li class="begrey "><a href="/home/"><i class="icon-desktop"></i> Dashboard</a></li>

        <?php
        //get the nav bar from the template file
        $nav = new Template;
        $nav = $nav->getNavBar();
        foreach($nav as $item =>$parts):?>
        <?php
            $extraClass= (in_array($this->uriPath,$parts))?'open':'';

        ?>
            <!-- Menu with sub menu -->
            <li class="has_submenu yellow <?php echo $extraClass?>">
              <a href="#">
                <!-- Menu name with icon -->
                <i class="icon-th"></i><?php echo $item?>
                <!-- Icon for dropdown -->
                <span class="pull-right"><i class="icon-angle-right"></i></span>
              </a>

              <ul>
                <?php foreach($parts as $displayName =>$path):?>
                    <li><a href="<?php echo $path ?>"><?php echo $displayName ?></a></li>
                <?php endforeach;?>
              </ul>
            </li>
        <?php endforeach;?>



          </ul>

          <!-- Date -->

          <div class="sidebar-widget">
            <?php echo date('Y-m-d');?>
            <?php echo Template::getSideBarWidget()?>
          </div>



        </div>

    </div>

    <!-- Sidebar ends -->

