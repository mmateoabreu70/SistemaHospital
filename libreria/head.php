<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="shortcut icon" href="source/logo/hospital.svg">
    <!--main js-->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/main.js"></script>

    <!--css-->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#cedula').mask('000-0000000-0');
            $('#telefono').mask('000-000-0000');

            if ($('#cedula').val() !== '') {
                $('#datosPersona').submit();
            }
        });
    </script>

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
                    <p><?php echo $_SESSION['rol'] ?></p>
                </div>

                <li class="active">
                    <a href="calendarioCitas.php">Calendario de citas</a>
                </li>

                <?php if($_SESSION['rol'] == 'Administrador'): ?>

                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuarios</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="AdminUsuario.php" class="subOpcion">Administrar</a>
                            </li>
                            <li>
                                <a href="CrearUsuario.php" class="subOpcion">Crear usuario</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="reporteSistema.php?pag=1">Reportes del sistema</a>
                    </li>
                    <li class="active">
                        <a href="precioConsulta.php">Precio de consultas</a>
                    </li>
                    <li class="active">
                        <a href="CitasPendientesPorDia.php">Buscar citas</a>
                    </li>

                <?php endif ?>
                
                <?php if($_SESSION['rol'] == 'Asistente'): ?>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pacientes</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="validarCedula.php" class="subOpcion">Crear paciente</a>
                            </li>
                            <li>
                                <a href="verPacientes.php" class="subOpcion">Ver pacientes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Citas</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu2">
                            <li class="active">
                                <a href="asignarCitas.php" class="subOpcion">Asignar Citas</a>
                            </li>
                            <li class="active">
                                <a href="CitasPendientesPorDia.php" class="subOpcion">Buscar citas</a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="CumpleañosPorMes.php">Reporte de cumpleaños</a>
                    </li>
                <?php endif ?>

                <?php if($_SESSION['rol'] == 'Medico'): ?>
                    <li class="active">
                        <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Citas</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu2">
                            <li class="active">
                                <a href="asignarCitas.php" class="subOpcion">Asignar Citas</a>
                            </li>
                            <li class="active">
                                <a href="CitasPendientesPorDia.php" class="subOpcion">Buscar citas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="Visita-Medico.php">Registrar visita</a>
                    </li>
                    <li class="active">
                        <a href="Ver_Dinero.php">Ver total recaudado</a>
                    </li>
                <?php endif?>
            </ul>
        </nav>

        <!--Contenido de la pagina-->
        <div id="content">

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

            <div id="main">



    

