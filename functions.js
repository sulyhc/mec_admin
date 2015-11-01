var container = "#container";
//contenedor principal de la pagina NO MODIFICAR PUTOS

$(document).ready(function() {
	loadEntradasSalidas();
});

function modalPanelAdmin() {
	$.ajax({
		type : "POST",
		url : "helper/modalLoginAdmin.php",
		success : function(data) {
			$("#modalLoginAdmin").html(data);
			$("#modalLoginAdmin").modal({
				backdrop : 'static',
				keyboard : false
			});
		}
	});
}

//carga el panel del administrador
function panelAdmin() {
	$.ajax({
		type : "POST",
		url : "view/administrador.php",
		success : function(data) {
			$(container).html(data);
		}
	});
}

//modal que edita los puestos
function modalEditPuestos(id) {
	$.ajax({
		type : "POST",
		url : "helper/modalEditPuesto.php",
		data : {
			"id" : id
		},
		success : function(data) {
			$("#modalEditPuestos").html(data);
			$("#modalEditPuestos").appendTo('body').modal({
				backdrop : 'static',
				keyboard : false
			});

		}
	});
}

//carga la pantalla del relog checador para el personal
function loadEntradasSalidas() {
	$.ajax({
		type : "POST",
		url : "view/relog.php",
		success : function(Data) {
			$(container).html(Data);
		}
	});
}

//registra una entrata/salida del empleado en el relog checador
function regMovEmpleado() {
	modalLoginEmpleado();
}

//modal para el login del empleado
function modalLoginEmpleado() {
	$.ajax({
		type : "POST",
		url : "helper/modalLoginEmpleado.php",
		success : function(data) {
			$("#modalLoginEmpleado").html(data);
			$("#modalLoginEmpleado").appendTo('body').modal({
				backdrop : 'static',
				keyboard : false
			});

		}
	});
}

//carga los empleados manejados en el sistema
function loadEmpleados() {
	$.ajax({
		type : "POST",
		url : "helper/loadEmpleados.php",
		success : function(data) {
			$("#bodyAdmin").html(data);
		}
	});
}

//carga los puestos de los empleados
function loadPuestos() {
	$.ajax({
		type : "POST",
		url : "helper/loadPuestos.php",
		success : function(data) {
			$("#bodyAdmin").html(data);
		}
	});
}

//carga las ultimas asistencias en general
function loadAsistencias() {
	$.ajax({
		type : "POST",
		url : "helper/loadAsistencia.php",
		success : function(data) {
			$("#bodyAdmin").html(data);
		}
	});
}

//carga la pantalla para generar la nomina
function creaNomina() {
	$.ajax({
		type : "POST",
		url : "helper/generaNomina.php",
		success : function(data) {
			$("#bodyAdmin").html(data);
		}
	});
}

//metodo que abre el modal para editar un empleado
function modalEditEmpleado(id) {
	$.ajax({
		type : "POST",
		url : "helper/modalEditEmpleado.php",
		data : {
			"id" : id
		},
		success : function(data) {
			$("#modalEditEmpleado").html(data);
			$("#modalEditEmpleado").modal("show");
		}
	});
}

//modal que abre un modal para registra un nuevo empleado
function modalNuevoEmpleado() {
	$.ajax({
		type : "POST",
		url : "helper/modalNuevoEmpleado.php",
		success : function(data) {
			$("#modalEditEmpleado").html(data);
			$("#modalEditEmpleado").modal("show");
		}
	});
}

//metodo que abre un modal para solicitar la confirmacion de eliminar un empleado
function modalDelteEmpleado(id) {
	$.ajax({
		type : "POST",
		url : "helper/modalDeleteEmpleado.php",
		data : {
			"id" : id
		},
		success : function(data) {
			$("#modalDeleteEmpleado").html(data);
			$("#modalDeleteEmpleado").modal("show");
		}
	});
}

//metodo que abre un modal para justificar un empleado
function modalJustificaEmpleado(id) {
	$.ajax({
		type : "POST",
		url : "helper/modalJustificaEmp.php",
		data : {
			"id" : id
		},
		success : function(data) {
			$("#modalJustificacionEmp").html(data);
			$("#modalJustificacionEmp").modal("show");
		}
	});
}

//metodo que abre un modal para justificar un empleado
function modalCambiaContraEmpleado(id) {
	$.ajax({
		type : "POST",
		url : "helper/modalCambiaContra.php",
		data : {
			"id" : id
		},
		success : function(data) {
			$("#modalCambiaContra").html(data);
			$("#modalCambiaContra").modal("show");
		}
	});
}

