<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Announcement Entity
 *
 * @property int $id
 * @property string $code
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property int $messagestatus_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Messagestatus $messagestatus
 */
class Announcement extends Entity
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
        'code' => true,
        'title' => true,
        'body' => true,
        'user_id' => true,
        'messagestatus_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'messagestatus' => true,
    ];
}
