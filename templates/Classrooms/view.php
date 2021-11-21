<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classroom $classroom
 */
?>
<div>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($classroom->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $classroom->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>

<?php
$tab_classroom_details_status = 'active';
$tab_classlist_status = '';
$tab_class_exams_status = '';
$tab_class_marks_status = '';
$tab_promoteclass_status = '';
$tab_messageclass_status = '';
$tab_freeclass_status = '';
$tab_class_activities_status = '';

if ($tab == 'classlist' ) 
{
    $tab_classroom_details_status = '';
    $tab_classlist_status = 'active';
    $tab_class_exams_status = '';
    $tab_class_marks_status = '';
    $tab_promoteclass_status = '';
    $tab_messageclass_status = '';
    $tab_freeclass_status = '';
    $tab_class_activities_status = '';
}
elseif ($tab == 'freeclass' ) 
{
    $tab_classroom_details_status = '';
    $tab_classlist_status = '';
    $tab_class_exams_status = '';
    $tab_class_marks_status = '';
    $tab_promoteclass_status = '';
    $tab_messageclass_status = '';
    $tab_freeclass_status = 'active';
    $tab_class_activities_status = '';
}
elseif ($tab == 'importmarks' ) 
{
    $tab_classroom_details_status = '';
    $tab_classlist_status = '';
    $tab_class_exams_status = '';
    $tab_class_marks_status = 'active';
    $tab_promoteclass_status = '';
    $tab_messageclass_status = '';
    $tab_freeclass_status = '';
    $tab_class_activities_status = '';
}
elseif ($tab == 'promoteclass' ) 
{
    $tab_classroom_details_status = '';
    $tab_classlist_status = '';
    $tab_class_exams_status = '';
    $tab_class_marks_status = '';
    $tab_promoteclass_status = 'active';
    $tab_messageclass_status = '';
    $tab_freeclass_status = '';
    $tab_class_activities_status = '';
}
elseif ($tab == 'messages' ) 
{
    $tab_classroom_details_status = '';
    $tab_classlist_status = '';
    $tab_class_exams_status = '';
    $tab_class_marks_status = '';
    $tab_promoteclass_status = '';
    $tab_messageclass_status = 'active';
    $tab_freeclass_status = '';
    $tab_class_activities_status = '';
}
elseif ($tab == 'activities' ) 
{
    $tab_classroom_details_status = '';
    $tab_classlist_status = '';
    $tab_class_exams_status = '';
    $tab_class_marks_status = '';
    $tab_promoteclass_status = '';
    $tab_messageclass_status = '';
    $tab_freeclass_status = '';
    $tab_class_activities_status = 'active';
}
?>

<div class="index content">
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#classroom_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-list" style="padding-right: 5px;"></i>Details
              </a>
            </li>
            <li style="font-size: 20px;">|</li>
            <li>
              <a href="#classlist" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-users" style="padding-right: 5px;"></i>Class List
              </a>
            </li>
            <li style="font-size: 20px;">|</li>
            <li>
              <a href="#class_exams" data-toggle="tab"class="btn btn-link"  style="font-size: 13px;">
                <i class="fas fa-book-reader" style="padding-right: 5px;"></i>Marks Sheet
              </a>
            </li>
            <li style="font-size: 20px;">|</li>
            <li>
              <a href="#class_marks" data-toggle="tab"class="btn btn-link"  style="font-size: 13px;">
                <i class="fas fa-download" style="padding-right: 5px;"></i>Import Marks
              </a>
            </li>
            <li style="font-size: 20px;">|</li>
            <li>
              <a href="#promoteclass" data-toggle="tab"class="btn btn-link"  style="font-size: 13px;">
                <i class="far fa-arrow-alt-circle-up" style="padding-right: 5px;"></i>Promote
              </a>
            </li>
            <li style="font-size: 20px;">|</li>
            <li>
              <a href="#messageclass" data-toggle="tab"class="btn btn-link"  style="font-size: 13px;">
                <i class="far fa-comment-alt" style="padding-right: 5px;"></i>Messages
              </a>
            </li>
            <li style="font-size: 20px;">|</li>
            <li>
              <a href="#freeclass" data-toggle="tab"class="btn btn-link"  style="font-size: 13px;">
                <i class="fas fa-eraser" style="padding-right: 5px;"></i>Free
              </a>
            </li>
            <li style="font-size: 20px;">|</li>
            <li>
              <a href="#class_activities" data-toggle="tab"class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-wheelchair" style="padding-right: 5px;"></i>Activities
              </a>
            </li>
        </ul>

        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane <?= $tab_classroom_details_status ?>" id="classroom_details">
                <div class="flex-fill">
                <div class="card card-body d-flex table-responsive" style="padding-top: 0;"> 
                    <table class='' width="100%">
                        <tr>
                            <th><?= __('Name:') ?></th>
                            <td><?= h($classroom->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Stream:') ?></th>
                            <td><?= h($classroom->stream->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Class Teacher:') ?></th>
                             <td><?= h($classroom->user->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Level Numeric:') ?></th>
                            <td><?= h($classroom->level->level_numeric) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('No of Students:') ?></th>
                            <td><?= h($class_students_count) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Creation:') ?></th>
                            <td><?= h($classroom->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Updation:') ?></th>
                            <td><?= h($classroom->modified) ?></td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_classlist_status ?>" id="classlist">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add Classroom Student:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'ClassroomStudents', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                                <table class='table table-striped table-condensed table-bordered' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Student') ?></th>
                                        <th><?= __('Adm NO') ?></th>
                                        <th><?= __('Classroom Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($classrooms as $classroom) : ?>
                                    <tr>
                                        <td><?= h($classroom->id) ?></td>
                                        <td><?= $this->Html->link($classroom->student_name, ['controller' => 'ClassroomStudents', 'action' => 'view', $classroom->id]) ?></td>
                                        <td><?= h($classroom->adm_no) ?></td>
                                        <td><?= h($classroom->status_name) ?></td>
                                        <td><?= h($classroom->created) ?></td>
                                        <td><?= h($classroom->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'ClassroomStudents', 'action' => 'view', $classroom->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller' => 'ClassroomStudents', 'action' => 'delete', $classroom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroom->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_class_exams_status?>" id="class_exams">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Export the table below to work offline
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                                <table class='table-marks table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('#') ?></th>
                                        <th><?= __('Student ID') ?></th>
                                        <th><?= __('Student') ?></th>
                                        <?php foreach ($subjects as $subject) : ?>
                                        <th><?= h($subject->code) ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $counter = 1;
                                    foreach ($classrooms as $classroom) : 
                                    ?>
                                    <tr>
                                        <td><?= h($counter) ?></td>
                                        <td><?= h($classroom->student_id) ?></td>
                                        <td><?= h($classroom->student_name) ?></td>
                                        <?php foreach ($subjects as $subject) : ?>
                                        <th></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php 
                                    $counter = $counter + 1;
                                    endforeach; 
                                    ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_class_marks_status?>" id="class_marks">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Import .csv file
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="classroomStudents form card card-body">
                        <?= $this->Form->create($studentSubjectMark,['type'=>'file', "url"=>["controller"=>"StudentSubjectMarks", "action"=>"importMarks"]]) ?>
                        <fieldset>
                            <?php 

                               echo $this->Form->control('classroom', ['options' => $classroom_id, 'label'=>'Current Classroom', 'required'=>'required']);
                               echo $this->Form->control('exam_id', ['options' => $exams, 'empty'=>'Select..', 'required'=>'required']);
                               echo $this->Form->control('marks_sheet', ['type'=>'file', 'label'=>'Marks Sheet &nbsp;', 'escape'=>false, 'required'=>'required', "accept"=>".csv"]);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Import'), ['class'=>'btn btn-success submit']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_promoteclass_status?>" id="promoteclass">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="classroomStudents form card card-body">
                        <?= $this->Form->create($classroomStudent,["url"=>["controller"=>"ClassroomStudents", "action"=>"promoteClass", $id]]) ?>
                        <fieldset>
                            <?php 

                               echo $this->Form->control('classroom', ['options' => $classroom_id, 'label'=>'Current Classroom']);
                                echo $this->Form->control('classroom_id', ['options' => $classrooms_id, 'label'=>'Destination Class', 'empty'=>'Select..']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Promote'), ['class'=>'btn btn-success submit']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane <?= $tab_messageclass_status?>" id="messageclass">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add a new message:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Messages', 'action' => 'message', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('title') ?></th>
                                        <th><?= $this->Paginator->sort('recipient') ?></th>
                                        <th><?= $this->Paginator->sort('sender') ?></th>
                                        <th><?= $this->Paginator->sort('messagestatus_id') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php  
                                    foreach ($messages as $message):
                                    ?>
                                    <tr>
                                        <td><?= h($message->id) ?></td>
                                        <td><?= $this->Html->link($message->title, ['controller'=>'Messages', 'action' => 'viewMessage', $message->id]) ?></td>
                                        <td><?= h($message->student) ?></td>
                                        <td><?= h($message->user) ?></td>
                                        <td><?= h($message->messagestatus) ?></td>
                                        <td><?= h($message->created) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'Messages', 'action' => 'viewMessage', $message->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller'=>'Messages', 'action' => 'editMessage', $message->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'Messages', 'action' => 'deleteMessage', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_freeclass_status?>" id="freeclass">
                <div class="classroomStudents form card card-body">
                    <?= $this->Form->create($classroomStudent,["url"=>["controller"=>"ClassroomStudents", "action"=>"freeClass", $id]]) ?>
                    <fieldset>
                        <?php
                        echo $this->Form->control('classroom_id', ['options' => $classroom_id]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Free'), ['class'=>'btn btn-success submit', 'confirm'=>'By freeing a classroom you make all its students inactive. Proceed to free?']) ?>

                    <?= $this->Form->end() ?>
                </div>
            </div>

            <div class="tab-pane <?= $tab_class_activities_status ?>" id="class_activities">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add a new activity:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'ClassroomActivities', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('activity_id') ?></th>
                                        <th><?= $this->Paginator->sort('status_id') ?></th>
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
                                    foreach ($classroom_activities as $classroom_activity):
                                    ?>
                                    <tr>
                                        <td><?= h($classroom_activity->id) ?></td>
                                        <td><?= $this->Html->link($classroom_activity->activity_name, ['controller'=>'ClassroomActivities','action'=>'view',$classroom_activity->id]) ?></td>
                                        <td><?= h($classroom_activity->status_name) ?></td>
                                        <td><?= h($classroom_activity->start) ?></td>
                                        <td><?= h($classroom_activity->end) ?></td>
                                        <td><?= h($classroom_activity->achieved) ?></td>
                                        <td><?= h($classroom_activity->measure_name) ?></td>
                                        <td><?= h($classroom_activity->created) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'ClassroomActivities', 'action' => 'view', $classroom_activity->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller'=>'ClassroomActivities', 'action' => 'edit', $classroom_activity->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'ClassroomActivities', 'action' => 'delete', $classroom_activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroom_activity->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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


                        

