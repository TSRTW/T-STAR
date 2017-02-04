<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author Pocketmine Team
 * @link http://www.pocketmine.net
 * 
 *
*/

 namespace pocketmine\tile;
 
 use pocketmine\level\format\Chunk;
 use pocketmine\nbt\tag\CompoundTag;
 use pocketmine\nbt\tag\IntTag;
 use pocketmine\nbt\tag\StringTag;
 use pocketmine\nbt\tag\ByteTag;
 use pocketmine\nbt\tag\FloatTag;
 
 class Beacon extends Spawnable{
 
 	public function __construct(Chunk $chunk, CompoundTag $nbt){
 		parent::__construct($chunk, $nbt);
 	}
 
 	public function saveNBT(){
 		parent::saveNBT();
 	}
 
 	private function setChanged(){
 		$this->spawnToAll();
 		if($this->chunk instanceof Chunk){
 			$this->chunk->setChanged();
 			$this->level->clearChunkCache($this->chunk->getX(), $this->chunk->getZ());
 		}
 	}
 
 	public function getSpawnCompound(){
 		return new CompoundTag("", [
 			new StringTag("id", Tile::BEACON),
 			new IntTag("x", (int) $this->x),
 			new IntTag("y", (int) $this->y),
 			new IntTag("z", (int) $this->z)
 		]);
 	}
 }

