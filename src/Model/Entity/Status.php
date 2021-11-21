<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Status Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ClassroomActivity[] $classroom_activities
 * @property \App\Model\Entity\Exam[] $exams
 * @property \App\Model\Entity\Fee[] $fees
 * @property \App\Model\Entity\StudentActivity[] $student_activities
 * @property \App\Model\Entity\Student[] $students
 */
class Status extends Entity
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
        'created' => true,
        'modified' => true,
        'classroom_activities' => true,
        'exams' => true,
        'fees' => true,
        'student_activities' => true,
        'students' => true,
    ];
}
