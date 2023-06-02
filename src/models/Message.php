<?php 

class Message extends Db
{
    public static function add($data)
    {
        $pdo = self::getDb();
        $response = $pdo->prepare("INSERT INTO message(content, id_user, id_topic, created_at) 
        VALUES (:content, :id_user, :id_topic, :created_at)");
        $response->execute(self::htmlspecialchars($data));
        return $pdo->lastInsertId();
    } 

    public static function findAll()
    {
        $request="SELECT * FROM message m INNER JOIN user u ON m.id_user = u.id_user ORDER BY m.createD_at DESC";
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

}



?>