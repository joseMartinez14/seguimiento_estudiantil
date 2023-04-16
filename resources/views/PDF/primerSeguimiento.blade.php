<html>

<head>
    <style>
        body {
            margin: 0.5cm 0cm;
            font-family: sans-serif;
        }

        header {
            position: relative;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            text-align: center;
            line-height: 30px;
            font-size: large;
            border-width: 2px;
            border-bottom: 2px black solid;
            padding-bottom: 20px;
        }

        header p,
        h2,
        h1,
        h3,
        h4,
        h5 {
            margin: 0cm;
        }

        header h2 {
            color: red;
        }

        main {
            margin: 1cm;
        }

        #img1 {
            position: fixed;
            top: 1cm;
            left: 1cm;
            width: 100px;
            height: 100px;
        }

        #img2 {
            top: 1cm;
            right: 1cm;
            position: fixed;
            width: 120px;
            height: 120px;
        }

        footer {
            margin: 0cm;
            font-size: x-small;
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
            text-align: left;
            border-width: 2px;
            border-top: 2px black solid;
        }

        footer p {
            margin: 0cm;
        }


        table,
        th,
        td {
            border-style: hidden;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .tableHeader {
            background-color: #CECECE;
        }

        th,
        td {
            padding: 1px;
        }

        tr {
            border-radius: 30px;
        }

        td {
            text-align: center;
        }

        #tableEstudiante {
            margin-bottom: 1cm;
        }

        #cell {
            padding: 15px;
        }
    </style>
</head>

<body>
    <header>
        <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/LogoUNA.svg/1200px-LogoUNA.svg.png" /> -->
        <img id="img1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/LogoUNA.svg/1200px-LogoUNA.svg.png" />
        <img id="img2" src="https://scontent-mia3-1.xx.fbcdn.net/v/t1.6435-9/176409638_4079490435440431_167870841799134986_n.png?_nc_cat=106&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=puwD93QRW1QAX-IEq5p&_nc_ht=scontent-mia3-1.xx&oh=b77eae516c03daf14fc4e3d571ef77e4&oe=60C0AFEA" />
        <h3>Universidad Nacional de Costa Rica</h3>
        <h3>Heredia, Costa Rica</h3>
        <h3>Unidad de Exito Academico</h3>
        <h3>Seguimiento Academico Estudiantil</h3>
    </header>

    <main>
        <h2 style="margin: 1cm;">Primer Contacto No. {{ $id }}</h2>

        <table style="width:100%" id=tableEstudiante>
            <tr>
                <th class="tableHeader" colspan="2">Informacion del Estudiante</th>
            </tr>
            <tr>
                <th>Cedula</th>
                <td>{{$estudiante_id}}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{$estudiante_nombre}}</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>{{$estudiante_correo}}</td>
            </tr>
        </table>

        <table style="width:100%" id=tableSeguimiento>
            <tr>
                <th class="tableHeader" colspan="2">Detalle del Seguimiento</th>
            </tr>
            <tr>
                <th style="padding: 10px;">Fecha</th>
                <td>{{$fecha}}</td>
            </tr>
            <tr>
                <th style="padding: 40px;">Estado de Aprovacion</th>
                <td>{{$aprovacion}}</td>
            </tr>
            @if($detalle_curso_codigo != NULL)
            <tr>
                <th rowspan="2" style="padding: 40px;">Detalle del curso</th>
                <td>{{$detalle_curso_codigo}} {{$detalle_curso_nombre}}</td>
            </tr>
            <tr>
                <td>Tutor: {{$nombre_tutor}}</td>
            </tr>
            @endif
            <tr>
                <th style="padding: 40px;">Observaciones</th>
                <td>{{$observaciones}}</td>
            </tr>
        </table>
    </main>

    <footer>
        <p>Correo: vdocencia@una.cr</p>
        <p>Tel: (506)22773237</p>
        <p>https://www.docencia.una.ac.cr/index.php/unidades-menu/ueaep</p>
    </footer>
</body>

</html>