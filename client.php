<?php

/* Pseudo code an MVC structure to
 * query users from a database, calculate their age, and display as a list
 *
 */

spl_autoload_register('autoloadClass');

function autoloadClass($className)
{
    include $className . ".php";
}

/*
 * if input is set
 * if input is "exit"
 * instantiate ReturnFoodController with instantiated Modal
 * if it isn't
 * instantiate ReturnMealController with instantiated Modal
 */

//$handle = fopen("php://stdin", "r");
//$line = trim(fgets($handle));
// exit

function foodGenerator($line = null)
{

    echo "\n";
    if ($line !== null) {
        if ($line == "exit" | $line == "e") {
            echo "Bye, good luck with the whole food thing!\n";
            exit();
        } else {
            echo "One sec, just getting you the db....\n";
            echo "These are the foods that matched the categories you entered:\n";
            //TODO: abstract into DI container from HERE
            $dbConn = new DatabaseConnection();
            $db = $dbConn->getDbConn();
            $controller = new FoodController(new FoodModel($db));
            $foodList = $controller->getFood($line);
            $view = new ListView();
            $view->render($foodList);
            //TODO: to HERE

            exit();
        }
    } else {
        echo "To exit, type 'exit'.\n";
        echo "These are the food categories you may choose from:\n";
        //TODO: abstract into DI container from HERE
        $dbConn = new DatabaseConnection();
        $db = $dbConn->getDbConn();
        $controller = new MealController(new MealModel($db));
        $categoryList = $controller->getCategories();
        $view = new ListView();
        $view->render($categoryList);
        //TODO: to HERE
        echo "(Please enter your desired categories, separated by a comma)\n";
        $handle = fopen("php://stdin", "r");
        $choice = trim(fgets($handle));
        foodGenerator($choice);
    }
}

foodGenerator();
