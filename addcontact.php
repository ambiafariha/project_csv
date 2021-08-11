<?php  include "inc/permission.php"; ?>
<?php  include "inc/db.php"; ?>
<?php

  if(isset($_POST['submit'])){
      
      $name     = $_POST['name'];
      $email    = $_POST['email'];
      $comments = $_POST['comments'];
      $mobile = $_POST['mobile'];
      
      $query = "INSERT INTO contact_list (name, email, mobile, message, subject, ip) VALUES ('{$name}','{$email}','{$mobile}','{$comments}','{$e_subject}','{$ip_address}')";
      $add_to_database = mysqli_query($connection, $query);
      
      if($add_to_database){
          $_SESSION['status']="Successfully Data Saved Into Database";
      }else{
          $_SESSION['status']="Something Is Wrong";
      }
  }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Contact</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/jqvmap.min.css">
        <link rel="stylesheet" href="assets/css/adminlte.min.css">
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <style> @import url('https://fonts.googleapis.com/css2?family=Benne&display=swap'); </style>
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
                        <a href="#" class="nav-link">Add Contact</a>
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
                                    <li class="breadcrumb-item">Log In</li>
                                    <li class="breadcrumb-item active">Add Contact</li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container">
                        <!-- Main content -->
                        <section class="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-primary">
                                        <div class="card-header" style="background-color:#ff9800;">
                                            <h3 class="card-title"><i class="fas fa-calendar-plus"></i>&nbsp;&nbsp;Add New Data</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            
                                            <?php
                                            if(isset($_SESSION['status'])){
                                                if($_SESSION['status']=='Successfully Data Saved Into Database'){
                                                ?>
                                                   <div class="alert alert-success" role="alert">
                                                      <?php echo $_SESSION['status']; ?>
                                                   </div> 
                                                <?php    
                                                }else{
                                                ?>
                                                   <div class="alert alert-danger" role="alert">
                                                      <?php echo $_SESSION['status']; ?>
                                                   </div> 
                                            <?php
                                                }
                                            }
                                            ?>
                                              
                                            
                                            <form  method="post">
                                                <div class="form-group">
                                                    <label for="inputName">Full Name</label>
                                                    <input type="text" id="inputName" class="form-control" placeholder="Full Name" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mail">E-Mail</label>
                                                    <input type="email" id="mail" class="form-control" placeholder="E-Mail" name="email" required>
                                                </div>
                                                 
                                                <div class="form-group">
                                                    <label for="contact">Contact Number</label>
                                                    <input type="text" id="contact" class="form-control" placeholder="Contact Number" name="mobile" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="msg">Message</label>
                                                    <textarea id="msg" class="form-control" rows="4" placeholder="Message" name="comments" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-secondary" name="submit"><i class="fas fa-file-export"></i>&nbsp;Save</button>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-secondary">
                                        <div class="card-header" style="background-color:#795548">
                                            <h3 class="card-title">File Import/Export</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="import">Import Contact List</label>
                                                <input type="file" id="import" class="form-control">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                    <div class="card card-info">
                                        <!--
                                        <div class="card-header">
                                            <h3 class="card-title">Files</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>E-Mail</th>
                                                        <th>Contact Number</th>
                                                        <th class="text-right py-0 align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Nm</td>
                                                        <td>Mail</td>
                                                        <td>Conatct Number</td>
                                                        <td class="text-right py-0 align-middle">
                                                            <div class="btn-group btn-group-sm">
                                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        -->
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </section>
                        <!-- /.content -->
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