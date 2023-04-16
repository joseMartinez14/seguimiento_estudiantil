<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
</head>

<body>
<!--Main Navigation-->
    @include("layouts.header")
<!--Main Navigation-->

    <!-- Aqui empieza el  formulario -->
    <div class= "form-card">
        <h4 class="text-center">VICERRECTORÍA DE DOCENCIA</h4><H5 class="text-center text-uppercase">éxito académico</H5>
        <h5 class="text-center text-uppercase"> Informe mensual de avance académico </h5>
        <h5 class="text-center text-uppercase"> Tutorías especializadas </h5>


        <!-- Hilera del formulario -- nombre -->
        <div class="input-group mb-3" style=" width: 50%;">
            <div class="input-group-prepend">
              <span class="input-group-text">Fecha: </span>
            </div>
            <input type="text" class="form-control" value="<?php echo date('l jS \of F Y') ?>" id ="campo-fecha" aria-describedby="basic-addon1" disabled >
          </div>
          <!-- Hilera del formulario -- Nombre estudiante  -->
          <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text ">1. Nombre del/de la estudiante: </span>
              </div>
            <input type="text" class="form-control" id="campo-estudiante" aria-describedby="basic-addon2">
          </div>

          <!-- Hilera del formulario -- Nombre Tutor  -->
          <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text">2. Nombre del/de la tutor/a: </span>
              </div>
            <input type="text" class="form-control" id="campo-tutor" aria-describedby="basic-addon2">
          </div>

          <!-- Hilera del formulario -- Nombre orientador  -->
          <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text">3. Nombre del/de la orientador/a: </span>
              </div>
            <input type="text" class="form-control" id="campo-orientador" aria-describedby="basic-addon2">
          </div>


          <!-- Hilera del formulario -- Carrera que cursa  -->
          <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text">4. Carrera que cursa: </span>
              </div>
            <input type="text" class="form-control" id="campo-carrera" aria-describedby="basic-addon2">
          </div>
          

          <!-- Hilera del formulario -- Tutoria que recibe  -->
          <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text">5. Tutoría  que recibe: </span>
              </div>
            <input type="text" class="form-control" id="campo-tutoria" aria-describedby="basic-addon2">
          </div>
        
          <!-- Hilera del formulario -- Preguntas  -->
          <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text">6. Tutoría que recibe: </span>
              </div>
            </div>
            <ul>
                <li>
                    <!-- Pregunta 1 -->
                    <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio1">Asiste con regularidad a la tutoría: &nbsp &nbsp</label>
                        <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta1" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </li>     
                
                <li>
                    <!--Pregunta 2 -->
                    <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio1">Resuelve los ejercicios de estudio que usted asigna: &nbsp &nbsp</label>
                        <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta2" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </li>
                
                
                <li>
                    <!-- Pregunta 3 -->
                    <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio1">Demuestra interés y consulta dudas en general: &nbsp &nbsp</label>
                        <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta3" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </li>
            </ul>


        <span class="input-group-text text-uppercase">7. Observaciones respecto al proceso de aprendisaje del/de la estudiante:</span>
            <div class="input-group mb-3">
                <textarea class="form-control" id="campo-observaciones"></textarea>
            </div>
        
        <div class="input-group mb-3">
            <div class="input-group-append">
                <button type="button" class="btn btn-primary" id="boton-enviar">Enviar informe</button>
            </div>
        </div>
    </div>
    @include("layouts.footer")
</body>

<script>
    
    function empezar(){
        $(".opcion-tabla").hover(function(){
            $(this).css("background-color", "#f6f799");
            },function(){
        $(this).css("background-color","white");} );
    }

    empezar();


</script>

</html>