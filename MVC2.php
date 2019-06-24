<?php
class PeopleService
{
    protected $peopleRepository;

    public function __construct(PeeopleRepository $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }

    public function save(Person $person)
    {
        if($this->peopleRepository->findByName($person->getName()) == null){
            $this->peopleRepository->save($person);
        }
    }
}

class PeopleController
{
    public function showFormAction()
    {
        return $this->render('formtemplate.html.twig');
    }

    public function proccessForm(Request $request)
    {
        $peopleService = $this->get('people.service');
        $name = $request->request->get('name');
        $phone = $request->request->get('phone');
        $person = new Person();

        
        $person->setName($name);
        $person->setPhone($phone);
        $peopleService->save($person);

        // redirect
    }
}