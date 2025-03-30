<!--Sitio maquetado en HTML5 y CSS3.

1 funcionalidad que utilice el método GET para enviar datos. Se deben mostrar, al menos 3 datos diferentes, creados con variables.

Emplear al menos 1 estructura de control.

Implementar funciones del lenguaje (por ejemplo: mail)-->


<?php include_once './header.php'; ?>

<main class="container d-flex flex-column align-items-center justify-content-center my-5">

  <h1 class="my-5 ">Tu salud es nuestra prioridad</h1>
  <p class="text-justify lh-lg text-primary-emphasis">Nos preocupamos por tu bienestar. Aquí encontrarás información valiosa sobre alimentación saludable y control de tu estado corporal.</p>
  <p class="text-justify lh-lg text-primary-emphasis">Recuerda que una buena alimentación es clave para mantener un estilo de vida saludable.</p>

  <h2 class="my-5">Controla tu Estado Corporal</h2>
  <p class="text-justify lh-lg text-primary-emphasis">
    El sobrepeso puede causar la elevación de la concentración de colesterol total y de la presión arterial, y aumentar el riesgo de sufrir la enfermedad arterial coronaria. La obesidad aumenta las probabilidades de que se presenten otros factores de riesgo cardiovascular, en especial, presión arterial alta, colesterol elevado y diabetes.<br>
    Una medida de la obesidad se determina mediante el índice de masa corporal (IMC).
  </p>

  <h3 class="fw-bolder my-5 ">Calculá tu Índice de Masa Corporal</h3>

  <div class="row">
    <form action="index.php" method="get" class="d-grid gap-3 w-25 col">
      <label for="peso">Peso (kg):<br></label>
      <input type="number" id="peso" name="peso" step="0.01" class="form-control" required>

      <label for="altura">Altura (m):<br></label>
      <input type="number" id="altura" name="altura" step="0.01" class="form-control" required>

      <input type="submit" value="Calcular" class="text-white btn btn-primary my-5 botones fw-bolder">
    </form>
  </div>

  <?php
  if (
    isset($_GET['peso']) && isset($_GET['altura']) &&
    is_numeric($_GET['peso']) && is_numeric($_GET['altura']) &&
    $_GET['altura'] > 0
  ) {
    $peso = floatval($_GET['peso']);
    $altura = floatval($_GET['altura']);
    $imc = round($peso / ($altura * $altura), 2);
    $porcentaje = min(($imc / 40) * 100, 100);

    if ($imc < 18.5) {
      $mensaje = "Peso inferior al normal.";
      $color = 'bg-info';
    } elseif ($imc < 25) {
      $mensaje = "Peso normal.";
      $color = 'bg-success';
    } elseif ($imc < 30) {
      $mensaje = "Peso superior al normal.";
      $color = 'bg-warning';
    } else {
      $mensaje = "Obesidad.";
      $color = 'bg-danger';
    }
  ?>

    <section id="resultado-imc" class="container my-5">
      <div class="alert   my-5">
        <h4 class="text-center">Tu IMC es: <?= $imc ?></h4>
        <h4 class="text-center">Tu peso es: <?= $peso ?></h4>
        <h4 class="text-center">Tu altura es: <?= $altura ?></h4>
        <p class="text-center"><?= $mensaje ?></p>
      </div>

      <h2 class="text-center my-5 text-primary-emphasis">
        <i class="bi bi-heart-pulse-fill text-danger"></i> Tabla de IMC
      </h2>

      <table class="table table-bordered table-striped table-hover table-sm my-5">
        <thead class="table-dark">
          <tr>
            <th scope="col">Composición Corporal</th>
            <th scope="col">Índice de Masa Corporal (IMC)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><i class="bi bi-arrow-down-circle-fill text-info p-5"></i> Peso inferior al normal</td>
            <td>Menos de 18.5</td>
          </tr>
          <tr>
            <td><i class="bi bi-check-circle-fill text-success p-5"></i> Peso normal</td>
            <td>18.5 - 24.9</td>
          </tr>
          <tr>
            <td><i class="bi bi-exclamation-triangle-fill text-warning p-5"></i> Peso superior al normal</td>
            <td>25 - 29.9</td>
          </tr>
          <tr>
            <td><i class="bi bi-x-circle-fill text-danger p-5"></i> Obesidad</td>
            <td>Más de 30</td>
          </tr>
        </tbody>
      </table>

      <h5 class="my-5 text-center text-primary-emphasis ">Visualiza tu progreso:</h5>
      <div class="progress">
        <div class="progress-bar  <?= $color ?>" role="progressbar"
          style="width: <?= $porcentaje ?>%;"
          aria-valuenow="<?= $imc ?>"
          aria-valuemin="0"
          aria-valuemax="40">
          IMC: <?= $imc ?>
        </div>
      </div>
    </section>
    <div class="row">
      <div class="col">
        <form action="enviar_resultado.php" method="POST" class="text-center mt-5">
          <input type="hidden" name="peso" value="<?= $peso ?>">
          <input type="hidden" name="altura" value="<?= $altura ?>">
          <input type="hidden" name="imc" value="<?= $imc ?>">
          <input type="hidden" name="mensaje" value="<?= $mensaje ?>">
          <div class="input-group w-100 mx-auto my-2 ">
            <span class="input-group-text arroba"><i class="fas fa-at text-white  botones"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Tu email" required>
          </div>
          <button type="submit" class="btn btn-primary botones my-5">Enviar resultados por correo</button>
        </form>
      </div>
    </div>
  <?php
  } elseif (isset($_GET['peso']) && isset($_GET['altura'])) {
    echo "<p class='text-danger'>La altura debe ser mayor a cero.</p>";
  }
  ?>
</main>

<?php include_once './footer.php'; ?>

<?php if (isset($_GET['peso']) && isset($_GET['altura']) && $_GET['altura'] > 0): ?>
  <script>
    window.addEventListener('load', function() {
      const resultado = document.getElementById('resultado-imc');
      if (resultado) {
        resultado.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  </script>
<?php endif; ?>

</body>

</html>