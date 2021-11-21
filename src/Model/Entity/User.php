<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $address
 * @property int $gender_id
 * @property string $password
 * @property int $role_id
 * @property string $image
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Gender $gender
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Activity[] $activities
 * @property \App\Model\Entity\Announcement[] $announcements
 * @property \App\Model\Entity\Classroom[] $classrooms
 * @property \App\Model\Entity\Exam[] $exams
 * @property \App\Model\Entity\FeeStudent[] $fee_students
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Subject[] $subjects
 */
class User extends Entity
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
        'email' => true,
        'phone_number' => true,
        'address' => true,
        'gender_id' => true,
        'password' => true,
        'role_id' => true,
        'image' => true,
        'created' => true,
        'modified' => true,
        'gender' => true,
        'role' => true,
        'activities' => true,
        'announcements' => true,
        'classrooms' => true,
        'exams' => true,
        'fee_students' => true,
        'messages' => true,
        'payments' => true,
        'subjects' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
    
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) 
        {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
