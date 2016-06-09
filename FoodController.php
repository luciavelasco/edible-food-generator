<?php

//class Controller
//{
//
//    public function __construct(Model $model)
//    {
//        $queryResults = $model->getUsersAndDob();
//        $currentDate = today;
//        foreach ($queryResults as $queryResult) {
//            $age = $queryResult['dob'] - $currentDate;
//            $user[] = [
//                'name' => $queryResult['name'],
//                'age' => $age];
//        }
//        return new View(['user' = $user]
//    }
//}

/*
 * create Controller
 * create function on invoke that takes a model
 * get the data
 * if the data needs to be sanitised, do it
 * pass parameters to the Model
 * get back food from the model
 * if there is no food
 * echo "Sorry, I don't recognise that category"
 * return
 * otherwise
 * return a view, passing in the food
 */

class FoodController
{
    public function __construct(FoodModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return list of food
     */
    public function getFood($categories)
    {
        if (preg_match('/^[0-9]+( ?, ?[0-9]+)*$/', $categories)) {
            $food = $this->model->getFood($categories);
            if ($food === null) {
                echo "Sorry, that isn't a category!\n";
                echo "Please try again.\n";
                return;
            } else {
                foreach ($food as $entry) {
                    $id_arr[] = $entry['id'];
                    $foods_arr[] = $entry['name'];
                }
                $foodList = array_combine($id_arr, $foods_arr);
                return $foodList;
            }
        } else {
            echo "I'm sorry, please try again\n";
            return;
        }
    }
}