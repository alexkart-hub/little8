<?php

namespace App\Maze\Elements;

class Door extends MapSite
{
    private Room $room1;
    private Room $room2;
    private bool $isOpen;

    public function __construct(Room $room1, Room $room2)
    {
        $this->room1 = $room1;
        $this->room2 = $room2;
    }

    public function enter()
    {
        // TODO: Implement enter() method.
    }

    public function otherSideFrom(Room $room)
    {

    }
}