//abre un modal para mostrar un mensaje de error
function modalError(msj, focus) {
	$.ajax({
		type : "POST",
		url : "helper/modalError.php",
		data : {
			"msj" : msj,
			"focus" : focus
		},
		success : function(data) {
			$("#modalError").html(data);
			$("#modalError").modal("show");
		}
	});
}

//checa la clave de un empleado
function checkClave() {
	var clve = $("#clveEmpleado").val();
	$.ajax({
		type : "POST",
		url : "helper/checkClave.php",
		data : {
			"id" : clve
		},
		success : function(data) {
			if (data == "1") {
				modalLoginEmpleado();
			} else {
				modalError("CLAVE DE EMPLEADO INVÁLIDA O NO EXISTE", "clveEmpleado");
				$("#clveEmpleado").val('');
			}
		}
	});
}

//registra la entrada de un empleado
function regMovEmpleado(id, pas) {
	$.ajax({
		type : "POST",
		url : "helper/regMovEmp.php",
		data : {
			"id" : id,
			"pass" : pas
		},
		success : function(data) {
			if (data != "") {
				$("#modalLoginEmpleado").modal("hide");
				location.reload();
			} else {
				modalError("CONTRASEÑA INVÁLIDA", "passEmpleado");
				$("#passEmpleado").val("");
			}
		}
	});
}

//modal para cambiar las fechas de asistencia
function modalChangeAsistencia(asiento, tipo) {
	$.ajax({
		type : "POST",
		url : "helper/modalChangeAsistencia.php",
		data : {
			'asiento' : asiento,
			'tipo' : tipo
		},
		success : function(data) {
			$("#modalChangeAsistencia").html(data);
			$("#modalChangeAsistencia").modal('show');
		}
	});
}

//checa la contraseña del administrador
function checkContraAdmin() {
	var id = $("#idAdmin").val();
	var contra = $("#contraAdmin").val();
	$.ajax({
		type : "POST",
		url : "helper/checkAdmin.php",
		data : {
			"id" : id,
			"pass" : contra
		},
		success : function(data) {
			if (data != "0" && data != '') {
				$(container).html(data);
				$("#modalLoginAdmin").modal("hide");
			} else {
				modalError("USUARIO Ó CONTRASEÑA INVÁLIDOS");
			}
		}
	});
}

//actualiza la asistencia
function updAsistencia(fecha, asiento, tipo) {
	$.ajax({
		type : "POST",
		url : "helper/updAsistencia.php",
		data : {
			'asiento' : asiento,
			'fecha' : fecha,
			'tipo' : tipo
		},
		success : function(Data) {
			loadAsistencias();
		}
	});
}

//muestra el modal para añadir un nuevo puesto
function modalNvoPuesto() {
	$.ajax({
		type : "POST",
		url : "helper/modalNvoPuesto.php",
		success : function(data) {
			$("#modalEditPuestos").html(data);
			$("#modalEditPuestos").appendTo('body').modal({
				backdrop : 'static',
				keyboard : false
			});

		}
	});
}

//genera la nomina
function generaNomina(inicio, fin, dias) {
	$.ajax({
		type : "POST",
		url : "helper/creaNomina.php",
		data : {
			"inicio" : inicio,
			"fin" : fin,
			"dias" : dias
		},
		success : function(Data) {
			$("#tablaNominas").html(Data);
		}
	});
}

//registra un nuevo puesto
function regNvoPuesto() {
	alert($("#formNvoPuesto").serializeArray());
	$.ajax({
		type : "POST",
		url : "helper/regNvoPuesto.php",
		data : $("#formNvoPuesto").serializeArray(),
		success : function(data) {
			alert(data);
			$("#modalEditPuestos").modal("hide");
			loadPuestos();
		}
	});
}

function guardaCambios(){
	alert($("#formEditEmp").serialize());
}

function justificaDia(){
	var dia = $("#diajusti").val();
	var id = $("#idEmp").val();
	$.ajax({
		type:"POST",
		url:"helper/justifica.php",
		data:{"idemp":id,"dia":dia},
		success:function(data){
			alert(data);
			$("#modalJustificacionEmp").modal("hide");
		}
	});
}

function cambiaPass(formu){
	alert(formu);
	$.ajax({
		type:"POST",
		url:"helper/cambiaContra.php",
		data:$("#"+formu).serialize(),
		success:function(data){
			alert(data);
		}
	});
}

