$(document).ready(function () {

    // ACTUALIZA LA CABECERA DE LA TABLA DEPENDIENDO DE LA JORNADA SELECCIONADA
    function actualizarJornada(jornada) {
        $.ajax({
            type: "post",
            data: {jornada},
            success: function (response) {
                let jornada = JSON.parse(response);
                $('.j1l').attr("src", "./imgs/equipos/"+ jornada[0].j1L + ".png");
                $('.j1v').attr("src", "./imgs/equipos/"+ jornada[0].j1V + ".png");
                $('.j2l').attr("src", "./imgs/equipos/"+ jornada[0].j2L + ".png");
                $('.j2v').attr("src", "./imgs/equipos/"+ jornada[0].j2V + ".png");
                $('.j3l').attr("src", "./imgs/equipos/"+ jornada[0].j3L + ".png");
                $('.j3v').attr("src", "./imgs/equipos/"+ jornada[0].j3V + ".png");
                $('.j4l').attr("src", "./imgs/equipos/"+ jornada[0].j4L + ".png");
                $('.j4v').attr("src", "./imgs/equipos/"+ jornada[0].j4V + ".png");
                $('.j5l').attr("src", "./imgs/equipos/"+ jornada[0].j5L + ".png");
                $('.j5v').attr("src", "./imgs/equipos/"+ jornada[0].j5V + ".png");
                $('.j6l').attr("src", "./imgs/equipos/"+ jornada[0].j6L + ".png");
                $('.j6v').attr("src", "./imgs/equipos/"+ jornada[0].j6V + ".png");
                $('.j7l').attr("src", "./imgs/equipos/"+ jornada[0].j7L + ".png");
                $('.j7v').attr("src", "./imgs/equipos/"+ jornada[0].j7V + ".png");
                $('.j8l').attr("src", "./imgs/equipos/"+ jornada[0].j8L + ".png");
                $('.j8v').attr("src", "./imgs/equipos/"+ jornada[0].j8V + ".png");
                $('.j9l').attr("src", "./imgs/equipos/"+ jornada[0].j9L + ".png");
                $('.j9v').attr("src", "./imgs/equipos/"+ jornada[0].j9V + ".png");
            }
        });
    }

    // RELLENA LA TABLA CON LOS RESULTADOS DE LA JORNADA SELECCIONADA
    function llenar_tabla_jornadas(jornadaResults) {
        $.ajax({
            type: "post",
            data: {jornadaResults},
            success: function (response) {
                if(response == "[]"){
                    $('#resultados table tbody').html("<tr><td colspan='10'>No hay resultados</td></tr>");
                }else{
                    let result = JSON.parse(response);
                    console.log(result);
                    $('#resultados table tbody tr').remove();
                    for(let i = 0; i < result.length; i++){

                        $('#resultados table tbody').append("<tr class='participante"+result[i].idParticipante+"'><td class='p-0'><img src='./imgs/participantes/"+ result[i].nombre +".jpg' alt='"+ result[i].nombre +"' height='50px' width='38'></td><td class='res1'><i class='icon-"+ result[i].j1 +"'></i></td><td class='res2'><i class='icon-"+ result[i].j2 +"'></i></td><td class='res3'><i class='icon-"+ result[i].j3 +"'></i></td><td class='res4'><i class='icon-"+ result[i].j4 +"'></i></td><td class='res5'><i class='icon-"+ result[i].j5 +"'></i></td><td class='res6'><i class='icon-"+ result[i].j6 +"'></i></td><td class='res7'><i class='icon-"+ result[i].j7 +"'></i></td><td class='res8'><i class='icon-"+ result[i].j8 +"'></i></td><td class='res9'><i class='icon-"+ result[i].j9 +"'></i></td></tr>");
                    }
                }
            }
        });
    }

    // COMPARA LOS RESULTADOS Y LOS REMARCA DEPENDIENDO ACIERTOS O FALLOS
    function compararResultados(jornadaResCorrect) {
        $.ajax({
            type: "post",
            data: {jornadaResCorrect},
            success: function (response) {
                if(response != "[]"){
                    let result = JSON.parse(response);
                    for(let i = 1; i < 12; i++){ //participantes
                        for(let j=1; j<10; j++){
                            if("icon-"+result[0][j+1] == $(".participante"+i+">.res"+j+">i").attr('class')){
                                console.log("encontrado")
                                $(".participante"+i).children('.res'+j).addClass('acerto');
                            }
                        }
                        
                    }
                }
            }
        });

        aciertos = [0];
        for(i=1; i<12; i++){
            let count = $('.participante'+i).children(".acerto").length;
            aciertos[i] = count;
        }
    }

    

    let jornadaInicio = $('#jornadas').children().val();
    llenar_tabla_jornadas(jornadaInicio);
    compararResultados(jornadaInicio);

    // CARGAR EL FORMULARIO DE LA QUINIELA CORRESPONDIENTE A LA JORNADA

    
    $('#jornadas').change(function (e) { 
        e.preventDefault();
        let jornada = $(this).val();    

        console.log("cambio");
        actualizarJornada(jornada);
        llenar_tabla_jornadas(jornada);
    });

    $('#jornadas').on("change", function (e) { 
        e.preventDefault();
        let jornada = $('#jornadas').val();
        compararResultados(jornada);
        console.log(jornada);
    });
    
});