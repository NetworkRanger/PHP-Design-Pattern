<?php
header('Content-Type:text/html; charset=utf-8');

class Event{
    public function trigger(){
        echo 'Event<br />';
    }
}

$event = new Event();
$event->trigger();



