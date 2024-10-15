<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Proyecto GPI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="backend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="backend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="backend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="backend/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
	</div> -->
	<!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="backend/lib/chart/chart.min.js"></script>
    <script src="backend/lib/easing/easing.min.js"></script>
    <script src="backend/lib/waypoints/waypoints.min.js"></script>
    <script src="backend/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="backend/lib/tempusdominus/js/moment.min.js"></script>
    <script src="backend/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="backend/js/main.js"></script>
</body>
</html>

<?php
	include "basededatos.php";

    $con = conexion();

	// Función para verificar si una tabla existe
	function tablaExistente($con, $nomTabla) {
		$res = $con->query("SHOW TABLES LIKE '$nomTabla'");
		return $res->num_rows > 0;
	}

	// Comprobar y crear la tabla Usuarios

	if (!tablaExistente($con, 'Usuarios')) {
		$sql_create_plataformas = "
		CREATE TABLE Usuarios (
			idUsuario VARCHAR(255) PRIMARY KEY,
			contraseña VARCHAR(255),
			nombre VARCHAR(255),
			correo VARCHAR(255),
			telefono VARCHAR(255),
			fecha_nacimiento DATE,
            tipo INT
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Usuarios se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Usuarios: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Usuarios ya existe.<br>";
	}

    // Comprobar y crear la tabla Alumnos
    
	if (!tablaExistente($con, 'Alumnos')) {
		$sql_create_plataformas = "
		CREATE TABLE Alumnos (
			idAlumno INT PRIMARY KEY,
			FOREIGN KEY (idAlumno) REFERENCES Usuarios(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Alumnos se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Alumnos: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Alumnos ya existe.<br>";
	}

    // Comprobar y crear la tabla Profesores
    
	if (!tablaExistente($con, 'Profesores')) {
		$sql_create_plataformas = "
		CREATE TABLE Profesores (
			idProfesor INT PRIMARY KEY,
			FOREIGN KEY (idProfesor) REFERENCES Usuarios(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Profesores se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Profesores: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Profesores ya existe.<br>";
	}

    // Comprobar y crear la tabla Administradores
    
	if (!tablaExistente($con, 'Administradores')) {
		$sql_create_plataformas = "
		CREATE TABLE Administradores (
			idAdmin INT PRIMARY KEY,
			FOREIGN KEY (idAdmin) REFERENCES Usuarios(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Administradores se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Administradores: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Administradores ya existe.<br>";
	}


	// Comprobar y crear la tabla Examenes
    
	if (!tablaExistente($con, 'Examenes')) {
		$sql_create_plataformas = "
		CREATE TABLE Examenes (
			idExamen INT PRIMARY KEY
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Examenes se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Examenes: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Examenes ya existe.<br>";
	}

	// Comprobar y crear la tabla Preguntas

	if (!tablaExistente($con, 'Preguntas_test')) {
		$sql_create_plataformas = "
		CREATE TABLE Preguntas (
			idPregunta INT PRIMARY KEY,
			pregunta_test VARCHAR(255), 
			opcion_a VARCHAR(255),
			opcion_b VARCHAR(255),
			opcion_c VARCHAR(255),
			opcion_d VARCHAR(255),
			opcion_correcta VARCHAR(1)
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Preguntas se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Preguntas: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Preguntas ya existe.<br>";
	}
	

	// Comprobar y crear la tabla Preguntas_examen
    
	if (!tablaExistente($con, 'Preguntas_examen')) {
		$sql_create_plataformas = "
		CREATE TABLE Preguntas_examen (
			idExamen INT, 
			idPregunta INT, 
			PRIMARY KEY (idExamen, idPregunta), 
			FOREIGN KEY (idExamen) REFERENCES Examenes(idExamen) ON DELETE CASCADE ON UPDATE CASCADE,
			FOREIGN KEY (idPregunta) REFERENCES Preguntas_test(idPregunta) ON DELETE CASCADE ON UPDATE CASCADE
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Preguntas_examen se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Preguntas_examen: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Preguntas_examen ya existe.<br>";
	}

	// Comprobar y crear la tabla Examen_realizado
    
	if (!tablaExistente($con, 'Examen_realizado')) {
		$sql_create_plataformas = "
		CREATE TABLE Examen_realizado (
			fecha DATE, 
			idExamen INT, 
			idAlumno INT,
			idProfesor INT, 
			nota FLOAT,
			PRIMARY KEY (idExamen, idProfesor, idAlumno) AS clave_examen_realizado,
			FOREIGN KEY (idExamen) REFERENCES Examenes(idExamen) ON DELETE CASCADE ON UPDATE CASCADE,
			FOREIGN KEY (idProfesor) REFERENCES Profesores(idProfesor) ON DELETE CASCADE ON UPDATE CASCADE,
			FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno) ON DELETE CASCADE ON UPDATE CASCADE
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Examen_realizado se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Examen_realizado: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Examen_realizado ya existe.<br>";
	}

	// Comprobar y crear la tabla Respuestas_examen
    
	if (!tablaExistente($con, 'Respuestas_examen')) {
		$sql_create_plataformas = "
		CREATE TABLE Respuestas_examen (
			idExamen INT, 
			idPregunta INT, 
			PRIMARY KEY (idExamen, idPregunta), 
			FOREIGN KEY (idExamen) REFERENCES Examenes(idExamen) ON DELETE CASCADE ON UPDATE CASCADE,
			FOREIGN KEY (idPregunta) REFERENCES Preguntas_test(idPregunta) ON DELETE CASCADE ON UPDATE CASCADE
		);
		";

		if ($con->query($sql_create_plataformas) === TRUE) {
			echo "La tabla Respuestas_examen se creó correctamente.<br>";
		} else {
			echo "Error al crear la tabla Respuestas_examen: " . $con->error . "<br>";
		}
	} else {
		echo "La tabla Respuestas_examen ya existe.<br>";
	}

	// Cerrar la conexión a MySQL
	$con->close();

?>