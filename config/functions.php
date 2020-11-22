<?php
    function getStatus($horarioAbertura, $horarioFechamento){
        $dados = [];
        date_default_timezone_set('America/Sao_Paulo');
        $horarioAtual = date("H:i");

        if ($horarioAtual >= $horarioAbertura && $horarioAtual < $horarioFechamento){
            $status = "aberto";
            $statusText = "Aberto";
        }
        else{
            $status = "fechado";
            $statusText = "Fechado";
        }

        $cssStatus = "status-{$status}";  

        if(strlen($horarioAbertura) == 0 && strlen($horarioFechamento) == 0){
            $horarioAberturaConv = "Sem horário cadastrado";
            $horarioFechamentoConv = "";
        }
        else{
            // Pega apenas o primeiro dígito do horário de abertura
            $horarioAberturaConv = substr($horarioAbertura, 1, 4)." - ";
            // Pega apenas o primeiro dígito do horário de fechamento
            $horarioFechamentoConv = substr($horarioFechamento, 0, 5);
        }

        // retorna os dados relacionados ao status de funcionamento das barbearias
        array_push($dados, $cssStatus, $statusText, $horarioAberturaConv, $horarioFechamentoConv);

        return $dados;
    }
?>