<?php

declare(strict_types=1);

namespace Estem0;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\LoginPacket;
use pocketmine\network\mcpe\protocol\ProtocolInfo;
use pocketmine\plugin\PluginBase;

/**
 * Class MultiProtocol
 * @package multiprotocol
 * @author Estem0
 */
class ChangeProtocol extends PluginBase implements Listener {

  //Function So that only the protocols give 1.19 enter the server
    public $acceptProtocol = [];

  //Function to turn on the plugin
    public function onEnable() : void{

  //Register The Events
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

  //Protocols Gives 1.19
		$this->acceptProtocol = [534, 533, 532, 530, 526, 524, 516, 514, 512];
    }

    /**
     * DataPacketReceiveEvent event
     */
   //Function To receive the protocol 
    public function onDataPacketRecieve (DataPacketReceiveEvent $ev) : void{

   //Get the protocol 
    	$pk = $ev->getPacket();

   //Login Packet
    	if ($pk instanceof LoginPacket) {

   //Variable to change the protocol       
	/** @var array */
    		if (in_array($pk->protocol, $this->acceptProtocol)) {
    			$pk->protocol = ProtocolInfo::CURRENT_PROTOCOL;
         }
      }
   }
}
