let paso = 1;
const init = 1;
const final = 3;

const cita = {

    nombre: "",
    usuarioID:'',
    fecha: "",
    hora: "",
    servicios: []

}

document.addEventListener('DOMContentLoaded', function () {


    iniciarapp();
    consultarAPI();//consulta la api en el backend de php
    
    paginador();//listener de los botones de siguiente y anterior
    paginaSig();//navegacion y re asginacion de los valores a las variables de paginacion
    paginaAnt();
    nombreClienteYid();//alamacena el nombre del cliente logueado en el objeto cita
    fechaCita();//obtengo la fecha de la cita y a la almaceno en el objeto cita
    horaCita();//obtengo la hora y lo agrego a cita
    mostrarResumen();//el recumen te la cita con las validaciones
    mostrarseccion();//llamo a la funcion la primera vez para que me muetra una seccion de arranque
});

function iniciarapp() {



    Tabs();
    


}



function Tabs() {//Esta funcion detecta cuando se clickea en un tab y llama a la funcion de mostrar seccion

    const botones = document.querySelectorAll('.navegacion a');
    
    botones.forEach(function (boton) {

        boton.addEventListener('click', function (e) {
            paso = parseInt(boton.dataset.paso);
            mostrarseccion();
            paginador();
        });
    });


}
function mostrarseccion() {//quita y agrega la clase de mostrar las secciones
    
    let seccionAnt = document.querySelector('.mostrar');
    let botonAnt = document.querySelector('.seleccionado');
    if (seccionAnt) {
        seccionAnt.classList.remove('mostrar');
        botonAnt.classList.remove('seleccionado');
    }
    
    let seccion = document.querySelector(`#paso-${paso}`);
    seccion.classList.add('mostrar');

    //resaltar el boton
    let boton = document.querySelector(`[data-paso="${paso}"]`);
    boton.classList.add('seleccionado');




}
function paginador() {


    let siguiente = document.querySelector('#siguiente');
    let anterior = document.querySelector('#anterior');


    if (paso === 1) {
        anterior.classList.add('ocultar');
        siguiente.classList.remove('ocultar');
    } else if (paso === 3) {
        siguiente.classList.add('ocultar');
        anterior.classList.remove('ocultar');
        mostrarResumen();

    } else {
        anterior.classList.remove('ocultar');
        siguiente.classList.remove('ocultar');

    }



}
function paginaAnt() {
    let anterior = document.querySelector('#anterior');

    anterior.addEventListener('click', function () {



        paso -= 1;
        mostrarseccion();
        paginador();



    });
}

function paginaSig() {

    let siguiente = document.querySelector('#siguiente');
    siguiente.addEventListener('click', function () {


        paso += 1;
        mostrarseccion();
        paginador();


    });

}
async function consultarAPI() {


    try {
        const url = "/api/servicios";
        console.log(url);
        const resultado = await fetch(url);
        const datos = await resultado.json();
        mostrarDatos(datos);

    } catch (error) {
        console.log(error);
    }

}

function mostrarDatos(datos) {
    //iteracion sobre un obejeto con forecha (el servicio ese es el alias de cada indice del arreglo)
    datos.forEach(servicio => {

        const { id, nombre, precio } = servicio;

        //creo un nuevo elemento html con el valor de nombre que traje con el fetch de mi base de datos
        const nombreServicio = document.createElement('P');
        nombreServicio.textContent = nombre;
        nombreServicio.classList.add('nombreservicio');

        //creo el elemento precio
        const precioServicio = document.createElement('P');
        precioServicio.textContent = `$ ${precio}`;
        precioServicio.classList.add('precioservicio');

        //creo el contenedo de los servicios
        const contenedorservicios = document.createElement('DIV');
        contenedorservicios.classList.add('servicios');

        //le agrego un atributo personalizado a cada servicio que contenga el id
        contenedorservicios.dataset.idServicio = id;

        //agrego los servicios y el precio al conenedor
        contenedorservicios.appendChild(nombreServicio);
        contenedorservicios.appendChild(precioServicio);

        //agrego el div que cree al html donde ya tenia un div
        const divServicios = document.querySelector('.listado-servicios');
        divServicios.appendChild(contenedorservicios);

        //registro el evento cuando clickean en un servicio
        contenedorservicios.onclick = function () {
            seleccionarServicio(servicio);

        }


    });

}

function seleccionarServicio(e) {


    //agrego al arreglo de servicios que esta en el objeto cita que cree aca una copia [...] del servicio seleccionado
    const { servicios } = cita;
    const { id } = e;


    //comprobar si un servicio ya fue agregado y quiero borrarlo
    if (servicios.some(function (agregado) { return agregado.id === id; })) {
        //eliminalo el que ya esta
        cita.servicios = servicios.filter(agregado => agregado.id !== id);
    } else {

        cita.servicios = [...servicios, e];

    }

    //creo un selector del servicio selccionado para darle estilos con el id que me traje cuando llame la funcion

    const seleccionado = document.querySelector(`[data-id-servicio="${id}"]`);
    seleccionado.classList.toggle('seleccionado');



}

