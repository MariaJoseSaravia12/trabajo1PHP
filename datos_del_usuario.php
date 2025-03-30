<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Capturar los datos del formulario
  $nombre = $_POST['name'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];

  // Crear contenido a guardar en archivo
  $contenido = "Nombre: $nombre\nApellido: $apellido\nEmail: $email\nMensaje: $mensaje\n------------------------\n";

  // Guardar en archivo .txt
  $archivo = 'mensajes.txt';
  file_put_contents($archivo, $contenido, FILE_APPEND);

  include_once './header.php';
  ?>

  <main class="container my-5">
    <h2 class="mb-4 ">Datos del Usuario</h2>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
    <p><strong>Apellido:</strong> <?= htmlspecialchars($apellido) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Mensaje:</strong> <?= nl2br(htmlspecialchars($mensaje)) ?></p>

    <div class="alert  mt-4 text-center">
      <h4>¡Gracias por tu mensaje!</h4>
      <p>Hemos guardado tu información. ❤️</p>
    </div>

    <a href="contacto.php" class="btn btn-primary mt-4 botones">Volver </a>
  </main>

  <?php include_once './footer.php'; ?>

<?php
} else {
  // Acceso no permitido (directo sin POST)
  header("Location: contacto.php");
  exit;
}
?>
