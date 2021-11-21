<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClassroomStudent Entity
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $student_id
 * @property int $classroomstatus_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Classroom $classroom
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Classroomstatus $classroomstatus
 */
class ClassroomStudent extends Entity
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
        'classroom_id' => true,
        'student_id' => true,
        'classroomstatus_id' => true,
        'created' => true,
        'modified' => true,
        'classroom' => true,
        'student' => true,
        'classroomstatus' => true,
    ];
}
