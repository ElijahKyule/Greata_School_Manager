<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExamSubject Entity
 *
 * @property int $id
 * @property int $exam_id
 * @property int $subject_id
 * @property string $score_of
 * @property int $measure_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Exam $exam
 * @property \App\Model\Entity\Subject $subject
 */
class ExamSubject extends Entity
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
        'exam_id' => true,
        'subject_id' => true,
        'score_of' => true,
        'measure_id' => true,
        'created' => true,
        'modified' => true,
        'exam' => true,
        'subject' => true,
    ];
}
