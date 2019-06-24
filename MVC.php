<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form action="/path_insert.php">
        <!-- renderizado del formulario -->
    </form>
</body>
</html>

<?php
class PeopleController
{
    public function showFormAction()
    {
        return $this->render('formtemplate.html.twig');
    }

    public function proccessForm(Request $request)
    {
        $peopleRepository = $this->get('people.repository');
        $name = $request->request->get('name');
        $phone = $request->request->get('phone');
        $person = new Person();

        if($peopleRepository->findByName($name) == null){
            $person->setName($name);
            $person->setPhone($phone);


            $peopleRepository->save($person);
        }

        // redirect
    }
}