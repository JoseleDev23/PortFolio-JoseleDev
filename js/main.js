function updateResumeLink() {
    // Obtenemos el idioma de la traducción
    const currentLanguage = document.documentElement.lang; // Esto obtiene el atributo lang del HTML
    
    // Obtenemos el enlace del currículum
    const resumeLink = document.getElementById("download-resume");
    
    // Cambiamos el enlace según el idioma
    if (currentLanguage === "es") { // Si el idioma es español
        resumeLink.href = "Curriculum Desarrollador Web.pdf"; // Cambiar a currículum en español
    } else {
        resumeLink.href = "Resume Web Development.pdf"; // Cambiar a currículum en inglés
    }
}

// Esperamos a que la página se cargue
window.onload = function() {
    // Llamamos a la función para actualizar el enlace
    updateResumeLink();
    
    // Usamos un MutationObserver para detectar cambios en el atributo lang
    const observer = new MutationObserver(updateResumeLink);
    
    // Configuración del observador: observar cambios en el atributo lang
    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['lang']
    });
};
