<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Restablecer Contraseña</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>
<body class="bg-[#131416] flex justify-center items-center min-h-screen">
  <form action="/reset_password.php" method="post" class="bg-[#1e2124] p-8 rounded-xl w-[400px] border border-[#41474e]">
    <h2 class="text-white text-lg font-bold mb-4 text-center">Nueva contraseña</h2>

    <input type="hidden" name="username" value="<?php echo htmlspecialchars($_GET['user'] ?? ''); ?>" />

    <label class="block mb-4">
      <span class="text-white font-medium">Nueva contraseña</span>
      <input type="password" name="new_password" required class="mt-1 w-full p-3 rounded bg-[#2c3035] text-white border border-[#41474e]" />
    </label>

    <label class="block mb-6">
      <span class="text-white font-medium">Confirmar contraseña</span>
      <input type="password" name="confirm_password" required class="mt-1 w-full p-3 rounded bg-[#2c3035] text-white border border-[#41474e]" />
    </label>

    <button type="submit" class="w-full bg-[#bcd0e5] text-[#131416] font-bold py-2 rounded-full hover:bg-[#a0b1c2]">
      Guardar contraseña
    </button>
  </form>
</body>
</html>
