<?php
namespace App\DAO;

use App\Models\Usuario;
use App\Core\Database;

class UsuarioDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function selectById(int $id): ?Usuario {
        $query = "SELECT * FROM usuario WHERE id_user = ?";

        $user = new Usuario();

        $rows = $this->sql($query, [$id]);

        if($rows == null){
            return null;
        }

        $row = $rows[0];

        $user->setId($row["id_user"]);
        $user->setUsuario($row["usuario"]);
        $user->setSenha($row["senha"]);

        return $user;
    }

    ###############################################################################
    
    public function selectByUsuario(string $usuario): ?Usuario {
        $query = "SELECT * FROM usuario WHERE usuario = ?";

        $user = new Usuario();

        $rows = $this->sql($query, [$usuario]);

        if($rows == null){
            return null;
        }

        $row = $rows[0];

        $user->setId($row["id_user"]);
        $user->setUsuario($row["usuario"]);
        $user->setSenha($row["senha"]);

        return $user;
    }

    ###############################################################################
    
    public function save(Usuario $user): ?Usuario
    {
        $query = "INSERT INTO usuario (usuario, senha) VALUES (?, ?)";

        $params = [
            $user->getUsuario(),
            $user->getSenha()
        ];

        $this->sql($query, $params);

        $user->setId($this->lastInsertId());

        return $user;
    }
    
}