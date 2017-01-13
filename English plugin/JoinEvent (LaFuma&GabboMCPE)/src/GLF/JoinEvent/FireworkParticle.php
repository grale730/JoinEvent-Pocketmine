<?php

 /*
 *                
 *
 * Needed to make fireworks particles when player join
 * @Autori: LaFuma and GabboMCPE
 *
 *
 */

namespace GLF\JoinEvent;

use pocketmine\math\Vector3;
use pocketmine\level\particle\GenericParticle;

class FireworkParticle extends GenericParticle{
	public function __construct(Vector3 $pos, $r, $g, $b, $a = 255){
		parent::__construct($pos, 28, (($a & 0xff) << 24) | (($r & 0xff) << 16) | (($g & 0xff) << 8) | ($b & 0xff));
	}
}
