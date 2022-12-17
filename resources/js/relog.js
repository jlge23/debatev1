import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
$(document).ready(function(){

    const AudioSuccess= new Audio("http://"+window.location.host+"/storage/media/success.mp3");
    AudioSuccess.loop = false;
    AudioSuccess.controls = true;

    const AudioTime= new Audio("http://"+window.location.host+"/storage/media/tiempo.mp3");
    AudioTime.loop = true;
    AudioTime.controls = true;

    const AudioError= new Audio("http://"+window.location.host+"/storage/media/error.mp3");
    AudioError.loop = false;
    AudioError.controls = true;

    const AudioOpcion= new Audio("http://"+window.location.host+"/storage/media/opcion.mp3");
    AudioOpcion.loop = false;
    AudioOpcion.controls = true;

    if($("form#FRM_vf").length > 0){
        $("input[name='opcion']").attr('disabled','disabled').attr('checked', false);
    }

    if($("form#FRM_desarrollo").length > 0){
        $("input#opcion").attr('disabled',false);
    }

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
    $('button#start1').on('click', function() {
        AudioTime.play();
        $("input[name='opcion']").attr('disabled',false);
        $(this).prop('disabled',true);
        $("button#stop1").attr("disabled",false);
        document.getElementById("reloj_sg").classList.remove("rojo");
        document.getElementById("reloj_cs").classList.remove("rojo");
        clearInterval(counter);
        initialMillis = Date.now();
        counter = setInterval(timer, 1);
    });

    $('button#start2').on('click', function() {
        AudioTime.play();
        $("input[name='opcion']").attr('disabled',false);
        $(this).prop('disabled',true);
        $("button#stop2").attr("disabled",false);
        document.getElementById("reloj_sg").classList.remove("rojo");
        document.getElementById("reloj_cs").classList.remove("rojo");
        clearInterval(counter);
        initialMillis = Date.now();
        counter = setInterval(timer, 1);
    });

    //Verdadero y falso
    $("button#stop1").on("click",function(){
        $("#OPT").css("display","block");
        clearInterval(counter);
        AudioTime.pause();
        AudioOpcion.play();
        $("input#duracion").val((initial - count) / 1000);
    });
    $("input[type='radio'][name='opcion']").on('change', function() {
        //revelar respuesta y resultado
        var opcion = $(this).val();
        AudioTime.pause();
        if(opcion == 1){
            AudioOpcion.pause();
            AudioSuccess.play();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '¡RESPUESTA CORRECTA. FELICIDADES!',
                showConfirmButton: true
            });
            $("input#opcion1").attr('disabled','disabled').attr('checked', false);
            $("input#opcion2").attr('disabled','disabled').attr('checked', false);
            $("input#validez").val(1);
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
        $("div#resp").css("display","block");
    });

    //Desarrollo
    $("button#stop2").on('click', function() {
        clearInterval(counter);
        $("input#duracion").val((initial - count) / 1000);
        //revelar respuesta y resultado
        $("div#resp").css("display","block");
        AudioTime.pause();
        AudioOpcion.play();
        $("input[type='range']#opcion").on("input",function(){
            $("label#punto").html("Apreciacion:&nbsp;(<b>"+$(this).val()+"</b>)");
            if($(this).val() > 0){
                $("input#validez").val(1);
            }else{
                $("input#validez").val(0);
            }
            AudioOpcion.pause();
            AudioSuccess.play();
        });
    });
    displayCount(initial);
});
