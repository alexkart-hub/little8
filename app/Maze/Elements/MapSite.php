<?php

namespace App\Maze\Elements;

abstract class MapSite
{
    const SIDE_NORTH = 'north';
    const SIDE_SOUTH = 'south';
    const SIDE_EAST = 'east';
    const SIDE_WEST = 'west';


    abstract public function enter();
}