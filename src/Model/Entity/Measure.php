<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Measure Entity
 *
 * @property int $id
 * @property string $name
 * @property string $abbreviation
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ClassroomActivity[] $classroom_activities
 * @property \App\Model\Entity\EmployeeLeave[] $employee_leaves
 * @property \App\Model\Entity\ExamSubject[] $exam_subjects
 * @property \App\Model\Entity\StudentActivity[] $student_activities
 */
class Measure extends Entity
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
        'abbreviation' => true,
        'created' => true,
        'modified' => true,
        'classroom_activities' => true,
        'employee_leaves' => true,
        'exam_subjects' => true,
        'student_activities' => true,
    ];
}
