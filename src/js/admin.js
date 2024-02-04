document.addEventListener('DOMContentLoaded', function () {

    mostrarcitas();
    buscador();
    Tabs();

 

});

function mostrarcitas() {

    const detalles = document.querySelectorAll('.icon');

    detalles.forEach(detalle => {

        detalle.addEventListener('click', function () {
            detalle.classList.toggle('girar');
            mostrarinfo(detalle.attributes.id);

        });
    });
}

function mostrarinfo(id) {

    const idSeleccionado = id.value;
    const info = document.querySelectorAll(`[data-cita="${idSeleccionado}"]`);
    info.forEach(function(cita){

        cita.classList.toggle('mostrar');

    });
    

}

function buscador(){

    const fecha = document.querySelector('#fecha');

    fecha.addEventListener('input', function(e){

        const fechaSelec = e.target.value;

        //redirecciona a la misma pagina que contiene este script y le suma el querystring
        window.location = `?fecha=${fechaSelec}`;

    } );
}

function Tabs(){

    const tab = document.querySelectorAll('.tabs');

    tab.forEach(tab=> tab.addEventListener('click',function(){

            window.location = `http://localhost:3000${tab.attributes.href.value}`;
            console.log(tab.attributes.href.value);

    }));
}




