<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FeeStudent Entity
 *
 * @property int $id
 * @property int $student_id
 * @property int $fee_id
 * @property string $fee_paid
 * @property string $fee_balance
 * @property int $paymentmode_id
 * @property string $receipt_number
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Fee $fee
 * @property \App\Model\Entity\Paymentmode $paymentmode
 * @property \App\Model\Entity\User $user
 */
class FeeStudent extends Entity
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
        'fee_id' => true,
        'fee_paid' => true,
        'fee_balance' => true,
        'paymentmode_id' => true,
        'receipt_number' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'fee' => true,
        'paymentmode' => true,
        'user' => true,
    ];
}
