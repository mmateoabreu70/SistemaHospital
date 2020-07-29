<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--main js-->
    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/main.js"></script>

    <!--css-->
    <link rel="stylesheet" href="css/main.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <style>
        body {
            background-image: url('source/background-login.jpg');
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!--Barra lateral-->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="source/logo/hospital.svg" width="80" height="80">
                <p>Sistema <br/> Hospital</p>
            </div>

            <ul class="list-unstyled components">
                <div id="sidebar-subheader">
                    <p>Administrador</p>
                </div>   

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#" class="subOpcion">Home 1</a>
                        </li>
                        <li>
                            <a href="#" class="subOpcion">Home 2</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#">Opcion 2</a>
                </li>
                <li class="active">
                    <a href="#">Opcion 3</a>
                </li>
                <li class="active">
                    <a href="#">Opcion 4</a>
                </li>
                <li class="active">
                    <a href="#">Opcion 5</a>
                </li>

            </ul>

            <div id="sidebar-foot"></div>
        </nav>

        <!--Contenido de la pagina-->
        <div id="content">

            <?php if(isset($_SESSION['user'])){ ?>
                <nav class="navbar navbar-expand navbar-light bg-light" >
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="">
                            <img src="source/icons/open-menu.svg" width="25" height="25" id="menuIcon">
                            <span>Menu</span>
                        </button>

                        <a class="navbar-brand mb-0 h1" href="#">
                            <img src="source/logo/hospital.svg" width="40" height="40" class="d-inline-block align-top">
                            Sistema Hospital
                        </a>

                        <a href="funciones.php?accion=logout" class="ml-auto">
                            <img src="source/icons/logout.svg" class="" width="25" height="25" title="Cerrar sesion">
                        </a>

                    </div>
                </nav>
            <?php } ?>

            <div id="main">



    

