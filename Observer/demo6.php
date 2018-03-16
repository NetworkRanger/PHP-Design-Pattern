<?php
header('Content-Type:text/html; charset=utf-8');

interface Observer{
    public function update($event_info = null);
}

abstract class EventGenerator{
    private $observers = [];

    public function addObserver(Observer $observer){
        $this->observers[] = $observer;
    }

    public function notify(){
        foreach($this->observers as $observer){
            $observer->update();
        }
    }

}

class Observer1 implements Observer{
    public function update($event_info = null){
        echo '添加逻辑1<br />';
    }
}

class Observer2 implements Observer{
    public function update($event_info = null){
        echo '添加逻辑2<br />';
    }
}

class Event extends EventGenerator{
    public function trigger(){
        echo 'Event<br />';
        $this->notify();
    }
}

$event = new Event();
$event->addObserver(new Observer1());
$event->addObserver(new Observer2());
$event->trigger();



