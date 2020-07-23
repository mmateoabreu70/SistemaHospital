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