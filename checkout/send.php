<?php
// Configuración: cambia esto a tu correo real
$to = 'tu_correo@ejemplo.com';  // ⚠️ CAMBIA esto
$subject = 'Nueva orden desde el sitio web';

// Recoge los datos del formulario
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';
$service = $_POST['service-type'] ?? '';
$plan = $_POST['plan'] ?? '';

// Validación básica
if (!$name || !$email || !$phone || !$address || !$service || !$plan) {
    die('Por favor completa todos los campos obligatorios.');
}

// Construye el mensaje
$message = "
📥 NUEVA ORDEN RECIBIDA:

👤 Nombre: $name
📧 Correo: $email
📞 Teléfono: $phone
📍 Dirección: $address
🔧 Tipo de servicio: $service
📦 Plan seleccionado: $plan

🕒 Fecha: " . date('d/m/Y H:i:s');

// Encabezados del correo
$headers = "From: no-reply@telcomnetworkservices.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8";

// Envío
$enviado = mail($to, $subject, $message, $headers);

// Redirección después del envío
if ($enviado) {
    header("Location: gracias.html"); // ✅ Página que deberás crear
    exit;
} else {
    echo "Hubo un problema al enviar tu mensaje. Intenta nuevamente.";
}
?>