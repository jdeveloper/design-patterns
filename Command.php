<?php

interface CommandInterface
{
    public function execute();
}

class ImportMailchimpContactsCommand implements CommandInterface
{
    protected $api;

    protected $contacts;

    public function __construct(MailchipApi $api, $contacts)
    {
        $this->api = $api;
        $this->contacts = $contacts;
    }

    public function execute()
    {
        $this->api->importContats($this->contacts);
    }
}

$comands = [ ... ];

foreach($commands as $comand){
    $command->execute();
}