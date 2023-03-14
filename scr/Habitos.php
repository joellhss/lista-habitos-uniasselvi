<?php
class Habitos
{
    private $conexao;
    private $dns = "mysql:host=127.0.0.1;port=3306;dbname=lista_habitos";
    private $user = "root";
    private $password = "!Zunw090497";

    public function __construct()
    {
        try {
            $this->conexao = new PDO($this->dns, $this->user, $this->password);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function buscarTabela($status): void
    {
        $sql = "select * from habitos where status= ?";

        $prepare = $this->conexao->prepare($sql);
        $prepare->execute([$status]);
        $resposta = $prepare->fetchAll();

        switch ($status) {
            case "A":
                foreach ($resposta as $habito) echo "
                <tr>
                    <td>" . $habito['nome'] . "</td>
                    <td><a class='btn btn-primary' href='./vencerhabito.php?id=". $habito['id'] ."'>Vencer</a></td>
                    <td><a class='btn btn-danger' href='./desistirhabito.php?id=". $habito['id'] ."'>Desistir</a></td>
                </tr>";
                break;
            case "V":
            case "D":
                foreach ($resposta as $habito) echo "
                <tr>
                    <td>" . $habito['nome'] . "</td>
                    <td><a class='btn btn-primary' href='./tentarnovamente.php?id=". $habito['id'] ."'>Tentar novamente</a></td>
                    <td><a class='btn btn-danger' href='./excluirhabito.php?id=". $habito['id'] ."'>Excluir</a></td>
                </tr>";
                break;

        }
      }

    public function atualizaHabito(string $id, string $status): int {
        $sql = "update habitos set status = ? where id = ?";

        $prepare = $this->conexao->prepare($sql);
        $prepare->bindParam(1, $status);
        $prepare->bindParam(2, $id);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function excluirHabito(string $id): int {
        $sql = "delete from habitos where id = ?";

        $prepare = $this->conexao->prepare($sql);
        $prepare->bindParam(1, $id);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function inserirHabito(string $nome): int {
        $sql = "insert into habitos (nome) value (?)";

        $prepare = $this->conexao->prepare($sql);
        $prepare->bindParam(1, $nome);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function verificaStatus($status): int {
        $sql = "select * from habitos where status = ?";
        $prepare = $this->conexao->prepare($sql);
        $prepare->bindParam(1, $status);
        $prepare->execute();

        return $prepare->rowCount();
    }


}