<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="{{ asset('css/informacionEstudiante.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo-Form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formRegistro.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<div id="formRegistro">
<center>
        <form method="POST" action="/User">
            @csrf
            <table>
            <tr>
            <td class="labels">
                <label>Cedula: </label>
            </td>
            <td id="respuestas">
            <input class="block mt-1 w-full" type="number" name="id" required autofocus autocomplete="id" />
            </td>
            </tr>
            
            <tr>
            <td class="labels">
                <label>Nombre: </label>
            </td>
            <td id="respuestas">
            <input class="block mt-1 w-full" type="text" name="nombre" required />
            </td>
            </tr>
            <tr>
            <td class="labels">
                <label>Apellido: </label>
            </td>
            <td id="respuestas">
            <input class="block mt-1 w-full" type="test" name="apellido" required />
            </td>
            </tr>
            <tr>
            <td class="labels">
                <label>Email: </label>
            </td>
            <td id="respuestas">
            <input class="block mt-1 w-full" type="email" name="email" required />
            </td>
            </tr>
            <tr>
            <td class="labels">
                <label>Usuario: </label>
            </td>
            <td id="respuestas">
            <input class="block mt-1 w-full" type="text" name="usuario" required autofocus autocomplete="id" />
            </td>
            </tr>
            <tr>
            <td class="labels">
                <label>Password: </label>
            </td>
            <td id="respuestas">
            <input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </td>
            </tr>
            <tr>
            <td class="labels">
                <label>Confirm Password: </label>
            </td>
            <td id="respuestas">
            <input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </td>
            </tr>
            <tr>
            <td class="labels">
                <label>Rol: </label>
            </td>
            <td id="respuestas">
                <input class="block mt-1 w-full" id="Administrador" type="radio" name="rol" value="1" checked />
                <label for="Administrador">Administrador</label>
                <input class="block mt-1 w-full" id="Asesor" type="radio" name="rol" value="2" />
                <label for="Asesor">Asesor</label>
                <input class="block mt-1 w-full" id="Tutor" type="radio" name="rol" value="3" />
                <label for="Tutor">Tutor</label>
            </td>
            </tr>
            <tr>
            <td colspan="2" id="boton">
                <button type="submit" value="Submit">Registrar</button>
            </td>
            </tr>
            </table>
        </form>
    </center>
</div>