<?php 

class User extends Db
{
    public static function addUser(array $data)
    {
        $pdo = self::getDb();
        $response = $pdo->prepare("INSERT INTO user (email, password, nickname, picture_profile) VALUES (:email, :password, :nickname, :picture_profile)");
        $response->execute(self::htmlspecialchars($data));
        return $pdo->lastInsertId();
    }

    public static function findByEmail($data)
    {
       $response = self::getDb()->prepare("SELECT *FROM user WHERE email =:email");
       $response->execute(self::htmlspecialchars($data));
       return $response->fetch(PDO::FETCH_ASSOC);
    }

    
}

















?>