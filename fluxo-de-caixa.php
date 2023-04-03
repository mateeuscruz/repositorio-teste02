<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançamentos</title>
</head>
<body>
    <section class="principal">
      <?php include 'lancamentos.php'; ?>
      <table>
        <thead class="cabecalho">
          <tr>
            <th class="cll cll-had" id="ln-id">ID</th>
            <th class="cll cll-had" id="ln-dt-prv">DATA PREVISTA</th>
            <th class="cll cll-had" id="ln-dt-pgm">DATA DE PAGAMENTO</th>
            <th class="cll cll-had" id="ln-bnc">BANCO</th>
            <th class="cll cll-had" id="ln-doc">DOC.</th>
            <th class="cll cll-had" id="ln-typ">TIPO</th>
            <th class="cll cll-had" id="ln-vlr">VALOR</th>
            <th class="cll cll-had" id="ln-dsc">DESCRIÇÃO</th>
            <th class="cll cll-had" id="ln-ctg">CATEGORIA</th>
            <th class="cll cll-had" id="ln-act">AÇÕES</th>
          </tr>
        </thead>
        <!-- Aqui serão adicionados os dados da tabela -->
        <tbody class="content">
          <?php
          // Prepara o comando SQL com parâmetros nomeados
          $sql = "SELECT * FROM lancamentos";
          $stmt = mysqli_prepare($conn, $sql);

          // Executa o comando SQL com os parâmetros especificados
          mysqli_stmt_execute($stmt);

          // Obtém os resultados da consulta
          $result = mysqli_stmt_get_result($stmt);

          // Verifica se há resultados na consulta
          if (mysqli_num_rows($result) > 0) {
            // Percorre cada linha de resultados
            while ($row = mysqli_fetch_assoc($result)) {
              // Adiciona uma nova linha na tabela HTML com os valores da linha da consulta
              echo '<tr>';
              echo '<td>' . $row["id"] . '</td>';
              echo '<td>' . $row["data_prevista"] . '</td>';
              echo '<td>' . $row["data_pagamento"] . '</td>';
              echo '<td>' . $row["banco"] . '</td>';
              echo '<td>' . $row["doc"] . '</td>';
              echo '<td>' . $row["tipo"] . '</td>';
              echo '<td>' . $row["valor"] . '</td>';
              echo '<td>' . $row["descricao"] . '</td>';
              echo '<td>' . $row["categoria"] . '</td>';
              echo '<td>';
              echo '<input type="button" value="E" class="btn btn-edit">';
              if (isset($row["id"])) {
                echo '<input type="button" value="D" class="btn btn-delete" data-id="' . $row["id"] . '">';
              } else {
                //echo '<input type="button" value="D" class="btn btn-delete">';
              }
              echo '</td>';
              echo '</tr>';
            }
          }

          // Libera a memória usada pelo resultado e finaliza a conexão com o banco de dados
          mysqli_free_result($result);
          mysqli_close($conn);
          ?>
        </tbody>
      </table>
      
      <!--Adicionar um evento de clique ao botão de exclusão para enviar o formulário e excluir o lançamento correspondente no servidor-->
      <script src="lancamentos.js"></script>
    </section>
</body>
</html>