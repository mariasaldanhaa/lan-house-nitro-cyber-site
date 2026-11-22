<?php
    require_once("../model/clsComum.php");
    require_once("../controller/clsConexao.php");

    class clsUsuario extends clsComum {
        public function buscarPorEmail($email) {
            $conexao = new mysqli("localhost", "root", "", "bd_nitro_cyber");

            $sql = $conexao->prepare("SELECT id_cadastro, nome_cadastro, senha_cadastro, tipo FROM tb_cadastro WHERE email_cadastro = ?");
            $sql->bind_param("s", $email);
            $sql->execute();

            return $sql->get_result()->fetch_assoc();
        }
    }
?>