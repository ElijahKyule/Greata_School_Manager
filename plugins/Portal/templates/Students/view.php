<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $student
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Students'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Student'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="students view content">
            <h3><?= h($student->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($student->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($student->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($student->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admission Number') ?></th>
                    <td><?= h($student->admission_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= $student->has('gender') ? $this->Html->link($student->gender->name, ['controller' => 'Genders', 'action' => 'view', $student->gender->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($student->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($student->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $student->has('status') ? $this->Html->link($student->status->name, ['controller' => 'Statuses', 'action' => 'view', $student->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Classroomstatus') ?></th>
                    <td><?= $student->has('classroomstatus') ? $this->Html->link($student->classroomstatus->name, ['controller' => 'Classroomstatuses', 'action' => 'view', $student->classroomstatus->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($student->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($student->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Of Birth') ?></th>
                    <td><?= h($student->date_of_birth) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admission Date') ?></th>
                    <td><?= h($student->admission_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($student->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($student->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Classroom Students') ?></h4>
                <?php if (!empty($student->classroom_students)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Classroom Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Classroomstatus Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->classroom_students as $classroomStudents) : ?>
                        <tr>
                            <td><?= h($classroomStudents->id) ?></td>
                            <td><?= h($classroomStudents->classroom_id) ?></td>
                            <td><?= h($classroomStudents->student_id) ?></td>
                            <td><?= h($classroomStudents->classroomstatus_id) ?></td>
                            <td><?= h($classroomStudents->created) ?></td>
                            <td><?= h($classroomStudents->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ClassroomStudents', 'action' => 'view', $classroomStudents->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ClassroomStudents', 'action' => 'edit', $classroomStudents->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ClassroomStudents', 'action' => 'delete', $classroomStudents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classroomStudents->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Fee Students') ?></h4>
                <?php if (!empty($student->fee_students)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Fee Id') ?></th>
                            <th><?= __('Fee Paid') ?></th>
                            <th><?= __('Fee Balance') ?></th>
                            <th><?= __('Paymentmode Id') ?></th>
                            <th><?= __('Receipt Number') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->fee_students as $feeStudents) : ?>
                        <tr>
                            <td><?= h($feeStudents->id) ?></td>
                            <td><?= h($feeStudents->student_id) ?></td>
                            <td><?= h($feeStudents->fee_id) ?></td>
                            <td><?= h($feeStudents->fee_paid) ?></td>
                            <td><?= h($feeStudents->fee_balance) ?></td>
                            <td><?= h($feeStudents->paymentmode_id) ?></td>
                            <td><?= h($feeStudents->receipt_number) ?></td>
                            <td><?= h($feeStudents->user_id) ?></td>
                            <td><?= h($feeStudents->created) ?></td>
                            <td><?= h($feeStudents->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FeeStudents', 'action' => 'view', $feeStudents->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FeeStudents', 'action' => 'edit', $feeStudents->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FeeStudents', 'action' => 'delete', $feeStudents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeStudents->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Messages') ?></h4>
                <?php if (!empty($student->messages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Body') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Messagestatus Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->messages as $messages) : ?>
                        <tr>
                            <td><?= h($messages->id) ?></td>
                            <td><?= h($messages->code) ?></td>
                            <td><?= h($messages->title) ?></td>
                            <td><?= h($messages->body) ?></td>
                            <td><?= h($messages->student_id) ?></td>
                            <td><?= h($messages->user_id) ?></td>
                            <td><?= h($messages->messagestatus_id) ?></td>
                            <td><?= h($messages->created) ?></td>
                            <td><?= h($messages->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'view', $messages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $messages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Messages', 'action' => 'delete', $messages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Payments') ?></h4>
                <?php if (!empty($student->payments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Debit') ?></th>
                            <th><?= __('Credit') ?></th>
                            <th><?= __('Balance') ?></th>
                            <th><?= __('Reference Number') ?></th>
                            <th><?= __('Paymentmode Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->payments as $payments) : ?>
                        <tr>
                            <td><?= h($payments->id) ?></td>
                            <td><?= h($payments->student_id) ?></td>
                            <td><?= h($payments->debit) ?></td>
                            <td><?= h($payments->credit) ?></td>
                            <td><?= h($payments->balance) ?></td>
                            <td><?= h($payments->reference_number) ?></td>
                            <td><?= h($payments->paymentmode_id) ?></td>
                            <td><?= h($payments->description) ?></td>
                            <td><?= h($payments->user_id) ?></td>
                            <td><?= h($payments->created) ?></td>
                            <td><?= h($payments->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Student Activities') ?></h4>
                <?php if (!empty($student->student_activities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Activity Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Start') ?></th>
                            <th><?= __('End') ?></th>
                            <th><?= __('Achieved') ?></th>
                            <th><?= __('Measure Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->student_activities as $studentActivities) : ?>
                        <tr>
                            <td><?= h($studentActivities->id) ?></td>
                            <td><?= h($studentActivities->student_id) ?></td>
                            <td><?= h($studentActivities->activity_id) ?></td>
                            <td><?= h($studentActivities->status_id) ?></td>
                            <td><?= h($studentActivities->start) ?></td>
                            <td><?= h($studentActivities->end) ?></td>
                            <td><?= h($studentActivities->achieved) ?></td>
                            <td><?= h($studentActivities->measure_id) ?></td>
                            <td><?= h($studentActivities->created) ?></td>
                            <td><?= h($studentActivities->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentActivities', 'action' => 'view', $studentActivities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentActivities', 'action' => 'edit', $studentActivities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentActivities', 'action' => 'delete', $studentActivities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentActivities->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Student Subject Marks') ?></h4>
                <?php if (!empty($student->student_subject_marks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Student Subject Id') ?></th>
                            <th><?= __('Exam Id') ?></th>
                            <th><?= __('Classroom Id') ?></th>
                            <th><?= __('Marks') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($student->student_subject_marks as $studentSubjectMarks) : ?>
                        <tr>
                            <td><?= h($studentSubjectMarks->id) ?></td>
                            <td><?= h($studentSubjectMarks->student_id) ?></td>
                            <td><?= h($studentSubjectMarks->student_subject_id) ?></td>
                            <td><?= h($studentSubjectMarks->exam_id) ?></td>
                            <td><?= h($studentSubjectMarks->classroom_id) ?></td>
                            <td><?= h($studentSubjectMarks->marks) ?></td>
                            <td><?= h($studentSubjectMarks->created) ?></td>
                            <td><?= h($studentSubjectMarks->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentSubjectMarks', 'action' => 'view', $studentSubjectMarks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentSubjectMarks', 'action' => 'edit', $studentSubjectMarks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentSubjectMarks', 'action' => 'delete', $studentSubjectMarks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSubjectMarks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Student Subjects') ?></h4>
                <?php if (!empty($student->student_subjects)) : ?>
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
                        <?php foreach ($student->student_subjects as $studentSubjects) : ?>
                        <tr>
                            <td><?= h($studentSubjects->id) ?></td>
                            <td><?= h($studentSubjects->student_id) ?></td>
                            <td><?= h($studentSubjects->subject_id) ?></td>
                            <td><?= h($studentSubjects->created) ?></td>
                            <td><?= h($studentSubjects->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentSubjects', 'action' => 'view', $studentSubjects->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentSubjects', 'action' => 'edit', $studentSubjects->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentSubjects', 'action' => 'delete', $studentSubjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentSubjects->id)]) ?>
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
