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
                            3rd Party Dependencies <small>Overview</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Dependencies by RAG Status</h3>
                            </div>
                            <div class="panel-body">
                                <div id="piechart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Next 5 Dependency Dates</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php foreach ($next_5_dependencies as $no => $dependency) { ?>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-chevron-right fa-fw"></i> <b><?=$dependency['External Party']?>: </b> <?=$dependency['Description']?>
                                        <span class="pull-right text-muted small"><em><?=date("jS M Y", $this->dependencies_model->excelDateToPHPDate($dependency['Critical Date']))?></em>
                                        </span>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Next Steps</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php foreach ($logical_next_steps as $no => $next_step) { ?> 
                                    <a href="#" class="list-group-item">
                                        <button type="button" class="btn btn-primary btn-circle" onclick="javascript:window.location='mailto:Insert Email Address'"><i class="fa fa-envelope-o"></i></button> <?=$next_step['action']?>
                                    </a>
                                <?php } ?>
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

</body>

</html>
