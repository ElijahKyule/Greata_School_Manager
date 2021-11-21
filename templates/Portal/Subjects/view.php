<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subject $subject
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($subject->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $subject->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
    <div class="column-responsive column-80">
        <div class="subjects view content">
           <div class="card flex-fill">
            <div class="card-header">
                <h4><?= __('Details') ?></h4>
            </div>
            <div class="card-body d-flex table-responsive">
            <table width="100%">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($subject->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($subject->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $subject->has('user') ? $this->Html->link($subject->user->name, ['controller' => 'Users', 'action' => 'view', $subject->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($subject->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($subject->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($subject->modified) ?></td>
                </tr>
            </table>
          <div class="card flex-fill" style="margin-top: 10px;">
            <div class="card-header">
              <h4><?= __('Related Exam Subjects') ?></h4>
            </div>
            <div class="card-body d-flex" style="padding-top: 0;">
            <div class="related">
                <?php if (!empty($subject->exam_subjects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th><?= __('Subject Id') ?></th>
                            <th><?= __('Score Of') ?></th>
                            <th><?= __('Measure Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($subject->exam_subjects as $examSubjects) : ?>
                        <tr>
                            <td><?= h($examSubjects->id) ?></td>
                            <td><?= h($examSubjects->exam_id) ?></td>
                            <td><?= h($examSubjects->subject_id) ?></td>
                            <td><?= h($examSubjects->score_of) ?></td>
                            <td><?= h($examSubjects->measure_id) ?></td>
                            <td><?= h($examSubjects->created) ?></td>
                            <td><?= h($examSubjects->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('', ['controller' => 'ExamSubjects', 'action' => 'view', $examSubjects->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                <?= $this->Html->link('', ['controller' => 'ExamSubjects', 'action' => 'edit', $examSubjects->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                <?= $this->Form->postLink('', ['controller' => 'ExamSubjects', 'action' => 'delete', $examSubjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examSubjects->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            </div>
          </div>  
          <div class="card flex-fill" style="margin-top: 10px;">
            <div class="card-header">
              <h4><?= __('Related Student Subjects') ?></h4>
            </div>
            <div class="card-body d-flex" style="padding-top: 0;">
            <div class="related">
                <?php if (!empty($subject->student_subjects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Subject Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($subject->student_subjects as $studentSubjects) : ?>
                        <tr>
                            <td><?= h($studentSubjects->id) ?></td>
                            <td><?= h($studentSubjects->student_id) ?></td>
                            <td><?= h($studentSubjects->subject_id) ?></td>
                            <td><?= h($studentSubjects->created) ?></td>
                            <td><?= h($studentSubjects->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('', ['controller' => 'StudentSubjects', 'action' => 'view', $studentSubjects->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                <?= $this->Html->link('', ['controller' => 'StudentSubjects', 'action' => 'edit', $studentSubjects->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                <?= $this->Form->postLink('', ['controller' => 'StudentSubjects', 'action' => 'delete', $studentSubjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSubjects->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            </div>
          </div>  
        </div>
    </div>