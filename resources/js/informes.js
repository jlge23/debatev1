import './app';
//DataTable
import "datatables.net-bs5/js/dataTables.bootstrap5";
import "datatables.net-dt/js/dataTables.dataTables";
//jquery Validate
//import "jquery-validation/dist/additional-methods";
import "jquery-validation/dist/jquery.validate";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
/* import Modal from 'bootstrap/js/dist/modal'
const modal = new Modal(document.getElementById('exampleModal')); */

$(document).ready(function(){
   //modal.show();
   //Mensaje de carga de graficos
   let timerInterval
   Swal.fire({
      title: '¡Cargando Graficos!',
      html: 'Disponibles en <b></b> segundos.',
      allowOutsideClick : false,
      allowEscapeKey : false,
      allowEnterKey : false,
      showCloseButton: false,
      showConfirmButton: false,
      timer: 10000,
      timerProgressBar: true,
      didOpen: () => {
         Swal.showLoading()
         const b = Swal.getHtmlContainer().querySelector('b')
         timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
         }, 100)
      },
      willClose: () => {
         clearInterval(timerInterval)
      }
      }).then((result) => {
         /* Read more about handling dismissals below */
         if (result.dismiss === Swal.DismissReason.timer) {
            console.log('I was closed by the timer')
         }
   });
});