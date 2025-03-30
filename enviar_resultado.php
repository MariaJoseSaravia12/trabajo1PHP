<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $peso = $_POST['peso'];
  $altura = $_POST['altura'];
  $imc = $_POST['imc'];
  $mensaje = $_POST['mensaje'];
  $email_usuario = $_POST['email'];

  // Validación básica
  if (!filter_var($email_usuario, FILTER_VALIDATE_EMAIL)) {
    echo "Email inválido.";
    exit;
  }

  $asunto = "Resultado de tu cálculo IMC - Rescue Salud";
  $contenido = "Gracias por usar Rescue Salud.\n\n";
  $contenido .= "Aquí están tus resultados:\n";
  $contenido .= "Peso: $peso kg\n";
  $contenido .= "Altura: $altura m\n";
  $contenido .= "IMC: $imc\n";
  $contenido .= "Interpretación: $mensaje\n";

  $cabeceras = "From: info@rescuesalud.com\r\n";
  $cabeceras .= "Reply-To: no-reply@rescuesalud.com\r\n";
  $cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Envía el mail
  $enviado = mail($email_usuario, $asunto, $contenido, $cabeceras);

  include_once './header.php';
  ?>

  <main class="container my-5 text-center">
    <?php if ($enviado): ?>
      <div class="alert ">
        <h4>¡Resultado enviado!</h4>
        <p>Revisá tu correo: <strong><?= htmlspecialchars($email_usuario) ?></strong></p>
      </div>
    <?php else: ?>
      <div class="alert alert-error">
        <h4>Ocurrió un error 😥</h4>
        <p>No se pudo enviar el correo. Intentalo de nuevo más tarde.</p>
      </div>
    <?php endif; ?>
    <a href="index.php" class="btn btn-primary mt-3 botones">Volver</a>
  </main>

  
<?php
} else {
  header("Location: index.php");
  exit;
}
?>
