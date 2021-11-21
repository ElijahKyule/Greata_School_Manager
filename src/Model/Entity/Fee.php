<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fee Entity
 *
 * @property int $id
 * @property string $fee_code
 * @property int $level_id
 * @property int $year
 * @property int $term_id
 * @property string $description
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\FeeStructure[] $fee_structures
 * @property \App\Model\Entity\FeeStudent[] $fee_students
 */
class Fee extends Entity
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
        'fee_code' => true,
        'level_id' => true,
        'year' => true,
        'term_id' => true,
        'description' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'level' => true,
        'status' => true,
        'fee_structures' => true,
        'fee_students' => true,
    ];
}
