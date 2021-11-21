<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentSubjectMark Entity
 *
 * @property int $id
 * @property int $student_id
 * @property int $student_subject_id
 * @property int $exam_id
 * @property int $classroom_id
 * @property string $marks
 * @property int $grade_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\StudentSubject $student_subject
 * @property \App\Model\Entity\Exam $exam
 * @property \App\Model\Entity\Classroom $classroom
 */
class StudentSubjectMark extends Entity
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
        'student_id' => true,
        'student_subject_id' => true,
        'exam_id' => true,
        'classroom_id' => true,
        'marks' => true,
        'grade_id' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'student_subject' => true,
        'exam' => true,
        'classroom' => true,
    ];
}
