<?php

    class Event {

        public $eventId;
        public $eventClass;
        public $eventDescription;
        public $eventPresenter;

        function setEventId($inId){
            $this->eventId = $inId;
        }
        function getEventId(){
            return $this->eventId;
        }

        function setEventClass($inClass){
            $this->eventClass = $inClass;
        }
        function getEventClass(){
            return $this->eventClass;
        }

        function setEventDescription($inDescription){
            $this->eventDescription = $inDescription;
        }
        function getEventDescription(){
            return $this->eventDescription;
        }

        function setEventPresenter($inPresenter){
            $this->eventPresenter = $inPresenter;
        }
        function getEventPresenter(){
            return $this->eventPresenter;
        }

        //processing methods

    }//end Event class 



?>