<?php
interface QuestionRendererInterface
{
    public function render(Question $question);
}

class QuestionRenderer implements QuestionRendererInterface
{
    public function render(Question $question)
    {
        echo "<p>".$question->getDeclaration()."</p>"
        // render answers
    }
}

abstract class AbstractQuestionRendererDecorator implements QuestionRendererInterface
{
    protected $decoratedRenderer;

    public function __constructor($decoratedRenderer)
    {
        $this->decoratedRenderer = $decoratedRenderer;
    }

    public function render(Question $question)
    {
        $this->decoratedRenderer->render($question);
    }
}

class QuestionWithReasonRenderer extends AbstractQuestionRendererDecorator
{
    public function render(Question $question)
    {
        parent::render($question);
        echo $question->getReason()->getDeclaration();
    }
}