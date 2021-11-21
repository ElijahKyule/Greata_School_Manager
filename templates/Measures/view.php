<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Measure $measure
 */
?>
    <div class="content-head index"> 
        <div class="pull-left">
            <h3><?= h($measure->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $measure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $measure->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $measure->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#measure_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#exam_subjects_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-book-reader" style="padding-right: 5px;"></i>Exam subjects
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#classroom_activities_related"data-toggle="tab"class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-wheelchair" style="padding-right: 5px;"></i>Classroom Activities
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#student_activities_related"data-toggle="tab"class="btn btn-link" style="font-size: 13px;">
                <i class="fab fa-accessible-icon" style="padding-right: 5px;"></i>Students Activities
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#employee_leaves_related"data-toggle="tab"class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-sign-out-alt" style="padding-right: 5px;"></i>Employee Leaves
              </a>
            </li>
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="measure_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fas fa-level-up-alt" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table width="100%">
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($measure->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Abbreviation:') ?></th>
                                        <td><?= h($measure->abbreviation) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($measure->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($measure->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="exam_subjects_related">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table  class='table table-striped table-condensed'>
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Exam') ?></th>
                                        <th><?= __('Subject') ?></th>
                                        <th><?= __('Score Out Of') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($measure->exam_subjects as $examSubjects) : ?>
                                    <tr>
                                        <td><?= h($examSubjects->id) ?></td>
                                        <td><?= $this->Html->link($examSubjects->exam->exam_code, ['controller' => 'Exams', 'action' => 'view', $examSubjects->exam->id, '?'=>['tab'=>'examsubjects']]) ?></td>
                                        <td><?= h($examSubjects->subject->name) ?></td>
                                        <td><?= h($examSubjects->score_of) ?></td>
                                        <td><?= h($examSubjects->created) ?></td>
                                        <td><?= h($examSubjects->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Exams', 'action' => 'view', $examSubjects->exam->id, '?'=>['tab'=>'examsubjects']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="classroom_activities_related">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('activity_id') ?></th>
                                        <th><?= $this->Paginator->sort('classroom_id') ?></th>
                                        <th><?= $this->Paginator->sort('status_id') ?></th>
                                        <th><?= $this->Paginator->sort('start') ?></th>
                                        <th><?= $this->Paginator->sort('end') ?></th>
                                        <th><?= $this->Paginator->sort('achieved') ?></th>
                                        <th><?= $this->Paginator->sort('measure') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($measure->classroom_activities as $classroom_activity): ?>
                                    <tr>
                                        <td><?= h($classroom_activity->id) ?></td>
                                        <td><?= $this->Html->link($classroom_activity->activity->name, ['controller'=>'Classrooms', 'action' => 'view', $classroom_activity->classroom->id, '?'=>['tab'=>'activities']]) ?></td>
                                        <td><?= h($classroom_activity->classroom->name) ?></td>
                                        <td><?= h($classroom_activity->status->name) ?></td>
                                        <td><?= h($classroom_activity->start) ?></td>
                                        <td><?= h($classroom_activity->end) ?></td>
                                        <td><?= h($classroom_activity->achieved) ?></td>
                                        <td><?= h($classroom_activity->measure->name) ?></td>
                                        <td><?= h($classroom_activity->created) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'Classrooms', 'action' => 'view', $classroom_activity->classroom->id, '?'=>['tab'=>'activities']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

             <div class="tab-pane" id="student_activities_related">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('activity_id') ?></th>
                                        <th><?= $this->Paginator->sort('student_id') ?></th>
                                        <th><?= $this->Paginator->sort('status_id') ?></th>
                                        <th><?= $this->Paginator->sort('start') ?></th>
                                        <th><?= $this->Paginator->sort('end') ?></th>
                                        <th><?= $this->Paginator->sort('achieved') ?></th>
                                        <th><?= $this->Paginator->sort('measure') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($measure->student_activities as $student_activity): ?>
                                    <tr>
                                        <td><?= h($student_activity->id) ?></td>
                                        <td><?= $this->Html->link($student_activity->activity->name, ['controller'=>'Students', 'action' => 'view', $student_activity->student->id, '?'=>['tab'=>'activities']]) ?></td>
                                        <td><?= h($student_activity->student->name) ?></td>
                                        <td><?= h($student_activity->status->name) ?></td>
                                        <td><?= h($student_activity->start) ?></td>
                                        <td><?= h($student_activity->end) ?></td>
                                        <td><?= h($student_activity->achieved) ?></td>
                                        <td><?= h($student_activity->measure->name) ?></td>
                                        <td><?= h($student_activity->created) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'Students', 'action' => 'view', $student_activity->student->id, '?'=>['tab'=>'activities']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="employee_leaves_related">
                 <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Paginator->sort('id') ?></th>
                                            <th><?= $this->Paginator->sort('leave_id') ?></th>
                                            <th><?= $this->Paginator->sort('employee_id') ?></th>
                                            <th><?= $this->Paginator->sort('description') ?></th>
                                            <th><?= $this->Paginator->sort('duration') ?></th>
                                            <th><?= $this->Paginator->sort('authorized_by') ?></th>
                                            <th><?= $this->Paginator->sort('created') ?></th>
                                            <th><?= $this->Paginator->sort('modified') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($measure->employee_leaves as $employeeLeave): ?>
                                        <tr>
                                            <td><?= $this->Number->format($employeeLeave->id) ?></td>
                                            <td><?= $employeeLeave->has('leave') ? $this->Html->link($employeeLeave->leave->name, ['controller' => 'Employees', 'action' => 'view', $employeeLeave->employee->id, '?'=>['tab'=>'leaves']]) : '' ?></td>
                                            <td><?= h($employeeLeave->employee->name) ?></td>
                                            <td><?= h($employeeLeave->description) ?></td>
                                            <td><?= $this->Number->format($employeeLeave->duration) ?></td>
                                            <td><?= h($employeeLeave->user->name) ?></td>
                                            <td><?= h($employeeLeave->created) ?></td>
                                            <td><?= h($employeeLeave->modified) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link('', ['controller' => 'Employees', 'action' => 'view', $employeeLeave->employee->id, '?'=>['tab'=>'leaves']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            </td>
                                        </tr> 
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>