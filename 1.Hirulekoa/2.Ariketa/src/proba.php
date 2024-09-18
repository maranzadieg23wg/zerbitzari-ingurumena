<?php
// Crear una matriz de puntos tridimensionales
$puntos3D = [
    [10, 20, 30],
    [40, 50, 60],
    [70, 80, 90],
    [100, 110, 120]
];

// Crear una imagen
$ancho = 300;
$alto = 300;
$profundo = 300;
$imagen = imagecreatetruecolor($ancho, $alto);

// Colores
$fondo = imagecolorallocate($imagen, 255, 255, 255); // Blanco
$puntoColor = imagecolorallocate($imagen, 0, 0, 0); // Negro

// Llenar el fondo
imagefill($imagen, 0, 0, $fondo);

// Dibujar los puntos
foreach ($puntos3D as $punto) {
    // Proyección simple: ignoramos la coordenada Z y escalamos X e Y
    $x = $punto[0];
    $y = $alto - $punto[1]; // Invertir Y para que el origen esté en la parte superior

    // Dibujar el punto
    imagesetpixel($imagen, $x, $y, $puntoColor);
}

// Guardar la imagen
header('Content-Type: image/png');
imagepng($imagen);
imagedestroy($imagen);
//phpinfo();
?>
