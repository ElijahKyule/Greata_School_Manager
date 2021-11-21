<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($activity->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['controller'=>'Users','action'=>'view',$auth_user, '?'=>['tab'=>'activities']], ['class' => 'btn btn-success fa fa-list']) ?>
        </div>
    </div>

<div class="view content">
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#activity_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#classrooms_activity" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-landmark" style="padding-right: 5px;"></i>Classrooms
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#students_activity" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-users" style="padding-right: 5px;"></i>Students
              </a>
            </li>
        </ul>
        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane active" id="activity_details">
              <div class="card flex-fill">
                <div class="card-body d-flex table-responsive" style="padding-top: 0;">
                    <table width="100%">
                        <tr>
                            <th><?= __('Name:') ?></th>
                            <td><?= h($activity->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Description:') ?></th>
                            <td><?= $this->Text->autoParagraph(h($activity->description)); ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Managed By:') ?></th>
                            <td><?= $activity->has('user') ? $this->Html->link($activity->user->name, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created:') ?></th>
                            <td><?= h($activity->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified:') ?></th>
                            <td><?= h($activity->modified) ?></td>
                        </tr>
                    </table>
                </div>
               </div>
            </div>

            <div class="tab-pane" id="classrooms_activity">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <?php if (!empty($activity->classroom_activities)) : ?>
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('classroom_id') ?></th>
                                        <th><?= $this->Paginator->sort('status_id') ?></th>
                                        <th><?= $this->Paginator->sort('start') ?></th>
                                        <th><?= $this->Paginator->sort('end') ?></th>
                                        <th><?= $this->Paginator->sort('achieved') ?></th>
                                        <th><?= $this->Paginator->sort('measure_id') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($activity->classroom_activities as $classroom_activity): ?>
                                    <tr>
                                        <td><?= h($classroom_activity->id) ?></td>
                                        <td><?= $this->Html->link($classroom_activity->classroom->name, ['controller'=>'Classrooms', 'action' => 'view', $classroom_activity->classroom->id, '?'=>['tab'=>'activities']]) ?></td>
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
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="students_activity">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <?php if (!empty($activity->student_activities)) : ?>
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('student_id') ?></th>
                                        <th><?= $this->Paginator->sort('status_id') ?></th>
                                        <th><?= $this->Paginator->sort('start') ?></th>
                                        <th><?= $this->Paginator->sort('end') ?></th>
                                        <th><?= $this->Paginator->sort('achieved') ?></th>
                                        <th><?= $this->Paginator->sort('measure_id') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($activity->student_activities as $student_activity): ?>
                                    <tr>
                                        <td><?= h($student_activity->id) ?></td>
                                        <td><?= $this->Html->link($student_activity->student->name, ['controller'=>'Students', 'action' => 'view', $student_activity->student->id, '?'=>['tab'=>'activities']]) ?></td>
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
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>