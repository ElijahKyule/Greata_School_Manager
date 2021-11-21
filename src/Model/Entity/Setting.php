<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity
 *
 * @property int $id
 * @property string $server_ip
 * @property string $institution_name
 * @property string $institution_short_name
 * @property string $phone_number
 * @property string $fax
 * @property string $email
 * @property string $postal_code
 * @property string $box
 * @property string $county
 * @property string $street
 * @property string $email_provider
 * @property string $email_host
 * @property string $email_username
 * @property string $email_port
 * @property string $email_password
 * @property string $sms_balance
 * @property string $sms_provider
 * @property string $sms_Url
 * @property string $sms_API_Key
 * @property string $sms_username
 * @property string $sms_invoices
 * @property string $sms_receipts
 * @property string $sms_passwords
 */
class Setting extends Entity
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
        'server_ip' => true,
        'institution_name' => true,
        'institution_short_name' => true,
        'phone_number' => true,
        'fax' => true,
        'email' => true,
        'postal_code' => true,
        'box' => true,
        'county' => true,
        'street' => true,
        'email_provider' => true,
        'email_host' => true,
        'email_username' => true,
        'email_port' => true,
        'email_password' => true,
        'sms_balance' => true,
        'sms_provider' => true,
        'sms_Url' => true,
        'sms_API_Key' => true,
        'sms_username' => true,
        'sms_invoices' => true,
        'sms_receipts' => true,
        'sms_passwords' => true,
    ];
}
