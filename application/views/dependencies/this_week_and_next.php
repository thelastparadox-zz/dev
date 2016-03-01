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

    <style>
      .vis-item.vis-background.timeline-background-SysTestConnectivity {
        background-color: #FFFEFC;
      }
      .vis-item.vis-background.timeline-background-SysTestSmoke {
        background-color: #FFFEFC;
      }
      .vis-item.vis-background.timeline-background-SysTestExecution {
        background-color: #F9F4DE;
      }

      .vis-item.vis-background.timeline-background-SITTestConnectivity {
        background-color: #F7F7FF;
      }
      .vis-item.vis-background.timeline-background-SITTestSmoke {
        background-color: #F7F7FF;
      }
      .vis-item.vis-background.timeline-background-SITTestExecution {
        background-color: #EAE8FF;
      }

      .vis-box {}

      .dependency-label {
        font-size: 1`px;
      }

    </style>
</head>

<body>


<div id="visualization"></div>

<script type="text/javascript">
  // DOM element where the Timeline will be attached
  var container = document.getElementById('visualization');

  var groups = new vis.DataSet([
    <?php $groups = array(); $i=1; foreach ($party_names as $no => $party_name) { ?>
        {id: <?=$i?>, content: '<?=$party_name?>'},
    <?php 
        $groups[$party_name] = $i;
        $i++;
     } ?>
  ]);

  // Create a DataSet (allows two way data-binding)
  var items = new vis.DataSet([
    {id: 'A', content: 'Sys Test', start: '2016-03-21', end: '2016-05-02', type: 'background', className: 'timeline-background-SysTestExecution'},
    {id: 'B', content: 'SIT', start: '2016-05-02', end: '2016-07-25', type: 'background', className: 'timeline-background-SITTestExecution'},  

    <?php foreach ($dependency_array as $no => $dependency) { if(isset($dependency['Short Name']) && $dependency['Short Name'] != "" && is_numeric($dependency['Critical Date']) ) { ?>
        {id: <?=$no?>, content: '<div class="dependency-label"><?php if ($dependency['RAG'] == "Red") { ?><i class="fa fa-exclamation-circle" style="color:red;"></i><?php } ?><?php if ($dependency['Accenture Stream'] == "Data Migration") { ?><i class="fa fa-table" style="color:blue;"></i><?php } ?><?php if ($dependency['Accenture Stream'] == "Environments") { ?><i class="fa fa-server" style="color:blue;"></i><?php } ?> <?=$dependency['Short Name']?></div>', start: '<?=date("Y-m-d", $this->dependencies_model->excelDateToPHPDate($dependency['Critical Date']))?>', group: <?=$groups[$dependency['External Party']]?>},
    <?php } } ?>
  ]);

  // Configuration for the Timeline
  var options = {
    orientation: {axis: 'both'}
  };



  // Create a Timeline
  var timeline = new vis.Timeline(container, items, groups, options);
</script>                      

</body>

</html>
