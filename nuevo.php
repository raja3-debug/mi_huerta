<?php 
include "procesar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Añadir un cultivo</title>
    <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }

            h2 {
                padding: 20px;
                background-color: #4CAF50;
                color: #fff;
                text-align: center;
                margin-top: 20px;
                font-size: 24px;
                font-weight: bold;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            
            }

            form {
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            label {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
            }

            input[type="text"],
            input[type="number"] {
                width: 95%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            input[type="submit"] {
                background-color: #4CAF50;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }

            select {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            select option {
                padding: 5px;
            }
            p{
                text-align: center;
                font-size: 20px;
                color: red;
            }

    </style>
</head>
<body>
    
    <h2>Añadir un cultivo</h2>
    <form action="procesar.php" method="POST">
        <label for="nombre">NOMBRE:</label>
        <input type="text" name="nombre"><br>
        <label for="tipo">TIPO:</label>
     <select name="tipo"required>
        <option value="">Seleccione...</option>
        <option value="hortaliza">Hortaliza</option>
        <option value="fruta">Fruta</option>
        <option value="aromatica">Aromática</option>
        <option value="legumbre">Legumbre</option>
        <option value="tuberculo">Tubérculo</option>
     </select><br>
        <label for="dias_cosecha">DIAS COSECHA:</label>
        <input type="number" name="dias_cosecha"><br>
        <input type="submit" value="Guardar" name="confirmar">
    </form>
    
    
</body>
</html>