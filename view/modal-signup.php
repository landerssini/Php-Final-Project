<?php
include_once("./signup.php");
include_once("./db.php");
?>

<div class="nav-log">
    <button type="button" class="btn btn-signup" data-bs-toggle="modal" data-bs-target="#modalSignUp"> Sign Up
    </button>
    <div class="modal fade" id="modalSignUp" tabindex="-1" aria-labelledby="modalSignUpLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal__form-color">
                <form action="" method="POST" class="form" id="form">
                    <div class="modal-header">
                        <h3>Sign Up!</h3>
                    </div>
                    <div class="modal-body">
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="name" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" name="nombre" id="nombre"
                                    placeholder="Your name">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo
                                puede
                                contener numeros, letras y guion bajo.</p>
                        </div>
                        <div class="formulario__grupo" id="grupo__correo">
                            <label for="email" class="formulario__label">Correo Electrónico</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="form-control formulario__input " name="correo" id="correo"
                                    placeholder="Your email">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros,
                                puntos,
                                guiones y guion bajo.</p>
                        </div>

                        <div class="formulario__grupo" id="grupo__password">
                            <label for="password" class="formulario__label">Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="form-control formulario__input form-control"
                                    name="password" id="password" placeholder="Your password">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                        </div>

                        <div class="formulario__grupo" id="grupo__password2">
                            <label for="password2" class="formulario__label">Repetir Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="form-control formulario__input" name="password2"
                                    id="password2" placeholder="Repeat your password">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <input type="submit" class="btn formulario__btn" value="Sign up" name="send-register">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>