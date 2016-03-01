<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Torrents</title>

    <?php $this->load->view('torrents/common/header_includes'); ?>

    <?php $this->load->view('torrents/common/header_includes_ajax'); ?>

</head>

<body>

    <div id="search-wrapper">
        <div id="SearchBoxTitle"><h2>Torrent Search</h2></div>
        <div id="AjaxLoading"><img src="http://preloaders.net/preloaders/477/Intersection.gif" /></div>
        <div id="SearchBox-wrapper">  
            <div id="info"></div>
            <ul class="nav" id="search-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" id="SearchBox" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
            </ul>
        </div>

    </div>
    <!-- /#wrapper -->

</body>

</html>
