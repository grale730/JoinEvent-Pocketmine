<?php
 
 /*
 *                
 *
 * JoinEvent Plugin per PocketMine-MP & forks
 *
 * @Authors: LaFuma e GabboMCPE
 * @Telegram: @GabboMCPE e @LaFuma
 * @Github: ?
 *
 *
 */
 
namespace GLF\JoinEvent;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\ShortTag;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\level\Level;
use GLF\JoinEvent\FireworkParticle;
use pocketmine\level\particle\LavaParticle;
use pocketmine\level\particle\DestroyBlockParticle;

class JEmain extends PluginBase
implements Listener{
 public function onEnable (){
	$this->getLogger() ->info(TextFormat::GREEN . "Plugin attivato");
 	$this->getServer()->getPluginManager()->registerEvents($this, $this);
 }
  
 public function onDisable() {
    $this->getLogger() ->info(TextFormat::RED . "Plugin disattivato");
 }
  
 public function onJoin (PlayerJoinEvent $event)
	{
		$player = $event->getPlayer();
        $name = $player->getName();
        $player->sendTip("ยง9Benvenuto\n".$name."
        \nยง4Votaci su linkwebsite!
        \n\n\n\n\n");
		$level = $player->level;
		$v3 = new Vector3($player->x,$player->y+1,$player->z);
		$particles[] = new LavaParticle($v3);
		$particles[] = new FireworkParticle($v3,255,0,0);
		for($yaw = 0; $yaw < 360; $yaw += M_PI) {
			$x = -sin($yaw) + $v3->x;
			$z = cos($yaw) + $v3->z;
			foreach ($particles as $particle) {
				$particle->setComponents($x, $v3->y, $z);
				$level->addParticle($particle);
			}
		}
		$level->addParticle(new DestroyBlockParticle($v3,Block::get(152,0)));
	}
}
 
