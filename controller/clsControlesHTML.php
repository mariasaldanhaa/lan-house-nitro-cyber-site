<?php
    class clsControlesHTML {
        public function geraGridCadastro($tabela) {
            $htmlTabela = '
                <table class="grid-cadastros">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Cidade</th>
                            <th>Endereço</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
            ';

            while ($linha = mysqli_fetch_assoc($tabela)) {
                $id = (int) $linha['id_cadastro'];
                $foto = htmlspecialchars($linha['foto_cadastro'] ?? '');
                $nome = htmlspecialchars($linha['nome_cadastro'] ?? '');
                $cidade = htmlspecialchars($linha['cidade_cadastro'] ?? '');
                $endereco = htmlspecialchars($linha['endereco_cadastro'] ?? '');
                $email = htmlspecialchars($linha['email_cadastro'] ?? '');
                $telefone = htmlspecialchars($linha['telefone_cadastro'] ?? '');

                $htmlTabela .= '
                    <tr>
                        <td>
                            <img src="img/' . $foto . '" alt="Foto de ' . $nome . '">
                        </td>
                        <td>' . $nome . '</td>
                        <td>' . $cidade . '</td>
                        <td>' . $endereco . '</td>
                        <td>' . $email . '</td>
                        <td>' . $telefone . '</td>
                        <td class=acoes> 
                            <!-- BOTAO PARA EDITAR PERFIL -->
                            <a href="editarPerfil.php" class="btn-acao btn-editar">
                                <i class="bi bi-pencil-square"></i>
                                Editar perfil
                            </a>
                            
                            <!-- BOTAO PARA EXCLUIR CONTA -->
                            <a 
                                href="../model/excluirPerfil.php?id=' . $id . '"
                                class="btn-acao btn-excluir"
                                onclick="return confirm(\'Tem certeza que deseja excluir sua conta?\');"
                            >
                                <i class="bi bi-trash">Excluir perfil</i>
                            </a>
                        </td>
                    </tr>
                ';
            }

            $htmlTabela .= '
                    </tbody>
                </table>
            ';

            return $htmlTabela;
        }
    }
?>
