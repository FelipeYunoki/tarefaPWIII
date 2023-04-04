<?php
    namespace App\Http\Controllers;

    class ArithmeticControllers extends Controller {
        public function hello($nome) {
            return 'Olá, ' . ucfirst($nome) . '! Bem-vindo ao meu site.';
        }

        public function operacao($numero1, $numero2, $operacao = null){
            if (!is_numeric($numero1) || !is_numeric($numero2)) {
                return 'Por favor, digite números inteiros.';
            }
            
            if ($operacao && !in_array($operacao, ['soma', 'subtracao', 'multiplicacao', 'divisao'])) {
                return 'Por favor, escolha uma operação válida.';
            }
        
            if ($operacao) {
                switch ($operacao) {
                    case 'soma':
                        $resultado = $numero1 + $numero2;
                        break;
                    case 'subtracao':
                        $resultado = $numero1 - $numero2;
                        break;
                    case 'multiplicacao':
                        $resultado = $numero1 * $numero2;
                        break;
                    case 'divisao':
                        if ($numero2 == 0) {
                            return 'Não é possível dividir por zero.';
                        }
                        $resultado = $numero1 / $numero2;
                        break;
                }
                return "O resultado da operação $operacao entre $numero1 e $numero2 é: $resultado";
            } else {
                $soma = $numero1 + $numero2;
                $subtracao = $numero1 - $numero2;
                $multiplicacao = $numero1 * $numero2;
                $divisao = ($numero2 == 0) ? 'Não é possível dividir por zero.' : $numero1 / $numero2;
                return "Resultados:<br> Soma = $soma<br> Subtração = $subtracao <br>Multiplicação = $multiplicacao <br>Divisão = $divisao";
            }
        }

        public function idade($ano, $mes = null, $dia = null) {
            if (!checkdate($mes ?? 1, $dia ?? 1, $ano)) {
                return "Data inválida";
            }
        
            $dataNascimento = \Carbon\Carbon::create($ano, $mes ?? 1, $dia ?? 1);
            $idade = $dataNascimento->diffInYears();
        
            if ($dataNascimento->isFuture()) {
                return "Data de nascimento no futuro";
            }
        
            return "Idade: $idade anos";
        }
    }
