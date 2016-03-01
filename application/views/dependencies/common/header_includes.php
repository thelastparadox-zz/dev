    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Jquery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>


    <script src="http://www.flotcharts.org/flot/jquery.flot.js"></script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- VisJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.14.0/vis.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.14.0/vis.min.css">

    <script type="text/javascript">
        $(document).ready( function () {
            
            // Auto Sorted Tables
            $('#dependencytable').DataTable();
        } );
    </script>

    <?php if ($this->uri->segment(2) == false) { ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['RAG', 'Number of Dependencies'],
          <?php $i=1; foreach ($rag_total_array as $RAG => $total) { ?>
          ['<?=$RAG?>', <?=$total?>]<?php if ($i < count($rag_total_array)) { echo ","; } } ?>
        ]);

        var options = {
          slices: {
            0: {color: '#FF0000'},
            1: {color: '#FFC200'},
            2: {color: '#00ff00'}
          },
          legend: 'none',
          chartArea: {'width': '100%', 'height': '100%'},
          pieSliceText: 'value'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <?Php } ?>
       
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->