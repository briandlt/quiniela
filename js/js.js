$(document).ready(function () {

    // ENVIA  POR PARAMETRO GET LA JORNADA A MOSTRAR
    function actualizarJornada(jornada) {
        window.location="?jornada="+jornada;
    }

    // RELLENA LA TABLA CON LAS IMAGENES DELOS EQUIPOS GANADORES DE LA JORNADA
    function llenar_tabla_jornadas(jornadaResults) {

        let l1 = $('th.res1 .local').attr('src');
        let v1 = $('th.res1 .visitante').attr('src');
        let l2 = $('th.res2 .local').attr('src');
        let v2 = $('th.res2 .visitante').attr('src');
        let l3 = $('th.res3 .local').attr('src');
        let v3 = $('th.res3 .visitante').attr('src');
        let l4 = $('th.res4 .local').attr('src');
        let v4 = $('th.res4 .visitante').attr('src');
        let l5 = $('th.res5 .local').attr('src');
        let v5 = $('th.res5 .visitante').attr('src');
        let l6 = $('th.res6 .local').attr('src');
        let v6 = $('th.res6 .visitante').attr('src');
        let l7 = $('th.res7 .local').attr('src');
        let v7 = $('th.res7 .visitante').attr('src');
        let l8 = $('th.res8 .local').attr('src');
        let v8 = $('th.res8 .visitante').attr('src');
        let l9 = $('th.res9 .local').attr('src');
        let v9 = $('th.res9 .visitante').attr('src');

        for(let i=1; i<12; i++){

            if($('.participante'+i+'').siblings('.res1').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res1').children().attr("src", l1);
            }else if($('.participante'+i+'').siblings('.res1').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res1').children().attr("src", v1);
            }else{
                $('.participante'+i+'').siblings('.res1').children().remove();
                $('.participante'+i+'').siblings('.res1').text('E');
            }

            if($('.participante'+i+'').siblings('.res2').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res2').children().attr("src", l2);
            }else if($('.participante'+i+'').siblings('.res2').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res2').children().attr("src", v2);
            }else{
                $('.participante'+i+'').siblings('.res2').children().remove();
                $('.participante'+i+'').siblings('.res2').text('E');
            }

            if($('.participante'+i+'').siblings('.res3').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res3').children().attr("src", l3);
            }else if($('.participante'+i+'').siblings('.res3').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res3').children().attr("src", v3);
            }else{
                $('.participante'+i+'').siblings('.res3').children().remove();
                $('.participante'+i+'').siblings('.res3').text('E');
            }

            if($('.participante'+i+'').siblings('.res4').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res4').children().attr("src", l4);
            }else if($('.participante'+i+'').siblings('.res4').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res4').children().attr("src", v4);
            }else{
                $('.participante'+i+'').siblings('.res4').children().remove();
                $('.participante'+i+'').siblings('.res4').text('E');
            }

            if($('.participante'+i+'').siblings('.res5').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res5').children().attr("src", l5);
            }else if($('.participante'+i+'').siblings('.res5').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res5').children().attr("src", v5);
            }else{
                $('.participante'+i+'').siblings('.res5').children().remove();
                $('.participante'+i+'').siblings('.res5').text('E');
            }

            if($('.participante'+i+'').siblings('.res6').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res6').children().attr("src", l6);
            }else if($('.participante'+i+'').siblings('.res6').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res6').children().attr("src", v6);
            }else{
                $('.participante'+i+'').siblings('.res6').children().remove();
                $('.participante'+i+'').siblings('.res6').text('E');
            }

            if($('.participante'+i+'').siblings('.res7').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res7').children().attr("src", l7);
            }else if($('.participante'+i+'').siblings('.res7').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res7').children().attr("src", v7);
            }else{
                $('.participante'+i+'').siblings('.res7').children().remove();
                $('.participante'+i+'').siblings('.res7').text('E');
            }

            if($('.participante'+i+'').siblings('.res8').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res8').children().attr("src", l8);
            }else if($('.participante'+i+'').siblings('.res8').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res8').children().attr("src", v8);
            }else{
                $('.participante'+i+'').siblings('.res8').children().remove();
                $('.participante'+i+'').siblings('.res8').text('E');
            }

            if($('.participante'+i+'').siblings('.res9').children().attr("alt") == 'gana'){
                $('.participante'+i+'').siblings('.res9').children().attr("src", l9);
            }else if($('.participante'+i+'').siblings('.res9').children().attr("alt") == 'pierde'){
                $('.participante'+i+'').siblings('.res9').children().attr("src", v9);
            }else{
                $('.participante'+i+'').siblings('.res9').children().remove();
                $('.participante'+i+'').siblings('.res9').text('E');
            }
        }

    } 

    // COMPARA LOS RESULTADOS Y LOS REMARCA DEPENDIENDO ACIERTOS O FALLOS
    function compararResultados(jornadaResCorrect) {
        $.ajax({
            type: "post",
            data: {jornadaResCorrect},
            success: function (response) {
                if(response != "[]"){
                    let result = JSON.parse(response);
                    var aciertos = [0];
                    for(let i = 1; i < 12; i++){ //participantes
                        let contador = 0;
                        for(let j=1; j<10; j++){
                            if(result[0][j+1] == $(".participante"+i+"").siblings('.res'+j+'').children().attr('alt')){
                                contador++;
                                $(".participante"+i+"").siblings('.res'+j).addClass('acerto');
                            }else if($(".participante"+i+"").siblings('.res'+j+'').text() != ""){
                                if(result[0][j+1].charAt(0).toUpperCase() == $(".participante"+i+"").siblings('.res'+j+'').text()){
                                    contador++;
                                    $(".participante"+i+"").siblings('.res'+j).addClass('acerto');
                                }
                            }
                        }
                        aciertos.push(contador);   
                    }
                }
                let jornadaAciertos = $('#jornadas').val();
                $.ajax({
                    type: "post",
                    data: {jornadaAciertos},
                    success: function (response) {
                        if(response != '[]'){
                            let result = JSON.parse(response);
                            for(let i=0; i<result.length; i++){
                                if(result[i]['aciertos'] == null){
                                    let idParticipante = i+1;
                                    let nAciertos = aciertos[i+1];
                                    let jornadaA = jornadaAciertos;
                                    $.ajax({
                                        type: "post",
                                        data: {nAciertos, jornadaA, idParticipante},
                                        success: function (response) {
                                            console.log(response);
                                        }
                                    });
                                }
                            }
                        }                        
                    }
                });
                console.log(aciertos);
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

    // VERIFICA SI EL USUARIO YA ENVIO SU QUINIELA Y SI YA LA ENVIO YA NO APARECERA EL FORMULARIO
    function removerQuiniela(){
        if($('#quiniela p').hasClass('numeroJornada')){
            let jornadaForm = $('#quiniela p>span').text();
            let userLog = $('#userLog').text().trim().toLowerCase();
            $.ajax({
                type: "post",
                data: {jornadaForm, userLog},
                success: function (response) {
                    if(response != "sin resultados"){
                        $('div#quiniela').remove();
                    }
                }
            });
        }
    }    

    // VALIDACION FORMULARIO CAMBIO DE CONTRASEÑA
    function valida_form_npassword(){

    }

    $(document).ready(function () {
        let jornadaInicio = $('#jornadas').val();
        llenar_tabla_jornadas(jornadaInicio);
        compararResultados(jornadaInicio);
        removerQuiniela();
    });
    let url = getQueryVariable('jornada');

    for(let i=1; i<20; i++){
        if($('#jornadas option[value='+i+']').val() == url){
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
                window.location="index.php";
            }
        });
    });

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
    
});