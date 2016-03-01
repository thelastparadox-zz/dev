<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PANGAEA2: 3rd Party Dependencies Overview</title>

    <?php $this->load->view('dependencies/common/header_includes'); ?>

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view('dependencies/common/top_navigation'); ?>
            <?php $this->load->view('dependencies/common/main_menu'); ?>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?=$dependency_info['External Party']?> Dependency ID #<?=$dependency_info['Dependency ID']?>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3"><?=$dependency_info['Description']?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Clarks Owner</label>
                                <input class="form-control" name="Clarks Owner" value="<?=$dependency_info['Clarks Owner']?>" placeholder="Enter Text">
                            </div>
                            <div class="form-group">
                                <label>Accenture Owner</label>
                                <input class="form-control" name="Accenture Owner" value="<?=$dependency_info['Accenture Owner']?>" placeholder="Enter Text">
                            </div>
                            <div class="form-group">
                                <label>3rd Party</label>
                                <select class="form-control" name="External Party">
                                    <?php foreach ($party_names as $no => $party) { ?>
                                    <option<?php if ($party == $dependency_info['External Party']) { echo ' selected="selected"'; }?>><?=$party?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="timeline">
                                    <?php foreach($dependency_actions as $no => $dependency_action) { ?>
                                    <li>
                                        <div class="timeline-badge">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <p><small class="text-muted"><i class="fa fa-clock-o"></i> $dependency_action['']</small>
                                                </p>
                                            </div>
                                            <div class="timeline-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/houseprices/js/jquery.js"></script>
    <script src="http://www.flotcharts.org/flot/jquery.flot.js"></script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/houseprices/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url()?>assets/houseprices/js/plugins/morris/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/houseprices/js/plugins/morris/morris.min.js"></script>
    <script src="<?=site_url('houseprices/main/main_chart_data')?>"></script>

</body>

</html>
