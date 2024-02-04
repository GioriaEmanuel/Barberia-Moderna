
document.addEventListener('DOMContentLoaded', function () {

    mostrarcitas();
    iniciarCalendario();

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

function iniciarCalendario(){

        let fecha = document.querySelectorAll('.fecha');
        let calendarEl = document.querySelector('.calendario');
        let calendar = new FullCalendar.Calendar(calendarEl,
            {
                initialView: "dayGridMonth",
                selectable: true,
                locales: 'es',
              });
        
        fecha.forEach(function(f){
            frecortada=f.textContent.split(': ')
            calendar.addEvent(
                {
                  id: 'a',
                  title: 'Cita',
                  start: `${frecortada[1]}`
                }
              )
              
            
        });

        
        calendar.render();
     
}

