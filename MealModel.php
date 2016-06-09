<?php

/*
 * model class
 * function to get the things
 * sql statement
 * call statement
 * return categories
 */

class MealModel
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCategories()
    {
        $sql =
            'SELECT
            	category.id,
            	category.name
             FROM
             	category;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}