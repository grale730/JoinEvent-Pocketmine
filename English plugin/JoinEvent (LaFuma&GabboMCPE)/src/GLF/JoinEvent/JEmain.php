<?php
 
 /*
 *                
 *
 * JoinEvent Plugin for PocketMine-MP & forks
 *
 * @Authors: LaFuma and GabboMCPE
 * @Telegram: @GabboMCPE and @LaFuma
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
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\level\Level;
use GLF\JoinEvent\FireworkParticle;
use pocketmine\level\particle\LavaParticle;
use pocketmine\level\particle\DestroyBlockParticle;

class JEmain extends PluginBase
implements Listener{
 public function onEnable (){
 	$this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onJoin (PlayerJoinEvent $event)
	{
		$player = $event->getPlayer();
        $name = $player->getName();
        $player->sendTip("§9Welcome\n".$name."
        \n§4Vote on linkwebsite!
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
 
