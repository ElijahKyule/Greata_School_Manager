<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExamSubject $examSubject
 */
?>
<div>
    <div class="content-head index">
        <div class = "pull-left">
            <h4 class="heading"><?= __('Edit Exam Subject') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' List'), ['controller'=>'Exams', 'action' => 'view', $selected_exam, '?'=>['tab'=>'examsubjects']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>
</div>

<div>
    <div class="column-responsive column-80">
        <div class="examSubjects form content">
            <?= $this->Form->create($examSubject) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('exam_id', ['options' => $exams]);
                    echo $this->Form->control('subject_id', ['options' => $subjects]);
                    echo $this->Form->control('score_of', ['label'=>'Score Out Of']);
                    echo $this->Form->control('measure_id', ['options' => $measures, 'empty'=>'Select..', 'label'=>'Score Measure']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
