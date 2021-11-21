<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exam Entity
 *
 * @property int $id
 * @property string $title
 * @property string $exam_code
 * @property int $examtype_id
 * @property int $level_id
 * @property int $year
 * @property int $term_id
 * @property string $description
 * @property int $status_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Examtype $examtype
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Term $term
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ExamSubject[] $exam_subjects
 */
class Exam extends Entity
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
        'title' => true,
        'exam_code' => true,
        'examtype_id' => true,
        'level_id' => true,
        'year' => true,
        'term_id' => true,
        'description' => true,
        'status_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'examtype' => true,
        'level' => true,
        'term' => true,
        'user' => true,
        'exam_subjects' => true,
    ];
}
