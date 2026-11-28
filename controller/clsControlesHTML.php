
<?php
    class clsControlesHTML {

        public function geraGridCadastro($tabela) {

            $htmlTabela = '<table class="w3-table-all">
                            <thead>
                                <tr class="w3-red">
                                    <th>FOTO</tSh>
                                    <th>NOME</th>
                                    <th>CIDADE</th>
                                    <th>ENDEREÇO</th>
                                    <th>EMAIL</th>
                                    <th>TELEFONE</th>
                                    
                                </tr>
                            </thead>';

            while ($linha = mysqli_fetch_row($tabela)) {

                $htmlTabela .= '<tr>
                                    <td>
                                        <img src="img/'.$linha[1].'" width="80" height="80">
                                    </td>
                                    <td>'.$linha[2].'</td>
                                    <td>'.$linha[3].'</td>
                                    <td>'.$linha[4].'</td>
                                    <td>'.$linha[5].'</td>
                                    <td>'.$linha[6].'</td>
                                </tr>';
            }

            $htmlTabela .= '</table>';

            return $htmlTabela;
        }

    }

?>
