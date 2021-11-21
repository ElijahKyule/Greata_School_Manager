<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Classroom Entity
 *
 * @property int $id
 * @property string $name
 * @property int $level_id
 * @property string $stream_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Stream $stream
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ClassroomStudent[] $classroom_students
 */
class Classroom extends Entity
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
        'level_id' => true,
        'stream_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'level' => true,
        'stream' => true,
        'user' => true,
        'classroom_students' => true,
    ];
}