<!-- Ejemplo de uso de Alpine.js y Tailwind CSS para actualizar y dar estilo al reloj con la fecha en formato deseado -->
<div x-data="{ hora: '', fecha: '' }" x-init="setInterval(() => {
    const now = new Date();
    hora = now.toLocaleTimeString();
    fecha = `${('0' + now.getDate()).slice(-2)}/${('0' + (now.getMonth() + 1)).slice(-2)}/${now.getFullYear()}`;
}, 1)" class="text-4xl font-bold text-center mt-8">
    <div class="bg-gray-800 text-white p-2 rounded-md shadow-md">
        <span x-text="hora"></span>
        <span class="block text-sm" x-text="fecha"></span>
    </div>
</div>