function nombreClienteYid() {

    cita.nombre = document.querySelector('[data-nombre]').dataset.nombre;
    cita.usuarioID= document.querySelector('[data-id]').dataset.id;
    

}
function fechaCita() {

    const inputFecha = document.querySelector('#fecha');
    inputFecha.addEventListener('input', function (e) {

        const dia = new Date(e.target.value).getUTCDay();

        //ese includes es una funcion para arreglos que revisa que el argumento pasado este en el arreglo que llama al includes
        if ([6, 0].includes(dia)) {
            e.target.value = null;
            mostrarAlerta('Dias Sabados y Domingos cerrados', 'error', true, '.formulario');
        } else {
            cita.fecha = e.target.value;

        }
    });

}



function horaCita() {

    const hora = document.querySelector('#hora');
    hora.addEventListener('input', function (e) {

        if (e.target.value <= "09:00" || e.target.value >= "18:00") {

            mostrarAlerta('Hora incorrecta', 'error', true, '.formulario');
            e.target.value = "";
        } else {

            cita.hora = e.target.value;

        }


    })
}

function mostrarResumen() {

    const divResumen = document.querySelector('#paso-3');
    let totalServicios = 0;
    const opciones = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }
    while (divResumen.firstChild) {

        divResumen.removeChild(divResumen.firstChild);
    }

    if (Object.values(cita).includes("") || cita.servicios.length === 0) {
        mostrarAlerta('Hacen falta datos', 'error', false, '#paso-3');
        return;
    }


    const { nombre, fecha, hora, servicios } = cita;
    const fechaFormateada = new Date(fecha);
    const dia = fechaFormateada.getDate() ;
    const mes = fechaFormateada.getMonth();
    const anio = fechaFormateada.getFullYear();
    fechaUTC = new Date(Date.UTC(anio, mes, dia));
    const fechaFinal = fechaUTC.toLocaleDateString('es-AR', opciones);
    const contenedor = document.createElement('DIV');

    contenedor.classList.add('contenedor-servicios');

    const nombreCliente = document.createElement('P');
    nombreCliente.innerHTML = ` <span>Nombre:</span> ${nombre}`;

    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = ` <span> Fecha : </span>${fechaFinal} `;

    const horaCita = document.createElement('P');
    horaCita.innerHTML = ` <span> Hora :</span> ${hora} `;

    const totalSer = document.createElement('H4');


    contenedor.appendChild(nombreCliente);
    contenedor.appendChild(fechaCita);
    contenedor.appendChild(horaCita);


    servicios.forEach(function (servicio) {
        const contenedorServicios = document.createElement('DIV');
        const serCita = document.createElement('P');
        serCita.innerHTML = ` <span> Servicio :</span> ${servicio.nombre} `;
        contenedorServicios.appendChild(serCita);

        const precioCita = document.createElement('P');
        precioCita.innerHTML = ` <span> Coste :</span> $${servicio.precio} `;

        contenedorServicios.appendChild(precioCita);
        contenedorServicios.classList.add('precio');


        totalServicios += parseInt(servicio.precio);
        divResumen.appendChild(contenedorServicios);
    })

    totalSer.textContent = `Total Gastado : $${totalServicios}`;
    contenedor.appendChild(totalSer);
    divResumen.appendChild(contenedor);

    const botonReservar = document.createElement('button');
    botonReservar.classList.add('boton');
    botonReservar.textContent = 'Reservar';
    divResumen.appendChild(botonReservar);
    botonReservar.onclick = reservarcita;

}

//envio de datos al back por medio de API
async function reservarcita() {

    const datos = new FormData();
    const { nombre, fecha, hora, servicios,usuarioID } = cita;
    //recorro los servicios y almaceno si id en una variable
    //lo hago con map, este itera sobre un arreglo y retorna la condicion
    const serviciosID= servicios.map(servicio=>servicio.id);//retorna los servicios.id en forma de string ('1,2,3,4')

    datos.append('fecha', fecha);
    datos.append('hora', hora);
    datos.append('servicios', serviciosID);
    datos.append('usuario_id', usuarioID);

    try {
        //conectar con la api
    //creo la variable que contiene la url de la api
    const url = `/api/citas`;
    //envio la consulta con un await por si demora
    //el sendo parametro es la configuracion que esta en un objeto, en este caso el metodo POST
    const respuesta = await fetch(url, { method: 'POST', body: datos });
    const resultado = await respuesta.json();
    console.log(respuesta);
   
    //si la url soporta el metodo post emite respuesta
    if (resultado){
        Swal.fire({
            position: "center-center",
            icon: "success",
            title: "Su cita ha sido Reservada",
            showConfirmButton: false,
            timer: 2500,
          }).then(()=> window.location.reload());
    }
    } catch (error) {

        
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Ha ocurrido un error, vuelva a intentarlo en unos minutos",
            footer: '<a href="/cita">volver al inicio</a>'
          });
    }
    
    

}


//mostrador de aletas

function mostrarAlerta(mensaje, clase, desaparece = true, objeto) {

    //si no puedo seleccionar una alertaprevia porque no existe. entonces genero la nueva para que no se repitan
    const avisoprevio = document.querySelector('.error');//selecciono la alerta que se crea,

    if (avisoprevio) {
        avisoprevio.remove();

    }

    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add(clase);


    const formulario = document.querySelector(objeto);
    formulario.appendChild(alerta);

    if (desaparece) {
        setTimeout(() => {
            alerta.remove();
        }, 3000);

    }


}

