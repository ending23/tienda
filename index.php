<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web - Mi Empresa</title>
    <style>
        /* Estilos básicos de la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
         }
        nav {
            display: flex;
            justify-content: center;
            background-color: #555;
            margin-bottom: 20px;
        }
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        nav a:hover {
            background-color: #333;
        }
        .section {
            display: none;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .active {
            display: block;
        }
        .producto, .faq, #productos img, #facturacion a, .btn-agregar, .respuesta {
            margin: 10px 0;
        }

        /* Estilos del modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 700px;
            overflow-y: auto;
            max-height: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <h1>Mi Empresa</h1>
</header>

<nav>
    <a href="#!" onclick="showSection('inicio')">Inicio</a>
    <a href="#!" onclick="showSection('ventas')">Ventas (Productos)</a>
    <a href="#!" onclick="showSection('facturacion')">Facturación</a>
    <a href="#!" onclick="showSection('faq')">Preguntas Frecuentes</a>
</nav>

<!-- Botón de Edición de Página -->
<button onclick="openModal()">Edición de Página</button>

<!-- Modal para Edición de Página -->
<div id="modalEdicion" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Guía de Edición de Página</h2>
        <pre>
&lt;?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "Onlineshop";

$conn = new mysqli($servername, $root, $230913, $onlineshop);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?&gt;
        </pre>

        <h3>Paso 2: Página de listado de productos (Leer)</h3>
        <pre>
&lt;?php
include 'db.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?&gt;

&lt;table border="1"&gt;
    &lt;tr&gt;
        &lt;th&gt;ID&lt;/th&gt;
        &lt;th&gt;Nombre&lt;/th&gt;
        &lt;th&gt;Descripción&lt;/th&gt;
        &lt;th&gt;Precio&lt;/th&gt;
        &lt;th&gt;Imagen&lt;/th&gt;
        &lt;th&gt;Acciones&lt;/th&gt;
    &lt;/tr&gt;
    &lt;?php while ($row = $result->fetch_assoc()) : ?&gt;
        &lt;tr&gt;
            &lt;td&gt;&lt;?php echo $row['id']; ?&gt;&lt;/td&gt;
            &lt;td&gt;&lt;?php echo $row['nombre']; ?&gt;&lt;/td&gt;
            &lt;td&gt;&lt;?php echo $row['descripcion']; ?&gt;&lt;/td&gt;
            &lt;td&gt;&lt;?php echo $row['precio']; ?&gt;&lt;/td&gt;
            &lt;td&gt;&lt;img src="&lt;?php echo $row['imagen_url']; ?&gt;" width="50"&gt;&lt;/td&gt;
            &lt;td&gt;
                &lt;a href="editar_producto.php?id=&lt;?php echo $row['id']; ?&gt;"&gt;Editar&lt;/a&gt; |
                &lt;a href="eliminar_producto.php?id=&lt;?php echo $row['id']; ?&gt;" onclick="return confirm('¿Seguro que quieres eliminar este producto?')"&gt;Eliminar&lt;/a&gt;
            &lt;/td&gt;
        &lt;/tr&gt;
    &lt;?php endwhile; ?&gt;
&lt;/table&gt;
        </pre>
        <!-- Resto de los pasos aquí en formato similar -->
    </div>
</div>

<!-- Secciones de contenido -->
<section id="inicio" class="section active">
    <h2>Bienvenido a Nuestro Sitio Web</h2>
    <p>Explora nuestras áreas y descubre cómo podemos ayudarte.</p>
</section>

<section id="ventas" class="section">
    <h2>Nuestros Productos</h2>
    <!-- Productos aquí -->
</section>

<section id="facturacion" class="section">
    <h2>Facturación</h2>
</section>

<section id="faq" class="section">
    <h2>Preguntas Frecuentes</h2>
</section>

<footer>
    <p>&copy; 2024 Mi Empresa. Todos los derechos reservados.</p>
</footer>

<script>
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(sectionId).classList.add('active');
    }

    function openModal() {
        document.getElementById("modalEdicion").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modalEdicion").style.display = "none";
    }

    window.onclick = function(event) {
        const modal = document.getElementById("modalEdicion");
        if (event.target === modal) {
            closeModal();
        }
    }
</script>

</body>
</html>
