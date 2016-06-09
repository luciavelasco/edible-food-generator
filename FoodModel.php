<?php


//class Model
//{
//
//    public function getUsersAndDob()
//    {
//        $sql = 'SELECT age, dob
//FROM user
//LIMIT 12;';
//        $stmt = $this->db->prepare($sql);
//        $stmt->execute();
//        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
//        return $result;
//    }
//}

/*
 * Create model
 * create a function that takes categories and returns food
 */

class FoodModel
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getFood($categories)
    {
        $sql =
            'SELECT
            	food.id,
            	food.name
             FROM
             	food
             	JOIN food_category ON food.id = food_category.food_id
             WHERE
             	category_id IN (' . $categories . ');';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}