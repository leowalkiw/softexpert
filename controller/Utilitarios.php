<?php

//Arquivo de funções utilitarias, usadas em algumas telas no sistema

//função usada para formatar valores em formato moeda BR para o formato do Postgre (1.000,50 -> 1000.50)
function FormataValorBD($v) {
    return number_format(str_replace(",",".",str_replace(".","",$v)), 2, '.', '');
}

//função usada para formatar a data padrão BR para o formato do Postgre (28/05/2020 -> 2020-05-28)
function dataSaveBD($data){
    $date = DateTime::createFromFormat('d/m/Y', $data);
    return $date->format('Y-m-d');
}