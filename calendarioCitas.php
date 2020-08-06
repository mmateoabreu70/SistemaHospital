<?php

session_start();
include_once("libreria/includes.php");

include 'CalendarioConfig.php'; 
include 'CalendarioFunciones.php';

if (isset($_POST['from'])) 
{

    if ($_POST['from']!="" AND $_POST['to']!="") 
    {

        $im = $conexion->query("SELECT MAX(id) AS id FROM citas");
        $row = $im->fetch_row();  
        $id = trim($row[0]);


        header("Location:$base_url"); 
    }
}

?>


<div class="container">


<div class="borde1"><br>
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

              
                        events_source: '<?=$base_url?>obtener_citas.php', 

                 
                        view: 'month',             

               
                        day: yyyy+"-"+mm+"-"+dd,   


             
                        language: 'es-ES', 

                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,


              
                        time_start: '08:00', 

            
                        time_end: '22:00',   

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
        <h4 class="modal-title" id="myModalLabel">Detalles de cita</h4>
      </div>
      <div class="modal-body">
        <!-- Aqui iran los detalles de la cita -->
      </div>

      <div class="modal-footer">

          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <a type="submit" class="btn btn-warning"><i class="fa fa-check"></i> Agregar</a>

      </div>

  </div>
</div>
</div>
</body>
</html>

<?php include_once("libreria/foot.php"); ?>