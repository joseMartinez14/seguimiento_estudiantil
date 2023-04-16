<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Oops</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
  <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<div id="Imagen404" style="padding: 10% 10% 0% 10%; text-align: center;">
<h3><a href="https://www.una.ac.cr/"><img style="width:65%;" src="/imagenes/logo-largo.png" /></a></h3>
</div>

</body>
</html>

<script>
    window.onload = cargaInicial();

    function cargaInicial() {
        Swal.fire({
            title: "Oops! Algo salio mal. ",
    text: "Vamos a regresar al inicio :)",
    backdrop: "linear-gradient(#cc071e, #292c2f)",
    background: "white",
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
    showConfirmButton: false,
    showCancelButton: false,
    timer: 4800,
            timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                },

        })
        setTimeout(function() {
            location.href = "/logged_in";
        }, 4200);

     
  
      



    }
</script>