 <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
    <div class="content-head index">
        <div class="pull-left">
            <h3><?= h($student->name) ?></h3>
        </div>
        <div class="pull-right">
            <?= $this->Html->link(__(' List'), ['action' => 'index'], ['class' => 'btn btn-success float-right fa fa-list']) ?>
            <?= $this->Form->postLink(__(' Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class' => 'btn btn-success float-right fa fa-trash']) ?>
            <?= $this->Html->link(__(' Edit'), ['action' => 'edit', $student->id], ['class' => 'btn btn-success float-right fa fa-edit']) ?>
            <?= $this->Html->link(__(' New'), ['action' => 'add'], ['class' => 'btn btn-success float-right fa fa-plus']) ?>
        </div>
    </div>
<?php
$tab_students_details_status = 'active';
$tab_classroom_details_status = '';
$tab_subject_details_status = '';
$tab_fee_details_status = '';
$tab_message_student_status = ''; 
$tab_activity_student_status = '';
$tab_subject_marks_details_status = '';

if ($tab == 'profile' ) 
{
    $tab_students_details_status = 'active';
    $tab_classroom_details_status = '';
    $tab_subject_details_status = '';
    $tab_fee_details_status = '';
    $tab_message_student_status = '';
    $tab_activity_student_status = '';
    $tab_subject_marks_details_status = '';
}
elseif ($tab == 'subjects' ) 
{
    $tab_students_details_status = '';
    $tab_classroom_details_status = '';
    $tab_subject_details_status = 'active';
    $tab_fee_details_status = '';
    $tab_message_student_status = '';
    $tab_activity_student_status = '';
    $tab_subject_marks_details_status = '';
}
elseif ($tab == 'messages' ) 
{
    $tab_students_details_status = '';
    $tab_classroom_details_status = '';
    $tab_subject_details_status = '';
    $tab_fee_details_status = '';
    $tab_message_student_status = 'active';
    $tab_activity_student_status = '';
    $tab_subject_marks_details_status = '';
}
elseif ($tab == 'payments' ) 
{
    $tab_students_details_status = '';
    $tab_classroom_details_status = '';
    $tab_subject_details_status = '';
    $tab_fee_details_status = 'active';
    $tab_message_student_status = '';
    $tab_activity_student_status = '';
    $tab_subject_marks_details_status = '';
}
elseif ($tab == 'classrooms' ) 
{
    $tab_students_details_status = '';
    $tab_classroom_details_status = 'active';
    $tab_subject_details_status = '';
    $tab_fee_details_status = '';
    $tab_message_student_status = '';
    $tab_activity_student_status = '';
    $tab_subject_marks_details_status = '';
}
elseif ($tab == 'activities' ) 
{
    $tab_students_details_status = '';
    $tab_classroom_details_status = '';
    $tab_subject_details_status = '';
    $tab_fee_details_status = '';
    $tab_message_student_status = '';
    $tab_activity_student_status = 'active';
    $tab_subject_marks_details_status = '';
}
elseif ($tab == 'subjectmarks' ) 
{
    $tab_students_details_status = '';
    $tab_classroom_details_status = '';
    $tab_subject_details_status = '';
    $tab_fee_details_status = '';
    $tab_message_student_status = '';
    $tab_activity_student_status = '';
    $tab_subject_marks_details_status = 'active';
}
?>
<div class="column-responsive column-80 content"> 
   <!--  <div id="content"> -->
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
              <a href="#students_details" data-toggle="tab" class="btn btn-link"  style="font-size: 12px;">
                <i class="fa fa-user" style="padding-right: 3px;"></i>Profile
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#classroom_details" data-toggle="tab" class="btn btn-link" style="font-size: 12px;">
                <i class="fa fa-landmark" style="padding-right: 3px;"></i>Classrooms
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#subject_details" data-toggle="tab"  class="btn btn-link"  style="font-size: 12px;">
                <i class="fas fa-book-reader" style="padding-right: 3px;"></i>Subjects
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#subject_marks_details" data-toggle="tab"  class="btn btn-link"  style="font-size: 12px;">
                <i class="fas fa-book-reader" style="padding-right: 3px;"></i>Exam Marks
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#student_invoice" data-toggle="tab"  class="btn btn-link" style="font-size: 12px;">
                <i class="fas fa-file-invoice-dollar" style="padding-right: 3px;"></i>Invoice
              </a>
            </li>
            <li style="font-size: 19px;">|</li>
            <li>
              <a href="#fee_details" data-toggle="tab"  class="btn btn-link"  style="font-size: 12px;">
                <i class="fa fa-money" style="padding-right: 3px;"></i>Payments
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#promote_student" data-toggle="tab"  class="btn btn-link"  style="font-size: 12px;">
                <i class="far fa-arrow-alt-circle-up" style="padding-right: 3px;"></i>Promote
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#message_student" data-toggle="tab" class="btn btn-link" style="font-size: 12px;">
                <i class="far fa-comment-alt" style="padding-right: 3px;"></i>Messages
              </a>
            </li>
            <li style="font-size: 18px;">|</li>
            <li>
              <a href="#activity_student" data-toggle="tab" class="btn btn-link" style="font-size: 12px;">
                <i class="fa fa-wheelchair" style="padding-right: 3px;"></i>Activities
              </a>
            </li>
        </ul>
        <div id="my-tab-content" class="tab-content" style="padding: 10px;">
            <div class="tab-pane <?= $tab_students_details_status?>" id="students_details">
                <div class="card flex-fill">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-md-2 card" style="width: 100%; padding: 20px;">
                                <?= @$this->Html->image($student->image) ?> 
                                <?= $this->Form->create($student,['type'=>'file', "url"=>["action"=>"uploadImage", $id]]) ?>
                                <fieldset>
                                    <?php 
                                        echo $this->Form->control('student_image', ['type'=>'file']);
                                    ?>
                                </fieldset>
                                <?= $this->Form->button(__('Upload'), ['class'=>'btn btn-success submit fas fa-upload']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="col-md-10"  style="width: 100%">
                                <table style="width: 100%">
                                    <tr>
                                        <th><?= __('Name:') ?></th>
                                        <td><?= h($student->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Email:') ?></th>
                                        <td><?= h($student->email) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Phone Number:') ?></th>
                                        <td><?= h($student->phone_number) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Admission Number:') ?></th>
                                        <td><?= h($student->admission_number) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Gender:') ?></th>
                                        <td><?= h($student->gender->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Address:') ?></th>
                                        <td><?= h($student->address) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Date Of Birth:') ?></th>
                                        <td><?= h($student->date_of_birth) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Student Status:') ?></th>
                                        <td><?= h($student->status->name) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Admission Date:') ?></th>
                                        <td><?= h($student->admission_date) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Created:') ?></th>
                                        <td><?= h($student->created) ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= __('Modified:') ?></th>
                                        <td><?= h($student->modified) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_classroom_details_status?>" id="classroom_details">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Class Name') ?></th>
                                        <th><?= __('Class Teacher') ?></th>
                                        <th><?= __('Class Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($student->classroom_students as $classroomStudents) : ?>
                                    <tr>
                                        <td><?= h($classroomStudents->id) ?></td>
                                        <td><?= $this->Html->link($classroomStudents->classroom->name, ['controller' => 'Classrooms', 'action' => 'view', $classroomStudents->classroom->id, '?'=>['tab'=>'classlist']]) ?></td>
                                        <td><?= $this->Html->link($classroomStudents->classroom->user->name, ['controller' => 'Users', 'action' => 'view', $classroomStudents->classroom->user->id]) ?></td>
                                        <td><?= h($classroomStudents->classroomstatus->name) ?></td>
                                        <td><?= h($classroomStudents->created) ?></td>
                                        <td><?= h($classroomStudents->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Classrooms', 'action' => 'view', $classroomStudents->classroom->id , '?'=>['tab'=>'classlist']], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'ClassroomStudents', 'action' => 'deleteStudent', $classroomStudents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroomStudents->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

            <div class="tab-pane <?= $tab_subject_details_status?>" id="subject_details">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add subject:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'StudentSubjects', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                 <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Paginator->sort('id') ?></th>
                                            <th><?= $this->Paginator->sort('subject_id') ?></th>
                                            <th><?= __('Subject Teacher') ?></th>
                                            <th><?= $this->Paginator->sort('created') ?></th>
                                            <th><?= $this->Paginator->sort('modified') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($student->student_subjects as $studentSubject): ?>
                                        <tr>
                                            <td><?= $this->Number->format($studentSubject->id) ?></td>
                                            <td><?= $studentSubject->has('subject') ? $this->Html->link($studentSubject->subject->name, ['controller' => 'StudentSubjects', 'action' => 'view', $studentSubject->id]) : '' ?></td>
                                            <td><?= $this->Html->link($studentSubject->subject->user->name, ['controller' => 'Users', 'action' => 'view', $studentSubject->subject->user->id])?></td>
                                            <td><?= h($studentSubject->created) ?></td>
                                            <td><?= h($studentSubject->modified) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link('', ['controller'=>'StudentSubjects', 'action' => 'view', $studentSubject->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                                <?= $this->Form->postLink('', ['controller'=>'StudentSubjects', 'action' => 'delete', $studentSubject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSubject->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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

            <div class="tab-pane <?= $tab_subject_marks_details_status?>" id="subject_marks_details">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                        Add subject marks:
                        <?= $this->Html->link(__(' Add'), ['controller'=>'StudentSubjectMarks', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                        
                        <?= $this->Form->create($student,["url"=>["action"=>"view", $id]]) ?>
                        <div class="flex-fill" style="margin-top: 5px">
                            <div class="pull-left" style="margin-right: 5px">
                                <?php echo $this->Form->control('exam_id', ['options' => $exams, 'label'=>'Filter marks by exams:', 'style'=>'width: 150px', 'empty'=>'Select..', 'required'=>'required']); ?>
                            </div>
                            <div>
                                <?= $this->Form->button(__(' Filter'), ['class'=>'btn btn-outline-secondary', 'style'=>'height:29px']) ?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    
                </div>
                 <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('subject') ?></th>
                                        <th><?= $this->Paginator->sort('code') ?></th>
                                        <th><?= $this->Paginator->sort('marks (%)') ?></th>
                                        <th><?= $this->Paginator->sort('grade') ?></th>
                                        <th><?= $this->Paginator->sort('comments') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    $totalMarks = 0;  
                                    foreach ($studentSubjectMarks as $student_subject_mark): 
                                    $count = $count + 1;
                                    $totalMarks = $totalMarks + $student_subject_mark->marks;
                                    ?>
                                    <tr>
                                        <td><?= h($student_subject_mark->id) ?></td>
                                        <td><?= $this->Html->link($student_subject_mark->subject, ['controller'=>'StudentSubjectMarks', 'action' => 'view', $student_subject_mark->id]) ?></td>
                                        <td><?= h($student_subject_mark->code) ?></td>
                                        <td><?= h($student_subject_mark->marks) ?></td>
                                        <td><?= h($student_subject_mark->grade) ?></td>
                                        <td><?= h($student_subject_mark->comments) ?></td>
                                        <td><?= h($student_subject_mark->created) ?></td>
                                        <td><?= h($student_subject_mark->modified) ?></td> 
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'StudentSubjectMarks', 'action' => 'view', $student_subject_mark->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller'=>'StudentSubjectMarks', 'action' => 'edit', $student_subject_mark->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'StudentSubjectMarks', 'action' => 'delete', $student_subject_mark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student_subject_mark->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot> 
                                    <tr>
                                        <th><?= h('Class Position:') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= $level_posn.' / '.$current_level_count ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                    </tr>
                                </tfoot>
                                <tfoot> 
                                    <tr>
                                        <th><?= h('Totals:') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= $totalMarks.' / '.$count * 100 ?></th>
                                        <?php
                                        $avg_score = '';
                                        $mean_grade = '';
                                        if ($count>0) 
                                        {
                                            $avg_score = ceil($totalMarks/($count));
                                            foreach ($grades as $grade) 
                                            {
                                                if (($avg_score >= $grade->lower_bound)&&($avg_score<=$grade->upper_bound)) 
                                                {
                                                    $mean_grade = $grade->name;
                                                }
                                            }
                                        }
                                        ?>
                                        <th><?= h($mean_grade) ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                    </tr>
                                </tfoot>
                                 <tfoot> 
                                    <tr>
                                        <th><?= h('Stream Position:') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= $stream_posn.' / '.$current_stream_count ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                        <th><?= h('') ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_fee_details_status?>" id="fee_details">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add payment:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Payments', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                 <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex" style="padding-top: 0;">
                        <div class="related">
                            <div class="table-responsive">
                                <table class='table table-striped table-condensed' width="100%">
                                    <thead>
                                    <tr>
                                        <th><?= __('Id') ?></th>
                                        <th><?= __('Reference NO') ?></th>
                                        <th><?= __('Date') ?></th>
                                        <th><?= __('Debit (Expected)') ?></th>
                                        <th><?= __('Credit (Paid)') ?></th>
                                        <th><?= __('Balance') ?></th>
                                        <th><?= __('Payment Mode') ?></th>
                                        <th><?= __('Description') ?></th>
                                        <th><?= __('Authorized by') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($student->payments as $payment) : ?>
                                    <tr>
                                        <td><?= h($payment->id) ?></td>
                                        <td><?= $this->Html->link($payment->reference_number, ['controller' => 'Payments', 'action' => 'view', $payment->id]) ?></td>
                                        <td><?= h($payment->created) ?></td>
                                        <td><?= h($payment->debit) ?></td>
                                        <td><?= h($payment->credit) ?></td>
                                        <td><?= h($payment->balance) ?></td>
                                        <td><?= h($payment->paymentmode->name) ?></td>
                                        <td><?= h($payment->description) ?></td>
                                        <td><?= h($payment->user->name) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller' => 'Payments', 'action' => 'view', $payment->id],['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller' => 'Payments', 'action' => 'edit', $payment->id],['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
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
            <div class="tab-pane" id="student_invoice">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="students form card card-body">
                        <?= $this->Form->create($payment,["url"=>["controller"=>"Payments", "action"=>"invoiceStudent", $id]]) ?>
                        <fieldset>
                            <?php 
                                echo $this->Form->control('student_id', ['options' => $stdnts, 'type'=>'hidden']);
                                echo $this->Form->control('fee_id', ['options' => $fees , 'empty'=>'Select..', 'label'=>'Fee Structure', 'required'=>'required']);
                                echo $this->Form->control('paymentmode_id', ['options' => $paymentmodes, 'empty'=>'Select..', 'label'=>'Transaction type', 'required'=>'required']);
                                echo $this->Form->control('reference_number', ['required'=>'required']);
                                echo $this->Form->control('description', ['type'=>'textarea', 'required'=>'required']);
                                echo $this->Form->control('user_id', ['options' => $users, 'empty'=>'Select..', 'label'=>'Authorized by', 'required'=>'required']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success submit']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="promote_student">
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="classroomStudents form card card-body">
                        <?= $this->Form->create($classroomStudent,["url"=>["controller"=>"ClassroomStudents", "action"=>"promoteStudent", $id]]) ?>
                        <fieldset>
                            <?php 
                                echo $this->Form->control('student_id', ['options' => $students]);
                                echo $this->Form->control('classrooms', ['options' => $classroom, 'label'=>'Current Classroom', 'required'=>'required']);
                                echo $this->Form->control('classroom_id', ['options' => $classrooms, 'label'=>'Destination Class', 'empty'=>'Select..', 'required'=>'required']);
                                echo $this->Form->control('classroomstatus_id', ['value' => 1, 'type'=>'hidden']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Promote Student'), ['class'=>'btn btn-success submit']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane <?= $tab_message_student_status?>" id="message_student">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add a new message:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'Messages', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
                </div>
                <div class="flex-fill" style="margin-top: 10px;">
                    <div class="card card-body d-flex table-responsive">
                        <div class="table-responsive">
                            <table class='table table-striped table-condensed' width="100%">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id') ?></th>
                                        <th><?= $this->Paginator->sort('title') ?></th>
                                        <th><?= $this->Paginator->sort('user_id') ?></th>
                                        <th><?= $this->Paginator->sort('messagestatus_id') ?></th>
                                        <th><?= $this->Paginator->sort('created') ?></th>
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php  
                                    foreach ($messages as $message):
                                    ?>
                                    <tr>
                                        <td><?= h($message->id) ?></td>
                                        <td><?= $this->Html->link($message->title, ['controller'=>'Messages', 'action' => 'view', $message->id]) ?></td>
                                        <td><?= h($message->user->name) ?></td>
                                        <td><?= h($message->messagestatus->name) ?></td>
                                        <td><?= h($message->created) ?></td>
                                        <td><?= h($message->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'Messages', 'action' => 'view', $message->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller'=>'Messages', 'action' => 'edit', $message->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'Messages', 'action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane <?= $tab_activity_student_status ?>" id="activity_student">
                <div class="text-muted" style="font-size: 13px; margin-bottom: 5px;">
                    Add a new activity:
                    <?= $this->Html->link(__(' Add'), ['controller'=>'StudentActivities', 'action' => 'add', $id], ['class' => 'btn btn-outline-secondary fa fa-plus']) ?>
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
                                        <th><?= $this->Paginator->sort('modified') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php  
                                    foreach ($student->student_activities as $student_activity): 
                                    ?>
                                    <tr>
                                        <td><?= h($student_activity->id) ?></td>
                                        <td><?= $this->Html->link($student_activity->activity->name, ['controller'=>'StudentActivities','action'=>'view', $student_activity->id]) ?></td>
                                        <td><?= h($student_activity->status->name) ?></td>
                                        <td><?= h($student_activity->start) ?></td>
                                        <td><?= h($student_activity->end) ?></td>
                                        <td><?= h($student_activity->achieved) ?></td>
                                        <td><?= h($student_activity->measure->name) ?></td>
                                        <td><?= h($student_activity->created) ?></td>
                                        <td><?= h($student_activity->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link('', ['controller'=>'StudentActivities', 'action' => 'view', $student_activity->id], ['class'=>'far fa-eye btn btn-xs btn-default']) ?>
                                            <?= $this->Html->link('', ['controller'=>'StudentActivities', 'action' => 'edit', $student_activity->id], ['class'=>'fas fa-edit btn btn-xs btn-default']) ?>
                                            <?= $this->Form->postLink('', ['controller'=>'StudentActivities', 'action' => 'delete', $student_activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student_activity->id), 'class'=>'fa fa-trash-alt btn btn-xs btn-default']) ?>
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