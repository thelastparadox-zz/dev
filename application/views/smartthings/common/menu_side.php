            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li<?php if ($this->uri->segment(3) == "") { ?> class="active"<?php } ?>>
                        <a href="<?=site_url('smartthings')?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li<?php if ($this->uri->segment(3) == "temperature_control") { ?> class="active"<?php } ?>>
                        <a href="<?=site_url('smartthings/main/temperature_control')?>"><i class="fa fa-fw fa-sun-o"></i> Temperature Control</a>
                    </li>
                    <li<?php if ($this->uri->segment(3) == "livelog") { ?> class="active"<?php } ?>>
                        <a href="<?=site_url('smartthings/main/livelog')?>"><i class="fa fa-fw fa-table"></i> Live Log</a>
                    </li>
                    <li<?php if ($this->uri->segment(3) == "room_assignments") { ?>  class="active"<?php } ?>>
                        <a<?php if ($this->uri->segment(3) == "room_assignments") { ?>  aria-expanded="true"<?php } ?> href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Settings <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse<?php if ($this->uri->segment(3) == "room_assignments") { ?>  in<?php } ?>"<?php if ($this->uri->segment(3) == "room_assignments") { ?>  aria-expanded="true"<?php } ?>>
                            <li>
                                <a href="<?=site_url('smartthings/main/room_assignments')?>">Room Associations</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->