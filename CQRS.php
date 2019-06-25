<?php
interface Event
{

}

class Monedero
{
    protected id;
    protected $saldo = 0;
    protected $events = [];

    public function compraOpocoins($opocoins)
    {
        $this->recordAndApplyEvent(new OpocoinsComprados($opocoins, $this));
    }

    public function gastaOpocoins($opocoins)
    {
        if($this->saldo >= $opocoins){
            $this->recordAndApplyEvent(new OpocoinsGastados($opocoins, $this));
        }
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function applyEvent(Event $event)
    {
        if($event instanceof OpocoinsComprados){
            $this->saldo += $event->getOpocoins();
        }else if($event instanceof OpocoinsGastados){
            $this->saldo -= $event->getOpocoins();
        }
    }

    private function recordAndApplyEvent(Event $event)
    {
        $this->events[] = $event;
        $this->applyEvent($event);
    }
}

class ComprarOpocoins
{
    protected $eventBus;

    protected $monedero;

    protected $opocoins;

    public function execute()
    {
        $this->monedero->compraOpocoins($this->opocoins);
        $this->eventBus->publishEvents($modero->getEvents());
    }
}

class OpocoinsCompratosToDBHandler
{
    public function handle(OpocoinsComprados $event)
    {
        $sql = "UPDATE monedero 
             SET saldo = saldo + ".$event->getOpocoins()." 
             WHERE id = ".$event->getMonedero()->getid();

        $this->executeSql($sql);
    }
}