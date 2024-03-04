<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Viagem para Aparecida do Norte</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

    <?php
    require 'consultarAssento.php';
    $banco = ConsultarAsssento();
    ?>

    <!-- PARTE DO CABEÇARIO DO PROJETO
A APRESENNTAÇÃO DO LUGAR, PONTOS TURISTICOS -->



    <!-- <section id="pagina-home">
            <header>
                <img src="" alt="logo Brotas" class="logo">
                <nav class="menu-principal">
                    <ul>
                        <li><a href="#" class="link-ativo">Home </a></li>
                        <li><a href="#">Passeio </a></li>
                        <li><a href="#">Preços </a></li>
                        <li><a href="mailto: kemylinkayanne873@gmail.com ">Contato </a></li>
                    </ul>
                </nav>
            </header>

            <main>
                <h1> AVENTURA E TRANQULIDADE</h1>
                <div>
                    <a href="#" class="btn">ASSISTA O VÍDEO</a>
                    <a href="#" class="btn">LEIA MAIS</a>
                </div>
            </main>
        

        <div class="turismo">
            <section>
                <div class="pricipais">
                    <figure>
                        <a href="#"><img src="./pontos_turisticos/igreja velha.jpg" class="itens-principais" alt=""></a>
                    </figure>
                </div>
            </section>

            <section>
                <div class="pricipais">
                    <figure>
                        <a href="#"><img src="./pontos_turisticos/ponte.jpg" class="itens-principais" alt=""></a>
                    </figure>
                </div>
            </section>

            <section>
                <div class="pricipais">
                    <figure>
                        <a href="#"><img src="./pontos_turisticos/teleferico.jpg" class="itens-principais" alt=""></a>
                    </figure>
                </div>
            </section>


        </div> -->




    <!-- SEGUNDA PARTE DO PROJETO
        A PARTE DO ONIBUS, RESERVA DE LUGARES E A COMPRA DAS PASSAGENS -->


    <img src="./ftos/frente-horizontal.svg" alt="Frente do Ônibus" class="bus-image">
    <div id="container" class="seat">
        <?php for ($i = 1; $i <= 50; $i++) : ?>
            <?php
            // Simular assentos comprados
            //$assento_comprado = false;
            // if ($i == $assento_comprado) {
            //     $assento_comprado = true;
            // }
            $assento_comprado = false;
            foreach ($banco as $assento) {
                if($i == $assento['banco']){
                    $assento_comprado = true;
                }
            }
            
            ?>
            <div class="seat" id="seat-<?php echo $i; ?>" data-status="<?php echo $assento_comprado ? 'comprado' : 'livre'; ?>" onclick="selectSeat(this)" <?php echo $assento_comprado ? "style='background-color:orange'" : ""?> data-value="<?=$i?>">
                <?php echo $i; ?>
            </div>
        <?php endfor; ?>

    </div>
    <img src="./ftos/traseira-horizontal.svg" alt="Traseira do Ônibus" class="bus-image">

    <form action="preencherdados.php" method="post">
        <div class="modal fade" id="modal-mensagem">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span></span></button>
                        <h4 class="modal-title">Reserve seu assento</h4>
                    </div>


                    <div class="modal-body">
                        <form id="reservation-form" action="./preencherdados.php" method="post">
                            <label for="text">Nome Completo:</label>
                            <input type="text" id="nome" name="nome" placeholder="Nome Completo" required>

                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" name="cpf" placeholder="Somente Numeros" maxlength="14" oninput="formatarCPF(this)">


                            <label for="telefone">Telefone:</label>
                            <input type="text" id="telefone" name="telefone" placeholder="Somente Números" maxlength="15" oninput="formatarTelefone(this)">


                            <div class="seat" id="seat-<?php echo $i; ?>" data-status="<?php echo $assento_comprado ? 'comprado' : 'livre'; ?>" onclick="openModal(<?php echo $i; ?>)">
                                Assento <?php echo $i; ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-reservar" type="submit" class="btn btn-default" data-dismiss="modal">Reservar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./javaScript/modal.js"></script>

    <script>
        function formatarTelefone(input) {
            // Remove caracteres não numéricos
            var telefone = input.value.replace(/\D/g, '');

            // Adiciona os parênteses e traço
            telefone = telefone.replace(/^(\d{2})(\d)/g, '($1) $2');
            telefone = telefone.replace(/(\d{5})(\d)/, '$1-$2');

            // Atualiza o valor do input
            input.value = telefone;
        }

        function formatarCPF(input) {
            // Remove caracteres não numéricos
            var cpf = input.value.replace(/\D/g, '');

            // Adiciona os pontos e traço
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

            // Atualiza o valor do input
            input.value = cpf;
        }


        $('#btn-reservar').click(function() {

            $.ajax({
                url: 'preencherdados.php',
                type: 'POST',
                data: {
                    nome: $("#nome").val(),
                    cpf: $("#cpf").val(),
                    telefone: $("#telefone").val()

                },
                success: function(response) {
                    
                },
                error: function(xhr, status, error) {
                    alert('Erro ao finalizar compra: ' + error);
                }
            });

        });
    </script>

</html>
</body>