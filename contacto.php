<?php include_once './header.php'; ?>
<main>
  <div class="row">
    <h1 class="fw-bolder my-5 text-center">Contacto</h1>
    <h3 class="my-5 text-center text-primary-emphasis">Envíanos un mensaje</h3>

    <div class="col-12 d-flex justify-content-center align-items-center my-5 ">
      <form class="d-grid gap-3 " action="datos_del_usuario.php" method="POST">
        <div class="row form-floating">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
          <label for="name" class="col-form-label">Nombre</label>
        </div>
        <div class="row form-floating">
          <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
          <label for="apellido" class="col-form-label">Apellido</label>
        </div>
        <div class="row form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
          <label for="email" class="col-form-label">Email</label>
        </div>
        <div class="row mt-5">
          <label for="mensaje" class="form-label text-primary-emphasis">Mensaje</label>
          <textarea id="mensaje" class="form-control w-100" name="mensaje" rows="4" placeholder="Escribe aquí tu mensaje" required maxlength="300"></textarea>
          <p class="row form-text text-primary-emphasis">Escribe un máximo de 300 caracteres</p>
        </div>
        <div class="row my-5 d-flex justify-content-center">
          <button type="submit" class="btn btn-primary w-auto text-white botones fw-bolder">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</main>
<?php include_once './footer.php'; ?>
