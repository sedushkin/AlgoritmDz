<?php
$incomingString =')(["abb bba]"fff)dd)';
$pattern = '/\(|\)|\[|\]|\"/m';
preg_match_all($pattern,$incomingString,$matches);

$obj = new ArrayObject($matches);
$iter = $obj->getIterator();

$stack = new SplStack();

while ($iter->valid()) {
    
  $stack->push($iter->current());


    $iter->next();
}

$stack->rewind();

while ($stack->valid()){
  
    if ($stack->current()===')'){
        echo('Ne sobludeno uslovie');  
    } else {
        while ($stack->valid()){
            if (current($stack) === '(') {
           
                if (next($stack) === ')'){
                    echo("try delete");
                    $key=$stack->key();
                    $stack->offsetUnset($key);
                    $stack->shift();
                }
                else {
                    echo("try next");
                    $stack->next();
                }
            
            }        
        }
        
    }
}

          
    