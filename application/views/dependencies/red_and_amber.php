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
                            Red and Amber Dependencies
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>3rd Party</th>
                                                <th>Rag Status</th>
                                                <th>Originally agreed date</th>
                                                <th>Critical Date</th>   
                                                <th>Dependency Description</th>
                                                <th>ACN Owner</th>
                                                <th>Clarks Owner</th>
                                                <th>Current forecast date</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-hover">
                                            <?php foreach ($dependency_array as $no => $dependency) { ?>
                                            <tr>
                                                <td><b><?=$dependency['External Party']?></b></td>
                                                <td
                                                    <?php 
                                                        if ($dependency['RAG'] == "Red") 
                                                            { 
                                                                echo ' style ="background:#FF0000; color: #FFFFFF; text-align:center;"'; 
                                                            } 
                                                            elseif ($dependency['RAG'] == "Amber") { 
                                                                echo ' style ="background:#FFC200"'; 
                                                            } 
                                                    ?>>
                                                    <?=$dependency['RAG']?>
                                                </td>
                                                <td><?=$this->dependencies_model->displayExcelDate($dependency['Original Date'])?></td>
                                                <td><?=$this->dependencies_model->displayExcelDate($dependency['Critical Date'])?></td>
                                                <td><a href="<?=site_url('dependencies/main/view_dependency/'.$dependency['Dependency ID'])?>"><?=$dependency['Description']?></a></td>
                                                <td><?=$dependency['Accenture Owner']?></td>
                                                <td><?=$dependency['Clarks Business Owner']?></td>
                                                <td><?php if(isset($dependency['Current Date'])) { $this->dependencies_model->displayExcelDate($dependency['Current Date']); } ?></td>
                                                <td>
                                                    <span style="float:left;"><button type="button" class="btn btn-default btn-circle" onclick="location.href='<?=site_url('dependencies/main/edit_dependency/'.$dependency['Dependency ID'])?>';"><i class="fa fa-edit"></i></button></span>
                                                </td>                                             
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
