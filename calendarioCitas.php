<?php

session_start();

date_default_timezone_set("America/Santiago");
include 'calendarioFunciones.php';
include 'calendarioConfig.php';
include_once("libreria/head.php");

if (isset($_POST['from'])) 
{

    if ($_POST['from']!="" AND $_POST['to']!="") 
    {


        $inicio = _formatear($_POST['from']);

        $final  = _formatear($_POST['to']);

        $inicio_normal = $_POST['from'];

        $final_normal  = $_POST['to'];

        $titulo = evaluar($_POST['title']);

        $body   = evaluar($_POST['event']);

        $clase  = evaluar($_POST['class']);

        $query="INSERT INTO citas VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

        $conexion->query($query); 

        $im=$conexion->query("SELECT MAX(id) AS id FROM citas");
        $row = $im->fetch_row();  
        $id = trim($row[0]);


        $link = "$base_url"."descripcion_evento.php?id=$id";

  
        $query="UPDATE citas SET url = '$link' WHERE id = $id";

   
        $conexion->query($query); 


        header("Location:$base_url"); 
    }
}

?>

        <div class="container">



<div class="borde1">
 <center><font color="red" face="Algerian"><div class="page-header"><h2></h2></div></font></center>
    <center>
                        <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-nav="prev"><< Anterior</button>
                        <button class="btn btn-primary" data-calendar-nav="today">Hoy</button>
                        <button class="btn btn-warning" data-calendar-nav="next">Siguiente >></button>
                        </div><br><br>
                        <div class="btn-group">
                        <button class="btn btn-info" data-calendar-view="year">Año</button>
                        <button class="btn btn-info active" data-calendar-view="month">Mes</button>
                        <button class="btn btn-info" data-calendar-view="week">Semana</button>
                        <button class="btn btn-info" data-calendar-view="day">Dia</button>
                        </div>
                        <br>
    </center>                                    

        <div class="row">
        <div id="calendar"></div> 
        <br><br>
        </div>
<br>
<br>
<br>
        </div>
        <br>
        <br>
        <br>
    </center>

    <script src="<?=$base_url?>js/underscore-min.js"></script>
    <script src="<?=$base_url?>js/calendar.js"></script>
    <script type="text/javascript">

        (function($){

                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

     
                var options = {

                
                        modal: '#events-modal', 

              
                        modal_type:'iframe',    

              
                        events_source: '<?=$base_url?>obtener_eventos.php', 

                 
                        view: 'month',             

               
                        day: yyyy+"-"+mm+"-"+dd,   


             
                        language: 'es-ES', 

                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,


              
                

                        time_split: '30',    

                
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });

                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar nueva cita</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
                    <label for="from">Tiempo de inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="to">Tiempo de finalizacion</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="tipo">Tipo de cita</label>
                    <select class="form-control" name="class" id="tipo">
                        <option value="event-info">Chequeo General</option>
                        <option value="event-success">Radiografia</option>
                        <option value="event-important">Entrevista para Empleo</option>
                        <option value="event-warning">Pasantia Medica</option>
                        <option value="event-special">Otro</option>
                    </select>

                    <br>


                    <label for="title">Motivo de cita</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

                    <br>


                    <label for="body">Descripcion de la cita</label>
                    <textarea id="body" name="event" required class="form-control" rows="3"></textarea>

    <script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                language: 'es',
                minDate: new Date()
            });
            $('#to').datetimepicker({
                language: 'es',
                minDate: new Date()
            });

        });
    </script>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>

<?php include_once("libreria/foot.php"); ?>