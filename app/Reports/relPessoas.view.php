<?php
use \koolreport\widgets\koolphp\Table;
?>
<html>
    <head>
    <title>Relatório de Pessoas</title>
    </head>
    <body>
        <?php
        Table::create([
            "dataSource"=>$this->dataStore("pessoas"),
            "columns"=>array(
                "id"=>array(
                    "label"=>"Id"
                ),
                "nome"=>array(
                    "label"=>"Nome"
                ),
                "cpfcnpj"=>array(
                    "label"=>"CPF/CNPJ"
                ),
                "tipo"=>array(
                    "label"=>"Tipo"
                )
            )
        ]);
        ?>
    </body>
</html>

