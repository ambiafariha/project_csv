<?php  include "inc/permission.php"; ?>
<?php  include "inc/db.php"; ?>
<?php  include "inc/fetch_contact.php"; ?>
<?php

  if(isset($_POST['submit'])){
       
      $data= $_POST['list'];
      if(count($data)>0){
          
          $filename = "contact-list.csv";
          $fp = fopen('php://output', 'w');
          $header[0]="Name";
          $header[1]="E-Mail";
          $header[2]="Mobile";
          $header[3]="Subject";
          $header[4]="Message";
          $header[5]="Ip";

          header('Content-type: application/csv');
          header('Content-Disposition: attachment; filename='.$filename);
          fputcsv($fp, $header);

          for($i=0;$i<count($data);$i++){
            $query = "SELECT name,email,mobile,subject,message,ip FROM contact_list where id='$data[$i]'";
            $result = mysqli_query($connection,$query);
            while ($row = mysqli_fetch_row($result)) {
		       fputcsv($fp, $row);
            }
          }
      
       exit();
       
      }else{
          include "inc/fetch_contact.php"; 
      }
  }

?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/jqvmap.min.css">
        <link rel="stylesheet" href="assets/css/adminlte.min.css">
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <style> @import url('https://fonts.googleapis.com/css2?family=Benne&display=swap');</style>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Benne', serif; font-size: 18px;color: rgba(0, 0, 0, 0.5);">
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="/images/logo192.png" alt="logo" height="60" width="60">
            </div>
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="navbar-search-block">
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
            </nav>

            <!--import menu -->
            <?php  include "inc/menu.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0"></h1>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active">Contact</li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="card card-primary">
                        <div class="card-header" style="background-color:#708090;">
                            <h3 class="card-title"><i class="fas fa-list"></i>&nbsp;&nbsp;Contact List</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <form method="post">
                                    <table class="table">
                                        <tr>
                                            <input type='checkbox' onclick="mark(this);" id="checkid" />&nbsp;&nbsp;Mark/UnMark All
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Contact Number</th>
                                        </tr>
                                        <?php
                                    foreach ($data as $row){ 
                                          echo "<tr>";
                                    ?>
                                        <td>
                                            <input type='checkbox' name='list[]' value="<?php echo $row['id'] ?>" id="checkid" />
                                        </td>
                                        <?php
                                          echo "<td>";
                                          echo $row['name'];
                                          echo "</td>";
                                          echo "<td>";
                                          echo $row['email'];
                                          echo "</td>";
                                          echo "<td>";
                                          echo $row['subject'];
                                          echo "</td>";
                                          echo "<td>";
                                          echo $row['message'];
                                          echo "</td>";
                                          echo "<td>";
                                          echo $row['mobile'];
                                          echo "</td>";
                                          echo "</tr>";
                                    }
                                  ?>
                                    </table>
                                    <button type="submit" value="Submit" name="submit" class="btn btn-secondary"><i class="fas fa-download"></i>&nbsp;&nbsp;Export It On CSV</button>
                                </form>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </section>
            </div>
            <!-- import footer-->
            <?php include "inc/footer.php"; ?>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>

        <!-- import js -->
        <?php include "inc/js.php"; ?>
    
    </body>

</html>