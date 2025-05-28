// script.js - FUNFOREE (manejo universal de formularios)
document.addEventListener("DOMContentLoaded", () => {
  // Selecciona todos los formularios con data-action (para múltiples formularios en la web)
  document.querySelectorAll("form[data-action]").forEach((form) => {
    const submitBtn = form.querySelector("button[type='submit']");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = "Enviando…";
      }

      try {
        // Usa el atributo data-action como endpoint (ej: php/guardar-datos.php)
        const action = form.getAttribute("data-action");
        const response = await fetch(action, {
          method: "POST",
          body: new FormData(form),
        });

        if (response && response.ok) {
          const resultado = await response.text();
          alert(resultado);
          form.reset(); // Limpia el formulario después de éxito
        } else if (response) {
          const errorTxt = await response.text();
          alert(`❌ Error al guardar: ${response.status} - ${errorTxt}`);
        } else {
          alert("❌ No se recibió respuesta del servidor.");
        }
      } catch (err) {
        console.error("Error al guardar los datos:", err);
        alert("❌ Error de conexión o inesperado: " + err.message);
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = "Enviar";
        }
      }
    });
  });
});
