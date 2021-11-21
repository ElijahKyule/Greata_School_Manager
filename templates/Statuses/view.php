<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($status->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $status->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

   <div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#status_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#students_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-users" style="padding-right: 5px;"></i>Students
              </a>
            </li> 
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#employees_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-user-tie" style="padding-right: 5px;"></i>Employees
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#fees_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-money" style="padding-right: 5px;"></i>Fees
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#exams_related" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-file-alt" style="padding-right: 5px;"></i>Exams
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#class_activities" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-wheelchair" style="padding-right: 5px;"></i>Classroom Activities
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#activity_students" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fab fa-accessible-icon" style="padding-right: 5px;"></i>Student Activities
              </a>
            </li>
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="level_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2" style="width: 100%; padding: 20px;">
                                <span><i class="fa-10x fa fa-toggle-on" style="float: left"></i></span>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table>
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($status->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($status->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($status->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="students_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related student:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Students', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Email') ?></th>
                                        <th><?= __('AdmNO') ?></th>
                                        <th><?= __('Gender') ?></th>
                                        <th><?= __('D.O.B.') ?></th>
                                        <th><?= __('Address') ?></th>
                                        <th><?= __('Adm Date') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($status->students as $students) : ?>
                                    <tr>
                                        <td><?= h($students->id) ?></td>
                                        <td><?= $this->Html->link($students->name,['controller' => 'Students', 'action' => 'view', $students->id]) ?></td>
                                        <td><?= h($students->email) ?></td>
                                        <td><?= h($students->admission_number) ?></td>
                                        <td><?= h($students->gender->name) ?></td>
                                        <td><?= h($students->date_of_birth) ?></td>
                                        <td><?= h($students->address) ?></td>
                                        <td><?= h($students->admission_date) ?></td>
                                        <td><?= h($students->created) ?></td>
                                        <td><?= h($students->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('',['controller' => 'Students', 'action' => 'view', $students->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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

             <div class="tab-pane" id="employees_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related employee:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Employees', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Salary Amount') ?></th>
                                        <th><?= __('Employment Date') ?></th>
                                        <th><?= __('Gender') ?></th>
                                        <th><?= __('Role') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($status->employees as $employee) : ?>
                                    <tr>
                                        <td><?= h($employee->id) ?></td>
                                        <td><?= $this->Html->link($employee->name, ['controller' => 'Employees', 'action' => 'view', $employee->id, '?'=>['tab'=>'profile']]) ?></td>
                                        <td><?= h($employee->salary_amount) ?></td>
                                        <td><?= h($employee->employment_date) ?></td>
                                        <td><?= h($employee->gender->name) ?></td>
                                        <td><?= h($employee->role->name) ?></td>
                                        <td><?= h($employee->created) ?></td>
                                        <td><?= h($employee->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Employees', 'action' => 'view', $employee->id, '?'=>['tab'=>'profile']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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

            <div class="tab-pane" id="fees_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related fee:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Fees', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Code') ?></th>
                                        <th><?= __('Year') ?></th>
                                        <th><?= __('Level') ?></th>
                                        <th><?= __('Term') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($status->fees as $fee) : ?>
                                    <tr>
                                        <td><?= h($fee->id) ?></td>
                                        <td><?= $this->Html->link($fee->fee_code, ['controller' => 'Fees', 'action' => 'view', $fee->id]) ?></td>
                                        <td><?= h($fee->year) ?></td>
                                        <td><?= h($fee->level->name) ?></td>
                                        <td><?= h($fee->term->name) ?></td>
                                        <td><?= h($fee->created) ?></td>
                                        <td><?= h($fee->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Fees', 'action' => 'view', $fee->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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

            <div class="tab-pane" id="exams_related">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add related exam:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Exams', 'action' => 'add'], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Code') ?></th>
                                        <th><?= __('Title') ?></th>
                                        <th><?= __('Exam Type') ?></th>
                                        <th><?= __('Level') ?></th>
                                        <th><?= __('Year') ?></th>
                                        <th><?= __('Term') ?></th>
                                        <th><?= __('Assigned To') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($status->exams as $exam) : ?>
                                    <tr>
                                        <td><?= h($exam->id) ?></td>
                                        <td><?= $this->Html->link($exam->exam_code, ['controller' => 'Exams', 'action' => 'view', $exam->id]) ?></td>
                                        <td><?= h($exam->title) ?></td>
                                        <td><?= h($exam->examtype->name) ?></td>
                                        <td><?= h($exam->level->name) ?></td>
                                        <td><?= h($exam->year) ?></td>
                                        <td><?= h($exam->term->name) ?></td>
                                        <td><?= h($exam->user->name) ?></td>
                                        <td><?= h($exam->created) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Exams', 'action' => 'view', $exam->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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

            <div class="tab-pane" id="class_activities">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('activity_id') ?></th>
                                        <th><?= $this->Paginator->sort('classroom_id') ?></th>
                                        <th><?= $this->Paginator->sort('start') ?></th>
                                        <th><?= $this->Paginator->sort('end') ?></th>
                                        <th><?= $this->Paginator->sort('achieved') ?></th>
                                        <th><?= $this->Paginator->sort('unit_of_measure') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php  
                                    foreach ($status->classroom_activities as $classroom_activity):
                                    ?>
                                    <tr>
                                        <td><?= h($classroom_activity->id) ?></td>
                                        <td><?= $this->Html->link($classroom_activity->activity->name, ['controller'=>'Classrooms','action'=>'view',$classroom_activity->classroom->id, '?'=>['tab'=>'activities']]) ?></td>
                                        <td><?= h($classroom_activity->classroom->name) ?></td>
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

            <div class="tab-pane" id="activity_students">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('activity_id') ?></th>
                                        <th><?= $this->Paginator->sort('student_id') ?></th>
                                        <th><?= $this->Paginator->sort('start') ?></th>
                                        <th><?= $this->Paginator->sort('end') ?></th>
                                        <th><?= $this->Paginator->sort('achieved') ?></th>
                                        <th><?= $this->Paginator->sort('unit_of_measure') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php  
                                    foreach ($status->student_activities as $student_activity): 
                                    ?>
                                    <tr>
                                        <td><?= h($student_activity->id) ?></td>
                                        <td><?= $this->Html->link($student_activity->activity->name, ['controller'=>'Students','action'=>'view', $student_activity->student->id, '?'=>['tab'=>'activities']]) ?></td>
                                        <td><?= h($student_activity->student->name) ?></td>
                                        <td><?= h($student_activity->start) ?></td>
                                        <td><?= h($student_activity->end) ?></td>
                                        <td><?= h($student_activity->achieved) ?></td>
                                        <td><?= h($student_activity->measure->name) ?></td>
                                        <td><?= h($student_activity->created) ?></td>
                                        <td><?= h($student_activity->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'Students', 'action' => 'view', $student_activity->id, '?'=>['tab'=>'activities']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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