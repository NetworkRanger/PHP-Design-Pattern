<?php
header('Content-Type:text/html; charset=utf-8');

class Event{
    public function trigger(){
        echo 'Event<br />';
        echo '添加逻辑1<br />';
        echo '添加逻辑2<br />';
    }
}

$event = new Event();
$event->trigger();



