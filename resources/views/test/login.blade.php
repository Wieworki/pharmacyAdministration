<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            .form {
                display: flex;
                flex-direction: column;
            }

            .form-input {
                align-self: center;
            }

            .form-submit {
                width: fit-content;
            }

        </style>
    </head>
    <body class="antialiased">
        <form class="form" action="login/submit" method="post">
        @csrf
            <div class="form-input">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input type="text" name="password">
            </div>
            <button type="submit" class="form-input form-submit">SEND</button>
        </form>
    </body>
</html>
