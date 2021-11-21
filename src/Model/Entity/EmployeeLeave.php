<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployeeLeave Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $leave_id
 * @property string $description
 * @property int $duration
 * @property int $measure_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Leave $leave
 * @property \App\Model\Entity\Measure $measure
 * @property \App\Model\Entity\User $user
 */
class EmployeeLeave extends Entity
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
        'employee_id' => true,
        'leave_id' => true,
        'description' => true,
        'duration' => true,
        'measure_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'leave' => true,
        'measure' => true,
        'user' => true,
    ];
}
