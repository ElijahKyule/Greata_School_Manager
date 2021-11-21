<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $student_id
 * @property string $debit
 * @property string $credit
 * @property string $balance
 * @property string $reference_number
 * @property int $paymentmode_id
 * @property string $description
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Paymentmode $paymentmode
 * @property \App\Model\Entity\User $user
 */
class Payment extends Entity
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
        'debit' => true,
        'credit' => true,
        'balance' => true,
        'reference_number' => true,
        'paymentmode_id' => true,
        'description' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'paymentmode' => true,
        'user' => true,
    ];
}
