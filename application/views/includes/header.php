<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Auto Tabulation</title>

    <!-- Favicons -->
    <link href="<?php echo base_url('assets/img/LLogo.png'); ?>" rel="icon">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    
    <!--external css-->
    <link href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/lib/advanced-datatable/css/demo_page.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/lib/advanced-datatable/css/demo_table.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/lib/advanced-datatable/css/DT_bootstrap.css'); ?>" />
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/zabuto_calendar.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/gritter/css/jquery.gritter.css'); ?>" />

    <script src="<?php echo base_url('assets/lib/chart-master/Chart.js'); ?>"></script>

    <style type="text/css">
        #tabHead
        {
            background-color: white;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            margin-bottom: -10px;
        }

        #btnAddParticipant
        {
            margin-top:-8px;
            margin-right: 10px;
        }

        #btnAddParticipant:hover
        {
            color: black;
        }

        #searchBranch
        {
            width: 30%;
            margin-top: -25px;
            margin-right: 10px;
        }

        #noResult
        {
            margin-left: 20px;
        }

        #searchParticipant
        {
            width: 30%;
            margin-top: -25px;
            margin-right: 10px;
        }

        #btn-edit
        {
            margin-top: -8px;
            margin-right: 5px;
        }

        #BtnClear
        {
            margin-top: -10px;
        }

        #addAdminBtn
        {
          margin-top: -48px;
          margin-right: 20px;
        }
    </style>
  </head>

<body id="refreshBody">
  <section id="container">
