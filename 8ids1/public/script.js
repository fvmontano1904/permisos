function mostrar_informacion() {
 
    nombre = `<div class="contenedor">  
    <div class="contenedor_blanco">
        <p>Nombre: Adian Vasco Hernandez</p>
    </div>
</div>
<div class="contenedor">  
    <div class="contenedor_blanco">
        <p>Edad: 19</p>
    </div>
</div>
<div class="contenedor">  
    <div class="contenedor_blanco">
        <p>Carrera: Desarrollo y Gestop de Software</p>
    </div>
</div>
<div class="contenedor">  
    <div class="contenedor_blanco">
        <p>Profesor: Atlitec</p>
    </div>
</div>`;  
div_elementos = document.getElementById("div_elementos_h");
div_elementos.innerHTML = nombre;
}
function ocultar_info(params) {
    div_elementos = document.getElementById("div_elementos_h");
    div_elementos.innerHTML = '';
}