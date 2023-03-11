<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Cash Inventory | Login</title>
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        <!-- ++++++++++++++++++++++++++++++ Banner +++++++++++++++++++++++++++++++ -->
        <img src="img/banner.jpg" alt="" class="cashinventoryLogo">

        <!-- ++++++++++++++++++++++++++++++ Caja Semitrasparente +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_login"></div>

        <!-- ++++++++++++++++++++++++++++++ Contenedor +++++++++++++++++++++++++++++++ -->
        <div class="cuadro_container_login">

            <!-- ++++++++++++++++++++++++++++++ Formuario +++++++++++++++++++++++++++++++ -->
            <h1 id="login">LOGIN</h1>
            <form action="controlador.php" method="post" class="formulario_login">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="usuario">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">🔒</span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password">
                </div>
                <a href="#" class="conf_icon" data-bs-toggle="modal" data-bs-target="#exampleModal">Olvide mi contraseña</a><br><br>
                <a href=""><input type="submit" value="Iniciar Sesión" class="btn btn-success"></a>
            </form>
        </div>

        <!-- ++++++++++++++++++++++++++++++ Ventana Emergente - Recuperación de contraseña +++++++++++++++++++++++++++++++ -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Restablecer Contraseña</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Digita el correo de tu cuenta, te llegará un email con el link para realizar el restablecimiento de contraseña <br><br>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ++++++++++++++++++++++++++++++ Scripts +++++++++++++++++++++++++++++++ -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
