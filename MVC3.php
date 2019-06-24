<?php
class PeopleFactory
{
    public function create(array $data)
    {
        $name = $data['name'];
        $phone = $data['phone'];
        $person = new Person();

        
        $person->setName($name);
        $person->setPhone($phone);

        return $person;
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
        $peopleFactory = $this->get('people.factory');
        
        $person = $peopleFactory->create($request->request->all());
        $peopleService->save($person);

        // redirect
    }
}