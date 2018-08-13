<?php

/*
 *
 *  ____                           _   _  ___
 * |  _ \ _ __ ___  ___  ___ _ __ | |_| |/ (_)_ __ ___
 * | |_) | '__/ _ \/ __|/ _ \ '_ \| __| ' /| | '_ ` _ \
 * |  __/| | |  __/\__ \  __/ | | | |_| . \| | | | | | |
 * |_|   |_|  \___||___/\___|_| |_|\__|_|\_\_|_| |_| |_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author  PresentKim (debe3721@gmail.com)
 * @link    https://github.com/PresentKim
 * @license https://www.gnu.org/licenses/agpl-3.0.html AGPL-3.0.0
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 */

declare(strict_types=1);

namespace kim\present\lullaby\task;

use kim\present\lullaby\Lullaby;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\Player;
use pocketmine\scheduler\Task;

class HealTask extends Task{
	/** @var Lullaby */
	private $owner;

	/** @var Player */
	public $player;

	/**
	 * HealTask constructor.
	 *
	 * @param Player  $player
	 * @param Lullaby $owner
	 */
	public function __construct(Player $player, Lullaby $owner){
		$this->player = $player;
		$this->owner = $owner;
	}

	/**
	 * @param int $currentTick
	 */
	public function onRun(int $currentTick){
		$this->player->heal(new EntityRegainHealthEvent($this->player, $this->owner->getHealAmount(), EntityRegainHealthEvent::CAUSE_MAGIC));
	}
}