<?php
    function testHour($horarioAtual, $abertura, $fechamento){ 
        $dadosEstabelecimento = [];

        if ($horarioAtual >= $abertura && $horarioAtual < $fechamento){
            $status = "aberto";
            $statusText = "Aberto";
        }
        else{
            $status = "fechado";
            $statusText = "Fechado";
        }

        array_push($dadosEstabelecimento, $status, $statusText);

        return $dadosEstabelecimento;
    }

    function getStatus($horarioAbertura, $horarioFechamento, $horarioAberturaFinalSemana, $horarioFechamentoFinalSemana){
        $dados = [];
        date_default_timezone_set('America/Sao_Paulo');
        $horarioAtual = date("H:i");
        $diaSemana = date("w");

        // O sistema não faz agendamento aos domingos
        if($diaSemana != 7){
            // se for sábado, ele considera os horários especiais de funcionamento
            if($diaSemana != 6){
                $statusEstabelecimento = testHour($horarioAtual, $horarioAbertura, $horarioFechamento);
            }
            else{
                $statusEstabelecimento = testHour($horarioAtual, $horarioAberturaFinalSemana, $horarioFechamentoFinalSemana);
            }
        }
        else{
            $statusEstabelecimento[0] = "fechado";
            $statusEstabelecimento[1] = "Fechado";
        }

        $cssStatus = "status-{$statusEstabelecimento[0]}";  

        if(strlen($horarioAbertura) == 0 && strlen($horarioFechamento) == 0){
            $horarioAberturaConv = "Sem horário cadastrado";
            $horarioFechamentoConv = "";
        }
        else{
            if($diaSemana != 6){
                // Pega apenas o primeiro dígito do horário de abertura
                $horarioAberturaConv = substr($horarioAbertura, 1, 4)." - ";
                // Pega apenas o primeiro dígito do horário de fechamento
                $horarioFechamentoConv = substr($horarioFechamento, 0, 5);
            }
            else{
                // Pega apenas o primeiro dígito do horário de abertura
                $horarioAberturaConv = substr($horarioAberturaFinalSemana, 1, 4)." - ";
                // Pega apenas o primeiro dígito do horário de fechamento
                $horarioFechamentoConv = substr($horarioFechamentoFinalSemana, 0, 5);
            }
        }

        // retorna os dados relacionados ao status de funcionamento das barbearias
        array_push($dados, $cssStatus, $statusEstabelecimento[1], $horarioAberturaConv, $horarioFechamentoConv);

        return $dados;
    }
?>