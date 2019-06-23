<?php

class ExamCreationFilterChain
{
    private $filters;

    public function __construct()
    {
        $this->filters = array();

    public function execute(array $data)
    {
        $this->assertDataPresent($data);
        foreach ($this->filters as $filter) {
            if($filter->canHandle($data['type'])){
                $exam = $filter->handle($data);

                return $exam;
            }
        }
    }
}

interface ExamCreationFilterInterface
{
    public function canHandle($type);

    public function handle(array $data);
}

class DemoFilter implements ExamCreationFilterInterface
{
    public function canHandle($type)
    {
        return $type === Exam::TYPE_DEMO;
    }

    public function handle(array $data)
    {
        // logica crear examen

        return $exam;
    }
}