<?php 
/** 
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($user->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div> 
<?php
$tab_user_details_status = 'active';
$tab_user_classrooms_status = '';
$tab_user_subject_status = '';
$tab_user_exams_status = '';
$tab_user_messages_status = '';
$tab_user_announcements_status = '';
$tab_user_activities_status = '';
$tab_employee_leaves_status = '';
$tab_user_settings_status = '';

if ($tab == 'profile' ) 
{
    $tab_user_details_status = 'active';
    $tab_user_classrooms_status = '';
    $tab_user_subject_status = '';
    $tab_user_exams_status = '';
    $tab_user_messages_status = '';
    $tab_user_announcements_status = '';
    $tab_user_activities_status = '';
    $tab_employee_leaves_status = '';
    $tab_user_settings_status = '';
}
elseif ($tab == 'classrooms' ) 
{
    $tab_user_details_status = '';
    $tab_user_classrooms_status = 'active';
    $tab_user_subject_status = '';
    $tab_user_exams_status = '';
    $tab_user_messages_status = '';
    $tab_user_announcements_status = '';
    $tab_user_activities_status = '';
    $tab_employee_leaves_status = '';
    $tab_user_settings_status = '';
}
elseif ($tab == 'subjects' ) 
{
    $tab_user_details_status = '';
    $tab_user_classrooms_status = '';
    $tab_user_subject_status = 'active';
    $tab_user_exams_status = '';
    $tab_user_messages_status = '';
    $tab_user_announcements_status = '';
    $tab_user_activities_status = '';
    $tab_employee_leaves_status = '';
    $tab_user_settings_status = '';
}
elseif ($tab == 'exams' ) 
{
    $tab_user_details_status = '';
    $tab_user_classrooms_status = '';
    $tab_user_subject_status = '';
    $tab_user_exams_status = 'active';
    $tab_user_messages_status = '';
    $tab_user_announcements_status = '';
    $tab_user_activities_status = '';
    $tab_employee_leaves_status = '';
    $tab_user_settings_status = '';
}
elseif ($tab == 'messages' ) 
{
    $tab_user_details_status = '';
    $tab_user_classrooms_status = '';
    $tab_user_subject_status = '';
    $tab_user_exams_status = '';
    $tab_user_messages_status = 'active';
    $tab_user_announcements_status = '';
    $tab_user_activities_status = '';
    $tab_employee_leaves_status = '';
    $tab_user_settings_status = '';
}
elseif ($tab == 'announcements' ) 
{
    $tab_user_details_status = '';
    $tab_user_classrooms_status = '';
    $tab_user_subject_status = '';
    $tab_user_exams_status = '';
    $tab_user_messages_status = '';
    $tab_user_announcements_status = 'active';
    $tab_user_activities_status = '';
    $tab_employee_leaves_status = '';
    $tab_user_settings_status = '';
}
elseif ($tab == 'activities' ) 
{
    $tab_user_details_status = '';
    $tab_user_classrooms_status = '';
    $tab_user_subject_status = '';
    $tab_user_exams_status = '';
    $tab_user_messages_status = '';
    $tab_user_announcements_status = '';
    $tab_user_activities_status = 'active';
    $tab_employee_leaves_status = '';
    $tab_user_settings_status = '';
}
elseif ($tab == 'leaves' ) 
{
    $tab_user_details_status = '';
    $tab_user_classrooms_status = '';
    $tab_user_subject_status = '';
    $tab_user_exams_status = '';
    $tab_user_messages_status = '';
    $tab_user_announcements_status = '';
    $tab_user_activities_status = '';
    $tab_employee_leaves_status = 'active';
    $tab_user_settings_status = '';
}
elseif ($tab == 'settings' ) 
{
    $tab_user_details_status = '';
    $tab_user_classrooms_status = '';
    $tab_user_subject_status = '';
    $tab_user_exams_status = '';
    $tab_user_messages_status = '';
    $tab_user_announcements_status = '';
    $tab_user_activities_status = '';
    $tab_employee_leaves_status = '';
    $tab_user_settings_status = 'active';
}
?>

<div class="column-responsive column-80 content"> 
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#user_details" data-toggle="tab" class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-user" style="padding-right: 5px;"></i>Profile
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#user_classrooms" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-landmark" style="padding-right: 5px;"></i>Classrooms
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#user_subject" data-toggle="tab"  class="btn btn-link"  style="font-size: 13px;">
                <i class="fas fa-book-reader" style="padding-right: 5px;"></i>Subjects
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#user_exams" data-toggle="tab"  class="btn btn-link"  style="font-size: 13px;">
                <i class="fas fa-file-alt" style="padding-right: 5px;"></i>Exams
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#user_payments" data-toggle="tab"  class="btn btn-link"  style="font-size: 13px;">
                <i class="fa fa-money" style="padding-right: 5px;"></i>Payments
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#user_messages" data-toggle="tab" class="btn btn-link" style="font-size: 13px;">
                <i class="far fa-comment-alt" style="padding-right: 5px;"></i>Messages
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#user_announcements" data-toggle="tab"  class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-bell" style="padding-right: 5px;"></i>News
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#user_activities" data-toggle="tab"  class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-wheelchair" style="padding-right: 5px;"></i>Activities
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#employee_leaves" data-toggle="tab"  class="btn btn-link" style="font-size: 13px;">
                <i class="fas fa-sign-out-alt" style="padding-right: 5px;"></i>Leaves
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#user_settings" data-toggle="tab"  class="btn btn-link" style="font-size: 13px;">
                <i class="fa fa-wrench" style="padding-right: 5px;"></i>Settings
              </a>
            </li>
        </ul>
        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane <?= $tab_user_details_status ?>" id="user_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2 card" style="width: 100%; padding: 20px;">
                                <?= @$this->Html->image($user->image) ?>
                                <?= $this->Form->create($user,['type'=>'file', "url"=>["action"=>"uploadImage", $id]]) ?>
                                <fieldset>
                                    <?php 
                                        echo $this->Form->control('user_image', ['type'=>'file']);
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Upload'), ['class'=>'btn btn-success submit fas fa-upload']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table style="width: 100%" >
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($user->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Email:') ?></th>
                                        <td><?= h($user->email) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Phone Number:') ?></th>
                                        <td><?= h($user->phone_number) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Address:') ?></th>
                                        <td><?= h($user->address) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Gender:') ?></th>
                                        <td><?= h($user->gender->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Role:') ?></th>
                                        <td><?= h($user->role->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($user->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($user->modified) ?></td> 
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_user_classrooms_status ?>" id="user_classrooms">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add classroom:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Classrooms', 'action' => 'addClassroom', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
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
                                        <th><?= __('Level') ?></th>
                                        <th><?= __('Stream') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($user->classrooms as $classroom) : ?>
                                    <tr>
                                        <td><?= h($classroom->id) ?></td>
                                        <td><?= $this->Html->link($classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $classroom->id]) ?></td>
                                        <td><?= h($classroom->level->name) ?></td>
                                        <td><?= h($classroom->stream->name) ?></td>
                                        <td><?= h($classroom->created) ?></td>
                                        <td><?= h($classroom->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Classrooms', 'action' => 'view', $classroom->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller' => 'Classrooms', 'action' => 'editClassroom', $classroom->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller' => 'Classrooms', 'action' => 'deleteClassroom', $classroom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroom->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

            <div class="tab-pane <?= $tab_user_subject_status ?>" id="user_subject">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add subject:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Subjects', 'action' => 'addSubject', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
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
                                        <th><?= __('Code') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($user->subjects as $subject) : ?>
                                    <tr>
                                        <td><?= h($subject->id) ?></td>
                                        <td><?= $this->Html->link($subject->name, ['controller' => 'Subjects', 'action' => 'view', $subject->id]) ?></td>
                                        <td><?= h($subject->code) ?></td>
                                        <td><?= h($subject->created) ?></td>
                                        <td><?= h($subject->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Subjects', 'action' => 'view', $subject->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller' => 'Subjects', 'action' => 'editSubject', $subject->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller' => 'Subjects', 'action' => 'deleteSubject', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

            <div class="tab-pane <?= $tab_user_exams_status ?>" id="user_exams">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add Exam:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Exams', 'action' => 'addExam', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive"> 
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Exam Code') ?></th>
                                        <th><?= __('Title') ?></th>
                                        <th><?= __('Exam Type') ?></th>
                                        <th><?= __('Exam Level') ?></th>
                                        <th><?= __('Year') ?></th>
                                        <th><?= __('Term') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($user->exams as $exam) : ?>
                                    <tr>
                                        <td><?= h($exam->id) ?></td>
                                        <td><?= $this->Html->link($exam->exam_code, ['controller' => 'Exams', 'action' => 'view', $exam->id]) ?></td>
                                        <td><?= h($exam->title) ?></td>
                                        <td><?= h($exam->examtype->name) ?></td>
                                        <td><?= h($exam->level->name) ?></td>
                                        <td><?= h($exam->year) ?></td>
                                        <td><?= h($exam->term->name) ?></td>
                                        <td><?= h($exam->created) ?></td>
                                        <td><?= h($exam->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Exams', 'action' => 'view', $exam->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller' => 'Exams', 'action' => 'editExam', $exam->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller' => 'Exams', 'action' => 'deleteExam', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

           
            <div class="tab-pane" id="user_payments">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive"> 
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Reference No') ?></th>
                                        <th><?= __('Student') ?></th>
                                        <th><?= __('Payment Mode') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($user->payments as $payment) : ?>
                                    <tr>
                                        <td><?= h($payment->id) ?></td>
                                        <td><?= $this->Html->link($payment->reference_number, ['controller' => 'Students', 'action' => 'view', $payment->student->id, '?'=>['tab'=>'payments']]) ?></td>
                                        <td><?= h($payment->student->name) ?></td>
                                        <td><?= h($payment->paymentmode->name) ?></td>
                                        <td><?= h($payment->created) ?></td>
                                        <td><?= h($payment->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Students', 'action' => 'view', $payment->student->id, '?'=>['tab'=>'payments']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
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

            <div class="tab-pane <?= $tab_user_messages_status ?>" id="user_messages">
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
                                        <th><?= __('Student') ?></th>
                                        <th><?= __('Message Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($user->messages as $message) : ?>
                                    <tr>
                                        <td><?= h($message->id) ?></td>
                                        <td><?= $this->Html->link($message->code, ['controller' => 'Messages', 'action' => 'viewMsg', $message->id, '?'=>['tab'=>'messages']]) ?></td>
                                        <td><?= h($message->title) ?></td>
                                        <td><?= h($message->student->name) ?></td>
                                        <td><?= h($message->messagestatus->name) ?></td>
                                        <td><?= h($message->created) ?></td>
                                        <td><?= h($message->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Messages', 'action' => 'viewMsg', $message->id, '?'=>['tab'=>'messages']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller' => 'Messages', 'action' => 'editMsg', $message->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller' => 'Messages', 'action' => 'deleteMsg', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

            <div class="tab-pane <?= $tab_user_announcements_status ?>" id="user_announcements">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add Announcement:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Announcements', 'action' => 'addAnc', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
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
                                        <th><?= __('Message Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($user->announcements as $announcement) : ?>
                                    <tr>
                                        <td><?= h($announcement->id) ?></td>
                                        <td><?= $this->Html->link($announcement->code,['controller' => 'Announcements', 'action' => 'viewAnc', $announcement->id]) ?></td>
                                        <td><?= h($announcement->title) ?></td>
                                        <td><?= h($announcement->messagestatus->name) ?></td>
                                        <td><?= h($announcement->created) ?></td>
                                        <td><?= h($announcement->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Announcements', 'action' => 'viewAnc', $announcement->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller' => 'Announcements', 'action' => 'editAnc', $announcement->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller' => 'Announcements', 'action' => 'deleteAnc', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

             <div class="tab-pane <?= $tab_user_activities_status ?>" id="user_activities">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add Related Activity:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Activities', 'action' => 'addActivity', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
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
                                        <th><?= __('Description') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($user->activities as $activity) : ?>
                                    <tr>
                                        <td><?= h($activity->id) ?></td>
                                        <td><?= $this->Html->link($activity->name, ['controller' => 'Activities', 'action' => 'viewActivity', $activity->id]) ?></td>
                                        <td><?= h($activity->description) ?></td>
                                        <td><?= h($activity->created) ?></td>
                                        <td><?= h($activity->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('',['controller'=>'Activities', 'action' => 'viewActivity', $activity->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('',['controller'=>'Activities', 'action' => 'editActivity', $activity->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'Activities', 'action' => 'deleteActivity', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

            <div class="tab-pane <?= $tab_employee_leaves_status ?>" id="employee_leaves">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add Leave:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'EmployeeLeaves', 'action' => 'addEmployee', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                 <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Paginator->sort('id') ?></th>
                                            <th><?= $this->Paginator->sort('employee_id') ?></th>
                                            <th><?= $this->Paginator->sort('leave_id') ?></th>
                                            <th><?= $this->Paginator->sort('description') ?></th>
                                            <th><?= $this->Paginator->sort('duration') ?></th>
                                            <th><?= $this->Paginator->sort('duration_measure') ?></th>
                                            <th><?= $this->Paginator->sort('created') ?></th>
                                            <th><?= $this->Paginator->sort('modified') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user->employee_leaves as $employeeLeave): ?>
                                        <tr>
                                            <td><?= $this->Number->format($employeeLeave->id) ?></td>
                                            <td><?=  $this->Html->link($employeeLeave->employee->name, ['controller' => 'EmployeeLeaves', 'action' => 'viewEmployee', $employeeLeave->id]) ?></td>
                                            <td><?= h($employeeLeave->leave->name) ?></td>
                                            <td><?= h($employeeLeave->description) ?></td>
                                            <td><?= $this->Number->format($employeeLeave->duration) ?></td>
                                            <td><?= h($employeeLeave->measure->name) ?></td>
                                            <td><?= h($employeeLeave->created) ?></td>
                                            <td><?= h($employeeLeave->modified) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link('', ['controller' => 'EmployeeLeaves', 'action' => 'viewEmployee', $employeeLeave->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                                <?= $this->Html->link('', ['controller'=>'EmployeeLeaves', 'action' => 'editEmployee', $employeeLeave->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                                <?= $this->Form->postLink('', ['controller'=>'EmployeeLeaves', 'action' => 'deleteEmployee', $employeeLeave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeLeave->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

            <div class="tab-pane <?= $tab_user_settings_status ?>" id="user_settings">
                 <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card d-flex" style="padding-top: 0;">
                        <div class="card-header info-box-text text-muted">
                            <span class="fa fa-lock"></span> Manage Password
                        </div>
                        <div>
                            <div class="students form content">
                                <?= $this->Form->create($student,["url"=>["controller"=>"Users", "action"=>"changePassword", $id]]) ?>
                                <fieldset>
                                    <?php
                                        echo $this->Form->control('old_password', ['type'=>'password', 'required'=>'required']);
                                        echo $this->Form->control('new_password', ['type'=>'password', 'required'=>'required']); 
                                        echo $this->Form->control('verify_password', ['type'=>'password', 'required'=>'required']);
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Change password'), ['class'=>'btn btn-success submit']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>