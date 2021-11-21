<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FeeStructure Entity
 *
 * @property int $id
 * @property int $fee_id
 * @property int $fee_structure_parameter_id
 * @property string $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Fee $fee
 * @property \App\Model\Entity\FeeStructureParameter $fee_structure_parameter
 */
class FeeStructure extends Entity
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
        'fee_id' => true,
        'fee_structure_parameter_id' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
        'fee' => true,
        'fee_structure_parameter' => true,
    ];
}
