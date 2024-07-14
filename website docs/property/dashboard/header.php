
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BUY|SELL|DAMAGED|REPAIRED|PRODUCTS</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">


   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body style="background-color:#D1D0CE;color"#fff>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel"style="background-color:#070719;color:#fff">
        <nav class="navbar navbar-expand-sm navbar-default"style="background-color:#070719;color:#fff">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav"style="background-color:#070719;color:#fff">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>User Dashboard </a>
                    </li>
                    <li class="menu-title">Welcome Client</li>
                    <li class="menu-item-has-children ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-product-hunt"></i>Product Orders</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-product-hunt"></i><a href="myorders.php">My Orders</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-product-hunt"></i>Sell Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-product-hunt"></i><a href="addproduct.php">Add Product</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="myproducts.php">My Products</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header"style="background-color:#070719;color:#fff">
            <div class="top-left">
                <div class="navbar-header"style="background-color:#070719;color:#fff">
                    <a class="navbar-brand" href="./"><img src="images/lg1.jpg" alt="Logo" width="100"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/lg1.jpg" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    

                    <div class="user-area dropdown float-right" style="background-color:#070719;color:#fff">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/prof.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu"style="background-color:#033E3E;color:#fff">

                            <a class="nav-link" href="../logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->