<!DOCTYPE html>
<html>
<head><title>Carros Cadastrados</title></head>

<body>
    <h1>Carros Cadastrados</h1>

    <?php
    require_once '../model/BancoDeDados.php';
    require_once '../model/Carro.php';
    require_once '../controller/Controller.php';

    $bancoDeDados = new BancoDeDados('localhost', 'root', '', 'dados');
    $bancoDeDados->conectar();

    $carroController = new CarroController($bancoDeDados);

    $carrosCadastrados = $carroController->visualizarCarros();

    if (empty($carrosCadastrados)) {
        echo "Cadastros não encontrados";
    } else {
        echo "<table>
                <tr>
                    <th>Modelo: </th>
                    <th>Fabricante: </th>
                    <th>Ano de Fabricação: </th>
                    <th>Preço: </th>
                </tr>";

        $carrosCount = count($carrosCadastrados);
        for ($i = 0; $i < $carrosCount; $i++) {
            $carro = $carrosCadastrados[$i];
            echo "<tr>
                 <td>" . $carro->getNomeModelo() . "</td>
                 <td>" . $carro->getFabricanteMontadora() . "</td>
                 <td>" . $carro->getAnoFabricacao() . "</td>
                <td>" . $carro->getPreco() . "</td>
                        </tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>