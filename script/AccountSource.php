<?php


class AccountSource
{

    private $dbConnection;
    private $userId;
    private $userData;

    public function __construct(pdo $pdo, int $userId = 0)
    {
        $this->dbConnection = $pdo;

        $stmt = $pdo->prepare("SELECT `email`,`firstname`,`lastname`,`registered`,`type` FROM `Account` WHERE `account_id` = :accountId");
        $stmt->bindParam(':accountId', $userId);
        $stmt->execute();

        $this->userData = $stmt->fetch();
    }

    public function userIsAdmin(): bool
    {
        if($this->userData['type'] == 'ROOT' || $this->userData['type'] == 'ADMIN') {
            return true;
        }
        return false;
    }

    public function hasSupportBackend(): bool
    {
        if($this->userData['type'] == 'ROOT' || $this->userData['type'] == 'ADMIN' || $this->userData['type'] == 'SUPPORTER') {
            return true;
        }
        return false;
    }

}