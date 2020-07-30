//sideBar button

$(document).ready(function () {

    $('#cedula').mask('000-0000000-0');

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

//Este es el metodo de imprimir el div por el Id
function Imprimir(divId)
{
    var ficha = document.getElementById(divId);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
    
}