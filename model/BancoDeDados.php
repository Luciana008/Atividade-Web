<?php
class BancoDeDados {
    private $servidor;
    private $usuario;
    private $senha;
    private $baseDeDados;

    public function __construct($servidor, $usuario, $senha, $baseDeDados) {
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->baseDeDados = $baseDeDados;
    }

    public function conectar() {
        $conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->baseDeDados);

        if (!$conexao) {
            die("Erro ao conectar no banco de dados: " . mysqli_connect_error());
        }

        return $conexao;
    }

    function inserirCarro($carro, $conexao) {
        $nomeModelo = mysqli_real_escape_string($conexao, $carro->getNomeModelo());
        $fabricanteMontadora = mysqli_real_escape_string($conexao, $carro->getFabricanteMontadora());
        $anoFabricacao = mysqli_real_escape_string($conexao, $carro->getAnoFabricacao());
        $preco = mysqli_real_escape_string($conexao, $carro->getPreco());

        $sql = "INSERT INTO carros (modelo, fabricante, fabricacao, preco)
                VALUES ('$nomeModelo', '$fabricanteMontadora', '$anoFabricacao', '$preco')";

        if (mysqli_query($conexao, $sql)) {
            echo "Carro cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o carro: " . mysqli_error($conexao);
        }
    }

     function atualizarPreco($taxa, $conexao) {
        $sql = "UPDATE carros SET preco = preco * (1 + $taxa)";

        if (mysqli_query($conexao, $sql)) {
            echo "Preços atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar os preços: " . mysqli_error($conexao);
        }
    }

    
    public function retornarCarros($conexao) {
        $carros = array();
    
        $sql = "SELECT * FROM carros";
        $resultado = mysqli_query($conexao, $sql);
    
        if ($resultado) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                $carros[] = $row;
            }
            mysqli_free_result($resultado);
        } else {
            echo "Erro ao retornar os carros: " . mysqli_error($conexao);
        }
    
        return $carros;
    }
    
}

?>