<?php
namespace App\DAO;

use App\Models\Session;
use App\Core\Database;

class SessionDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################

    public function save(Session $session): ?Session
    {
        return ($session->getId() === null) ? $this->insert($session) : $this->update($session);
    }

    ###############################################################################
    
    public function selectById(string $id): ?Session
    {
        $session = new Session();
        $query = "SELECT * FROM session WHERE id_session = ?";

        $rows = $this->sql($query, [$id]);

        if($rows == null){
            return null;
        }

        $row = $rows[0];

        $session->setId($row["id_session"]);
        $session->setIdUser($row["id_user"]);
        $session->setIpAddress($row["ip_address"]);
        $session->setUserAgent($row["user_agent"]);
        $session->setCreatedAt($row["created_at"]);
        $session->setLastActivity($row["last_activity"]);
        $session->setExpiresAt($row["expires_at"]);
        $session->setExpiredAt($row["expired_at"]);

        return $session;
    }
    

    ###############################################################################

    public function insert(Session $session): ?Session
    {
        $query = "INSERT INTO session (id_session, id_user, ip_address, user_agent, created_at, last_activity, expires_at, expired_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $id = bin2hex(random_bytes(32));

        $params = [
            $id,
            $session->getIdUser(),
            $session->getIpAddress(),
            $session->getUserAgent(),
            $session->getCreatedAt(),
            $session->getLastActivity(),
            $session->getExpiresAt(),
            $session->getExpiredAt()
        ];

        $this->sql($query, $params);

        $session->setId($id);

        return $session;
    }

    ###############################################################################

    public function update(Session $session): ?Session
    {
        $query = "SELECT * FROM session WHERE id_session = ?";
        $rows = $this->sql($query, [$session->getId()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            "id_user" => $session->getIdUser(),
            "ip_address" => $session->getIpAddress(),
            "user_agent" => $session->getUserAgent(),
            "created_at" => $session->getCreatedAt(),
            "last_activity" => $session->getLastActivity(),
            "expires_at" => $session->getExpiresAt(),
            "expired_at" => $session->getExpiredAt()
        ];

        $sets = [];
        $params = [];

        foreach ($campos as $campo => $valor) {
            if ($valor != $row[$campo] && $valor != null) {
                $sets[] = "$campo = ?";
                $params[] = $valor;
            }
        }

        if (!empty($sets)) {
            $params[] = $session->getId();

            $query = "UPDATE session SET "
                . implode(', ', $sets)
                . " WHERE id_session = ?";

            $this->sql($query, $params);
        }

        return $session;
    }

    ###############################################################################
    
}