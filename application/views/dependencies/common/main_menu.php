<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="<?=site_url('dependencies')?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?=site_url('dependencies/main/red_and_amber')?>"><i class="fa fa-fw fa-dashboard"></i> Red and Amber Dependecies</a>
                </li>
                <li>
                    <a href="<?=site_url('dependencies/main/undefined_dependencies')?>"><i class="fa fa-fw fa-dashboard"></i> Undefined Dependencies</a>
                </li>
                <li>
                    <a href="<?=site_url('dependencies/main/this_week_and_next')?>"><i class="fa fa-fw fa-dashboard"></i> This week and Next</a>
                </li>
                <li<?php if ($this->uri->segment(4) != false) { echo ' class="active"'; }?>>
                    <a href="<?=site_url('dependencies/main/view_dependencies')?>"><i class="fa fa-fw fa-th-list"></i> All Dependencies</a>
                    <ul class="nav nav-second-level">
                        <?php foreach ($party_names as $no => $name) { ?>
                        <li<?php if ($this->uri->segment(4) == $name) { echo ' class="active"'; }?>>
                            <a href="<?=site_url('dependencies/main/view_dependencies/'.$name)?>"><?=$name?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <a><i class="fa fa-fw fa-file-powerpoint-o"></i> Export PowerPoint</a>
                </li>
            </ul>
        </div>
    </div>
<!-- /.navbar-collapse -->