<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Disponibilidad de citas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>

<body>
    <!--Main Navigation-->
    @include("layouts.header")
<!--Main Navigation-->
  
    <!-- Aqui empieza el  formulario -->
    <div class= "form-card">
    <img src="imagenes/logo.jpg" class="rounded mx-auto d-block" style = "width: 100px; height: 100px;"> 
    <h4 class="text-center">VICERRECTORÍA DE DOCENCIA</h4><H5 class="text-center">ÉXITO ACADÉMICO</H5>
    <h4 class="text-center">ESTUDIANTES ASIGNADOS POR TUTOR</h4>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Esta es la columna de la "tabla" principal donde va a estar la tabla de cursos //Se hace con la tabla detalle_curso -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Curso</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Hora inicio</th>
                            <th scope="col">Día</th>
                            </tr>
                        </thead>
                        <tbody id="listarCursos">
                        </tbody>
                    </table>
                    <h6>*Seleccione una para desplegar los estudiantes de este curso</h6>
                </div>
                <div class="col-sm-6">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Estudiante</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Correo</th>
                            </tr>
                        </thead>
                        <tbody id="listarEstudiantes">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include("layouts.footer")
</body>

</html>

<script>
    let lista_Cursos;
    let lista_estudiantes = [];

    function empezar(){
        try{
            lista_Cursos = <?php echo  $data ?>;

            console.log(lista_Cursos);
            var lista = $("#listarCursos");
            lista.innerHTML ="";
            lista_Cursos.forEach((c)=>{rowCursos(lista, c);});
        }catch(error){
            mostrarMensaje("error","Error al cargar la lista de cursos");
        }
    }

    empezar();

    function rowCursos(lista, cur){
      var tr = $("<tr />");
      tr.html("<td>"+ cur.curso + "</td>"+
                "<td>"+ cur.periodo + "</td>"+
                "<td>"+ cur.hora_inicio + "</td>" + 
                "<td>"+ cur.dia + "</td>");
      tr.on("click",()=>{cargarListaEstudiantes(cur.id_detalle);});
      lista.append(tr);
    }

    function cargarListaEstudiantes(detalle){
        //Mandar aqui la peticion con el id
        try{
            var lista = $("#listarEstudiantes")
            var rowCount = document.getElementById('listarEstudiantes').rows.length;
            console.log(rowCount);
            for(let i = 0; i< rowCount; i++){
            event.preventDefault();
            $('#fila').closest('tr').remove();
            }
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
            url: "Tutorias-estudiantes/" + detalle,
            type: "GET",
            success: function (estudiantes) {
                //Aqui entra porque la respuesta es correcta
                console.log("success");
                //console.log(estudiantes);
                estudiantes.forEach((est)=>{rowListaEstudiante(lista, est);});
            },
            error: function(status, error){
                console.log(error);
                //alert("Hubo un error 1");
            }
            });
            }catch(err){
                mostrarMensaje("error","Hubo un error al agendar la cita");
            }
    }

    function rowListaEstudiante(lista, est){
        var tr = $("<tr id='fila'/>");
      tr.html("<td>"+ est.nombre +" "+est.apellido + "</td>"+
                "<td>"+ est.cedula + "</td>"+
                "<td>"+ est.correo + "</td>");
      lista.append(tr);
    }

</script>