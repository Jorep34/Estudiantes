document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("studentForm");

    if (form) {
        form.addEventListener("submit", (event) => {
            const nombre = document.getElementById("nombre").value.trim();
            const edad = Number(document.getElementById("edad").value);

            if (!nombre) {
                event.preventDefault();
                alert("Ingrese el nombre del estudiante.");
                return;
            }

            if (!Number.isInteger(edad) || edad < 1 || edad > 120) {
                event.preventDefault();
                alert("Ingrese una edad entera entre 1 y 120 años.");
            }
        });
    }

    const alerts = document.querySelectorAll(".alert");
    alerts.forEach((alert) => {
        setTimeout(() => {
            alert.style.transition = "opacity .4s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 400);
        }, 4000);
    });
});
