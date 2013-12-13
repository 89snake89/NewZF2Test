<?php
namespace Login\Event;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;

class EventLogged implements EventManagerAwareInterface
{
	protected $events;

	public function setEventManager(EventManagerInterface $events)
	{
		$events->setIdentifiers(array(
				__CLASS__,
				get_called_class(),
		));
		$this->events = $events;
		return $this;
	}

	public function getEventManager()
	{
		if (null === $this->events) {
			$this->setEventManager(new EventManager());
		}
		return $this->events;
	}
	public function userLogged(){
		$params = compact('pepe');
		$this->getEventManager()->trigger(__FUNCTION__, $this, $params);
	}
}

