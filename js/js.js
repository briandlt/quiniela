$(document).ready(function () {

    // ENVIA  POR PARAMETRO GET LA JORNADA A MOSTRAR
    function actualizarJornada(jornada) {
        window.location="?jornada="+jornada;
    }


    // COMPARA LOS RESULTADOS Y LOS REMARCA DEPENDIENDO ACIERTOS O FALLOS
    function compararResultados(jornadaResCorrect) {
        $.ajax({
            type: "post",
            data: {jornadaResCorrect},
            success: function (response) {
                if (response != "[]") {
                    let result = JSON.parse(response);
                    var aciertos = [0];
                    for(let i = 1; i < 50; i++){ //participantes
                        let contador = 0;
                        for (let j = 1; j < 10; j++){
                            let resultadoCorrecto = result[0][j + 1];
                            let resultado = $(".participante" + i + "").siblings('.res' + j + '').attr('title');
                            if (result[0][j + 1] == $(".participante" + i + "").siblings('.res' + j + '').attr('title')) {
                                $(".participante" + i + "").siblings('.res' + j + '').text()
                                contador++;
                                $(".participante" + i + "").siblings('.res' + j).addClass('acerto-doble');
                            } else if (resultado && resultadoCorrecto && resultadoCorrecto.split('')[0] === resultado.split('')[0]) {
                                $(".participante" + i + "").siblings('.res' + j).addClass('acerto-sencillo');
                            }
                        }
                        aciertos.push(contador);   
                    }
                }
            }
        });
    }

    // FUNCION QUE ENCUENTRA UNA VARIABLE EN LA URL 
    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable) {
                return pair[1];
            }
        }
        return false;
    }

    if(getQueryVariable('jornada') != false){
        var jornada = getQueryVariable('jornada');
    }else{
        var jornada = 1;
    }

    compararResultados(jornada);

    for(let i=1; i<20; i++){
        if($('#jornadas option[value='+i+']').val() == jornada){
            $('#jornadas option[value='+i+']').attr('selected', true);
        }
    }
    
    // CARGAR EL FORMULARIO DE LA QUINIELA CORRESPONDIENTE A LA JORNADA
    $('#jornadas').change(function (e) { 
        e.preventDefault();
        let jornada = $(this).val();
        actualizarJornada(jornada);
    });

    // CERRAR SESION Y REDIRECCIONAR AL INDEX
    $('#cerrarSesion').click(function (e) { 
        let cerrarSesion = true;
        e.preventDefault();
        $.ajax({
            type: "post",
            data: {cerrarSesion},
            success: function (response) {
                window.location="";
            }
        });
    });

    // CAMBIAR LA CONTRASEÑA
    $('#cambiarPass').click(function (e) { 
        let nuevoPass = $('#nuevoPass').val();
        let confirmPass = $('#confirmPass').val();
        if(nuevoPass != confirmPass){
            e.preventDefault();
            alert('Las contraseñas no coinciden');
            $('#nuevoPass').text("");
            $('#confirmPass').text("");
        }
    });

    // MUSTRA EL FORMULARIO PARA AGREGAR EL RESULTADO CORRECTO
    $('#addResultado').click(function (e) { 
        // e.preventDefault();
        $('#resultadoCorrecto').toggleClass('displayNone');
        $('#jornaCorr').val(jornada);
    });
    
});