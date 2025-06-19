<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Newsreader%3Awght%40400%3B500%3B700%3B800&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>GoodBooks</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-[#131416] dark group/design-root overflow-x-hidden" style='font-family: Newsreader, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <<?php session_start(); ?>
      
        <header
        class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#2c3035] px-10 py-3"
      >
        <!-- Izquierda: Logo + Nombre de Usuario -->
        <div class="flex items-center gap-4 text-white">
          <div class="size-4">
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M44 4H30.6666V17.3334H17.3334V30.6666H4V44H44V4Z"
                fill="currentColor"
              ></path>
            </svg>
          </div>
          <h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">
            GoodBooks
          </h2>
          <?php if (isset($_SESSION['username'])): ?>
            <span class="ml-4 text-[#a3abb2] font-semibold">Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
          <?php endif; ?>
        </div>

        <!-- Derecha: Navegación -->
        <div class="flex gap-6 items-center">
          <div class="flex items-center gap-9">
          <a class="text-white text-sm font-medium leading-normal" href="/html/pagina_inicio.php">Inicio</a>
          <a class="text-white text-sm font-medium leading-normal" href="/html/recomendaciones.php">Recomendaciones</a>
          <a class="text-white text-sm font-medium leading-normal" href="/html/reseñas.php">Reseñas</a>
          <a class="text-white text-sm font-medium leading-normal" href="/html/nueva_reseña.php">Nueva Reseña</a>
        

          <?php if (isset($_SESSION['username'])): ?>
            <!-- Botón Logout -->
            <a
              href="/logout.php"
              class="ml-4 flex min-w-[84px] items-center justify-center rounded-full h-10 px-4 bg-red-500 text-white text-sm font-bold"
            >
              Logout
            </a>
          <?php else: ?>
            <!-- Botón Login -->
            <a
              href="/html/login.html"
              class="ml-4 flex min-w-[84px] items-center justify-center rounded-full h-10 px-4 bg-[#2c3035] text-white text-sm font-bold"
            >
              Login
            </a>
          <?php endif; ?>
        </div>

      </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex overflow-y-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
              <div class="flex items-stretch p-4 gap-3">
                <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                  <div
                    class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC-3UNwZsSE6eKpgCRwqBiUm4GAozFyuxmX0OWl5AFAG6PyIO69j4ZJerYeDUnz3RWOX9PLZfY9lLt4OzblvEsfqELAVBVZaeQnLMS8Wmi7ZLAG1lZauGvuwfFl3jRw7gBvaYUpPf8d_9UoLP7qGMcVwGCXCexLNISgfIkfzcUp2rmRgaMg9NhpYz8my2RaLq0XqipmfZ8pj0rGKzBSSlBgK9UndTVPAwnP-e1coFairFgceMoJMnlHUUPS-6ovCiDZypdjfV5BYRQT");'
                  ></div>
                  <div>
                    <p class="text-white text-base font-medium leading-normal">The Whispering Woods</p>
                    <p class="text-[#93acc8] text-sm font-normal leading-normal">A tale of magic and adventure</p>
                  </div>
                </div>
                <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                  <div
                    class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBrRmmRJIg_wLyiOWj1Noh1xFpRfvjKeP5QjDHPOzYwCi0D9YBYpswma1htkCTYrVuPa764Hoq12iBMjwuflv464tdaazGpwHRHt7q7sEQvwD0k09_4RptsIH3Gv082x3DhJjM0CTBLK3CLsp_Tss_EsRxnvFeuMmFZSMroYWWUN8Vs3GLfTp4oeQzQ1HDSDlZndukNs2Nnqk7-OSiknZ3QRzfg8cqTagyEFwfWHQKb_90LOz25laTi_4ykbO6a5E-HYLRYBHvm2AYZ");'
                  ></div>
                  <div>
                    <p class="text-white text-base font-medium leading-normal">Shadows of the Past</p>
                    <p class="text-[#93acc8] text-sm font-normal leading-normal">A thrilling mystery unfolds</p>
                  </div>
                </div>
                <div class="flex h-full flex-1 flex-col gap-4 rounded-lg min-w-60">
                  <div
                    class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg flex flex-col"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCEV9edQa5e9VYyb84k4lVVMtebI7Su23jLT5gjDOVWJ65-UZGvJHBvmjVUYOiJfVHjeqHQCDfRnpwS0Eq52OcnLlqywRumghiYgXA7-SYIKzMKjyBjQcOb_barx_fEoFJRqh6_WWpxpOdXAah4_g8oYjtMa_PERAfVThaOGR6GJbBa_-HfUV2YzXZHLWuvBqMbMnEAfDo8yiliMjIyPA2aRa9t0dtfEnRinZpnKu_hwB-9nhuctvKI1aAVCtt9UXKIqH3YuFfGjtuZ");'
                  ></div>
                  <div>
                    <p class="text-white text-base font-medium leading-normal">Echoes of Tomorrow</p>
                    <p class="text-[#93acc8] text-sm font-normal leading-normal">Explore the future in this sci-fi epic</p>
                  </div>
                </div>
              </div>
            </div>
            <h2 class="text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Featured Reviews</h2>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB5r0KXeOwhN099sqVhnG2yKV5Nh_lE-_CpPsjSP4y5mm_27FZAuCcfspWDXlli8AY5ke5VzWKt1m9TaUhXhKD7t9p3z9b9ANY1rZw2a1cYo9d0m-cPocJjs1hJu-PE1bpXdhcAV2up8MkNpXMHxXywGd2Imrt_JJKlx16kgREUgcszvFdPgTA4gjwfpWl5AwhxdBZcUSjJPLEzL4iWTCRWafUJ68HHh4C42frZt8hFWrPyIQ3IGHLofAdY-0B_JmHNsHNBYQ2xUNeQ");'
                ></div>
                <div>
                  <p class="text-white text-base font-medium leading-normal">The Secret Garden</p>
                  <p class="text-[#93acc8] text-sm font-normal leading-normal">A heartwarming story of discovery</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAUcDyhHrY91WG6c1t3LjJNvMj_UA_PJ8BHsLkyZ-dKfmiv7o0q4K4AsFQquAJhuPRLV8cg4pFgJf4n6s_bMPAIvN-p3_XB5tOPF-cp3CdK8JfUZFUFK7SqUIeyaNwRCI3BRZjobbOntuklTnZjD7k3pojZCkOKyVK89tS3W-k-ougFQcFg9vvwwX6TA2f1_dwzU3FFNjUrJ3B_Tas6OHWoGZduhsjE5WReRV1wE8mBMpqgDHl24quGuZJtc3ElF6pUGYdLj0iRINSM");'
                ></div>
                <div>
                  <p class="text-white text-base font-medium leading-normal">The Lost City</p>
                  <p class="text-[#93acc8] text-sm font-normal leading-normal">An adventure to a hidden civilization</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCnaMIYRrpIcuV-sQ9bprCx4HCmXp-jmzVWHy1Aw38rA-7Yi2lphe8ln_F0kQNsZ75GAt3Iq-xohnr1JSnUyhqK6f0n0uYpDdNl_d_AFUyu8Eu9arpil_T20QmR9z26bI5DLq1qykIIfnjWjB3mqjJG07S9_10_tLvRSyvnZCfvTaQSlOPZXhyFWORwuCzIuYvX5ysk3jLRS8YfNEAP3ym4E54cake3SQ4WYBHwJZg2QEwXD7wn_fVLpfm-rwR3gzNZxZn6xJSYB9Z4");'
                ></div>
                <div>
                  <p class="text-white text-base font-medium leading-normal">The Silent Sea</p>
                  <p class="text-[#93acc8] text-sm font-normal leading-normal">A journey across a mysterious ocean</p>
                </div>
              </div>
            </div>
            <h2 class="text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Explore Genres</h2>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCVRjywkE5a4175mD6Drhb5efaXYWr1HU80Y3GmlyGExBGT0HqKRYuAn4i2cF2xtWoFzmK0zcwme7kJmpQRINU08hKCcriUJO7jAWo4gOogNiLM_Rj9CQJpXQISInF8DVomxlxmfMZLs9wf8NUe6zJG6fpZMawuJ40OLZkHcrKPfKdluyZUK60gjMc8YmDIGUjngo8ZF6eohlRzLPcWot8IdB3lxPoztwPWqp79usvuz4_ghKnt4EbLLFx6IUeJ3XYI1k9v3Nl8AGw_");'
                ></div>
                <p class="text-white text-base font-medium leading-normal">Fantasy</p>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDNoytkv51MMJlhuw1hnjzEPrTIrhMJLy9ktRZV2URo41O2KRRJoVh8JLDeYOI4t_BjnZQZmmfSPogTidXzl3iTpLFJkfDe9UXYqH_Ik_9SQe03khF6BW9drp52swJ4CPn7VYV0SqlQDXmOG1L8fwjNmEeLOhWFmAAnBFT5_nKBsMMKR9A6AsBGxc4nH6IckJyem3HN51WSWFTDbvFRbT4lWrXkB7c99O6TpqYkTJvy47BJhk06fwmjKJY-ZKN3cfOvIzq4V6KD2uhW");'
                ></div>
                <p class="text-white text-base font-medium leading-normal">Mystery</p>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBI3kLUo3nW2x5P5IZz8y4FFOriVa6ph3hAaOzPaIybl-2FCJrsTbhUNWiSXLCQSBJA1VVAJqNJ9rM5Y1tS3EqIylwi8Jr9qAeogmYMwwPIFbD6R0inGPQsKRDyw5lRIxL6lei5akQ8YlKNhNtz-YRjlfGZErC5uvHDI64-yMlbOTWH82_upIfI-nt9N7cZeHFj2k5lZHGie_bZ9u0NyMmv1ORHRnn2B5-jDYBrbU9e2qW9XrCyqcn_NNymOloOyGxbS-gpcQBOc2wH");'
                ></div>
                <p class="text-white text-base font-medium leading-normal">Science Fiction</p>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCBSk65oMQFVuMlHjuxenz0TkbzVXBhWNiaDijQJ40HrLeZRAk9F_yJR9ZfzJaV4eqobsbFppSszPk8TFUJQeaJCuD5SeNpkl06J8mHJJnxso6O6zOrjKuM0QV9yWmjYkqwamlOGNEqT9as5rrqpknbvYxpRm5_xUVSSPS5YXZhoy7uvRleo6yIWir3yWX5vNGPF1zGAcwB75VxodtdXIEYAoyVCOm8E174fwirkYG7CYjPL78dsysSHhDJGLQ3d-wL0FyHSrx9zzcC");'
                ></div>
                <p class="text-white text-base font-medium leading-normal">Romance</p>
              </div>
            </div>
          </div>
        </div>
        <footer class="flex justify-center">
          <div class="flex max-w-[960px] flex-1 flex-col">
            <footer class="flex flex-col gap-6 px-5 py-10 text-center @container">
              <div class="flex flex-wrap items-center justify-center gap-6 @[480px]:flex-row @[480px]:justify-around">
                <a class="text-[#93acc8] text-base font-normal leading-normal min-w-40" href="#">About</a>
                <a class="text-[#93acc8] text-base font-normal leading-normal min-w-40" href="#">Contact</a>
                <a class="text-[#93acc8] text-base font-normal leading-normal min-w-40" href="#">Privacy Policy</a>
                <a class="text-[#93acc8] text-base font-normal leading-normal min-w-40" href="#">Terms of Service</a>
              </div>
              <div class="flex flex-wrap justify-center gap-4">
                <a href="#">
                  <div class="text-[#93acc8]" data-icon="TwitterLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M247.39,68.94A8,8,0,0,0,240,64H209.57A48.66,48.66,0,0,0,168.1,40a46.91,46.91,0,0,0-33.75,13.7A47.9,47.9,0,0,0,120,88v6.09C79.74,83.47,46.81,50.72,46.46,50.37a8,8,0,0,0-13.65,4.92c-4.31,47.79,9.57,79.77,22,98.18a110.93,110.93,0,0,0,21.88,24.2c-15.23,17.53-39.21,26.74-39.47,26.84a8,8,0,0,0-3.85,11.93c.75,1.12,3.75,5.05,11.08,8.72C53.51,229.7,65.48,232,80,232c70.67,0,129.72-54.42,135.75-124.44l29.91-29.9A8,8,0,0,0,247.39,68.94Zm-45,29.41a8,8,0,0,0-2.32,5.14C196,166.58,143.28,216,80,216c-10.56,0-18-1.4-23.22-3.08,11.51-6.25,27.56-17,37.88-32.48A8,8,0,0,0,92,169.08c-.47-.27-43.91-26.34-44-96,16,13,45.25,33.17,78.67,38.79A8,8,0,0,0,136,104V88a32,32,0,0,1,9.6-22.92A30.94,30.94,0,0,1,167.9,56c12.66.16,24.49,7.88,29.44,19.21A8,8,0,0,0,204.67,80h16Z"
                      ></path>
                    </svg>
                  </div>
                </a>
                <a href="#">
                  <div class="text-[#93acc8]" data-icon="InstagramLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z"
                      ></path>
                    </svg>
                  </div>
                </a>
                <a href="#">
                  <div class="text-[#93acc8]" data-icon="FacebookLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z"
                      ></path>
                    </svg>
                  </div>
                </a>
              </div>
              <p class="text-[#93acc8] text-base font-normal leading-normal">@2024 GoodBooks. All rights reserved.</p>
            </footer>
          </div>
        </footer>
      </div>
    </div>
  </body>
  <body>
  <script>
    const params = new URLSearchParams(window.location.search);
    if (params.get("success") === "1") {
      const message = document.createElement("div");
      message.textContent = "✅ Reseña cargada exitosamente";
      message.className = "fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg z-50";
      document.body.appendChild(message);

      // Desaparece luego de 3 segundos
      setTimeout(() => {
        message.remove();
        // Eliminar el parámetro de la URL sin recargar
        history.replaceState(null, "", window.location.pathname);
      }, 3000);
    }
  </script>

</html>
