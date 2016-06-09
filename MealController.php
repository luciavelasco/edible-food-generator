<?php

/*
 * class ReturnMealController
 * on invoke pass through model
 * call the model's getCategories function
 * instantiate and pass it into the view
 */

class MealController
{
    public function __construct(MealModel $model)
    {
        $this->model = $model;
    }

    public function getCategories()
    {
        $categories = $this->model->getCategories();
        foreach ($categories as $entry) {
            $id_arr[] = $entry['id'];
            $category_arr[] = $entry['name'];
        }
        $categoryList = array_combine($id_arr, $category_arr);
        return $categoryList;
    }
}