Maze<br>
<?php

use App\Maze\AbstractFactory\DefaultMaze\DefaultFactory;

$maze = \App\Maze\Simple\MazeGame::createMaze();
$defaultMaze = \App\Maze\AbstractFactory\MazeGame::CreateMaze(new DefaultFactory());
ddd($defaultMaze);