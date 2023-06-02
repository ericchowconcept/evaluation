<?php 

class Topic extends Db
{
    public static function add($data)
    {
        $pdo = self::getDb();
        $response = $pdo->prepare("INSERT INTO topic(title, id_user, created_at) VALUES (:title, :id_user, :created_at)");
        $response->execute(self::htmlspecialchars($data));
        return $pdo->lastInsertId();
    } 

    public static function findAll()
    {
        $request="SELECT * FROM topic t INNER JOIN user u ON t.id_user = u.id_user ORDER BY t.createD_at DESC";
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete(array $id)
    {
        $request="DELETE FROM topic WHERE id_topic = :id_topic";
        $response = self::getDb()->prepare($request);
        return $response->execute($id);
    }
}



?>