<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Level Entity
 *
 * @property int $id
 * @property string $name
 * @property int $level_numeric
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Classroom[] $classrooms
 * @property \App\Model\Entity\Exam[] $exams
 * @property \App\Model\Entity\Fee[] $fees
 * @property \App\Model\Entity\StudentSubject[] $student_subjects
 */
class Level extends Entity
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
        'level_numeric' => true,
        'created' => true,
        'modified' => true,
        'classrooms' => true,
        'exams' => true,
        'fees' => true,
        'student_subjects' => true,
    ];
}
