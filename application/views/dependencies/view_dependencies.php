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
                            <?=$thirdparty?> Dependencies
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <?php if ($thirdparty  !== "") { ?>
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> <?=$thirdparty?></h3>
                                </div>
                            <?php } ?>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="display" id="dependencytable">
                                        <thead>
                                            <tr>
                                                <?php if ($this->uri->segment(4) == "") { ?><th>3rd Party</th><?php } ?>
                                                <th>Rag Status</th>
                                                <th>Originally agreed date</th>
                                                <th>Critical Date</th>   
                                                <th>Dependency Description</th>
                                                <th>Action Plan ACN Owner</th>
                                                <th>Clarks Owner</th>
                                                <th>Current forecast date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-hover">
                                            <?php foreach ($dependency_array as $no => $dependency) { ?>
                                            <tr>
                                                <?php if ($this->uri->segment(4) == "") { ?><td><b><a href="<?=site_url('dependencies/main/view_dependencies/'.$dependency['External Party'])?>"><?=$dependency['External Party']?></a></b></td><?php } ?>
                                                <td
                                                    <?php 
                                                        if ($dependency['RAG'] == "Red") 
                                                        { 
                                                            echo ' style ="background:#FF0000; color: #FFFFFF; text-align:center;"'; 
                                                        } 
                                                        elseif ($dependency['RAG'] == "Amber") { 
                                                            echo ' style ="background:#FFC200"'; 
                                                        } 
                                                        else
                                                        {
                                                            echo ' style ="background:#00ff00"'; 
                                                        }
                                                    ?>>
                                                    <?=$dependency['RAG']?>
                                                </td>
                                                <td><?=$this->dependencies_model->displayExcelDate($dependency['Original Date'])?></td>
                                                <td><?=$this->dependencies_model->displayExcelDate($dependency['Critical Date'])?></td>
                                                <td><a href="<?=site_url('dependencies/main/view_dependency/'.$dependency['Dependency ID'])?>"><?=$dependency['Description']?></a></td>
                                                <td><?=$dependency['Accenture Owner']?></td>
                                                <td><?=$dependency['Clarks Owner']?></td>
                                                <td><?php if (isset($dependency['Current Date'])) { echo $this->dependencies_model->displayExcelDate($dependency['Current Date']); } ?></td>  
                                                <td><span style="float:left;"><button type="button" class="btn btn-default btn-circle" onclick="location.href='<?=site_url('dependencies/main/edit_dependency/'.$dependency['Dependency ID'])?>';"><i class="fa fa-edit"></i></button></span></td>                                           
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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
