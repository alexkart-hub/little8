<?php

namespace App\Maze\Elements;

class Room extends MapSite
{
    private int $roomNo;
    private array $side= [
        self::SIDE_EAST => '',
        self::SIDE_WEST => '',
        self::SIDE_NORTH => '',
        self::SIDE_SOUTH => '',
    ];

    public function __construct(int $roomNo)
    {
        $this->roomNo = $roomNo;
    }

    public function enter()
    {
        // TODO: Implement Enter() method.
    }

    public function setSide($side, MapSite $value): bool
    {
        if (!isset($this->side[$side])) {
            return false;
        }
        $this->side[$side] = $value;
        return true;
    }

    public function getSide($side): bool|Wall
    {
        return $this->side[$side] ?? false;
    }

    public function getRoomNo(): int
    {
        return $this->roomNo;
    }
}