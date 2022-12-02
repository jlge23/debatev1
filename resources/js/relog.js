import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
$(document).ready(function(){

    const AudioSuccess= new Audio("http://"+window.location.host+"/build/media/success.mp3");
    AudioSuccess.loop = false;
    AudioSuccess.controls = true;

    const AudioTime= new Audio("http://"+window.location.host+"/build/media/tiempo.mp3");
    AudioTime.loop = true;
    AudioTime.controls = true;

    const AudioError= new Audio("http://"+window.location.host+"/build/media/error.mp3");
    AudioError.loop = false;
    AudioError.controls = true;
    

    var initial = $("input#tiempo").val() * 1000;
    var count = initial;
    var counter; //10 will  run it every 100th of a second
    var initialMillis;

    function timer() {
        if (count <= 0) {
            clearInterval(counter);
            return;
        }
        var current = Date.now();
        count = count - (current - initialMillis);
        initialMillis = current;
        displayCount(count);
    }

    function displayCount(count) {
        let res = Math.floor(count / 1000);
        let milliseconds = count.toString().substr(-3);
        let seconds = res;
        if (seconds <= 0 && milliseconds <= 0) {
            AudioTime.pause();
            document.getElementById("reloj_sg").classList.add("rojo");
            document.getElementById("reloj_cs").classList.add("rojo");
            document.getElementById("reloj_sg").innerHTML = 0;
            document.getElementById("reloj_cs").innerHTML = 0;
            AudioError.play();
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '¡SE AGOTÓ EL TIEMPO; NO SE CONTESTO LA PREGUNTA!',
                showConfirmButton: true
            });
            $("input#opcion1").attr('disabled','disabled').attr('checked', false);
            $("input#opcion2").attr('disabled','disabled').attr('checked', false);
            $("select#opcion").prop('disabled','disabled');
            var t = $("input#tiempo").val()+".0";
            $("input#duracion").val(t);
            if($('input#validez').length && $('input#validez').val().length){$("input#validez").val(0);}
            if($('input#puntos').length && $('input#puntos').val().length){$("input#puntos").val(0);}
            if($('input#seleccion').length && $('input#seleccion').val().length){$("input#seleccion").val(0);}
            $("div#resp").css("display","block");
        } else {
            document.getElementById("reloj_sg").innerHTML = seconds;
            document.getElementById("reloj_cs").innerHTML = milliseconds;
        }

    }
    //iniciar cuenta regresiva
    $('button#start').on('click', function() {
        AudioTime.play();
        $(this).prop('disabled',true);
        $("button#pausa").prop('disabled',false);
        if($("button#stop")){$("button#stop").attr("disabled",false);}
        document.getElementById("reloj_sg").classList.remove("rojo");
        document.getElementById("reloj_cs").classList.remove("rojo");
        clearInterval(counter);
        initialMillis = Date.now();
        counter = setInterval(timer, 1);
    });

    //Verdadero y falso
    $("input[type='radio'][name='opcion']").on('change', function() {
        clearInterval(counter);
        $("input#duracion").val((initial - count) / 1000);
        //revelar respuesta y resultado
        $("div#resp").css("display","block");
        var opcion = ($(this).val());
        $("input#validez").val(opcion);
        var r_correcta = $("input#r_correcta").val();
        AudioTime.pause();
        if(r_correcta === opcion){
            AudioSuccess.play();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '¡RESPUESTA CORRECTA. FELICIDADES!',
                showConfirmButton: true
            });
            $("input#opcion1").attr('disabled','disabled').attr('checked', false);
            $("input#opcion2").attr('disabled','disabled').attr('checked', false);
        }else{
            AudioError.play();
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '¡RESPUESTA INCORRECTA. ¡SIGUE INTENTANDO!',
                showConfirmButton: true
            });
            
            $("input#opcion1").attr('disabled','disabled').attr('checked', false);
            $("input#opcion2").attr('disabled','disabled').attr('checked', false);
        }
    });
    //seleccion simple
    $("select#opcion").on('change', function() {
        clearInterval(counter);
        $("input#duracion").val((initial - count) / 1000);
        //revelar respuesta y resultado
        $("div#resp").css("display","block");
        var opcion = ($("select#opcion option:selected").val());
        var respuesta_id = $("input#respuesta_id").val();
        AudioTime.pause();
        if(respuesta_id === opcion){
            AudioSuccess.play();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '¡RESPUESTA CORRECTA. FELICIDADES!',
                showConfirmButton: true
            });
            $(this).prop('disabled','disabled');
            $('input#seleccion').val(opcion);
        }else{
            AudioError.play();
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '¡RESPUESTA INCORRECTA. ¡SIGUE INTENTANDO!',
                showConfirmButton: true
            });
            $(this).prop('disabled','disabled');
            $('input#seleccion').val(opcion);
        }
    });
    //Desarrollo
    $("button#stop").on('click', function() {
        clearInterval(counter);
        $("input#duracion").val((initial - count) / 1000);
        //revelar respuesta y resultado
        $("div#resp").css("display","block");
        AudioTime.pause();
        $("input[type='range']#opcion").on("input",function(){
            $("label#punto").html("Apreciacion:&nbsp;(<b>"+$(this).val()+"</b>)");
            AudioSuccess.play();
        });
    });
    displayCount(initial);
});
