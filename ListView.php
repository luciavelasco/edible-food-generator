<?php

/* 
 * view class
 * invoke method that takes list item
 * for each parameter
 * return parameter with bullet point and line break
 * return new client?
 */

class ListView {
    
    public function render($list)
    {
        echo "\n\n";
        foreach($list as $index => $item) {
            echo "• " . $index . ": " . $item . "\n";
        }
        echo "\n\n";

        return;
    }
}

//TODO: val = index. val
//TODO: fix query! 