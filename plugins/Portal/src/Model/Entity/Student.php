<?php
declare(strict_types=1);

namespace Portal\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $admission_number
 * @property int $gender_id
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property string $address
 * @property string $password
 * @property int $status_id
 * @property int $classroomstatus_id
 * @property \Cake\I18n\FrozenDate $admission_date
 * @property string $image
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Portal\Model\Entity\Gender $gender
 * @property \Portal\Model\Entity\Status $status
 * @property \Portal\Model\Entity\Classroomstatus $classroomstatus
 * @property \Portal\Model\Entity\ClassroomStudent[] $classroom_students
 * @property \Portal\Model\Entity\FeeStudent[] $fee_students
 * @property \Portal\Model\Entity\Message[] $messages
 * @property \Portal\Model\Entity\Payment[] $payments
 * @property \Portal\Model\Entity\StudentActivity[] $student_activities
 * @property \Portal\Model\Entity\StudentSubjectMark[] $student_subject_marks
 * @property \Portal\Model\Entity\StudentSubject[] $student_subjects
 */
class Student extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'phone_number' => true,
        'admission_number' => true,
        'gender_id' => true,
        'date_of_birth' => true,
        'address' => true,
        'password' => true,
        'status_id' => true,
        'classroomstatus_id' => true,
        'admission_date' => true,
        'image' => true,
        'created' => true,
        'modified' => true,
        'gender' => true,
        'status' => true,
        'classroomstatus' => true,
        'classroom_students' => true,
        'fee_students' => true,
        'messages' => true,
        'payments' => true,
        'student_activities' => true,
        'student_subject_marks' => true,
        'student_subjects' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
