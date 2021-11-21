<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClassroomActivity Entity
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $activity_id
 * @property int $status_id
 * @property \Cake\I18n\FrozenDate $start
 * @property \Cake\I18n\FrozenDate $end
 * @property string $achieved
 * @property int $measure_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Classroom $classroom
 * @property \App\Model\Entity\Activity $activity
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Measure $measure
 */
class ClassroomActivity extends Entity
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
        'activity_id' => true,
        'status_id' => true,
        'start' => true,
        'end' => true,
        'achieved' => true,
        'measure_id' => true,
        'created' => true,
        'modified' => true,
        'classroom' => true,
        'activity' => true,
        'status' => true,
        'measure' => true,
    ];
}
