<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @method \App\Model\Entity\Setting newEmptyEntity()
 * @method \App\Model\Entity\Setting newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Setting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Setting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Setting findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Setting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Setting[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Setting|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setting saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SettingsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('server_ip')
            ->maxLength('server_ip', 256)
            ->requirePresence('server_ip', 'create')
            ->notEmptyString('server_ip');

        $validator
            ->scalar('institution_name')
            ->maxLength('institution_name', 256)
            ->requirePresence('institution_name', 'create')
            ->notEmptyString('institution_name');

        $validator
            ->scalar('institution_short_name')
            ->maxLength('institution_short_name', 256)
            ->requirePresence('institution_short_name', 'create')
            ->notEmptyString('institution_short_name');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 256)
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 256)
            ->requirePresence('fax', 'create')
            ->notEmptyString('fax');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 256)
            ->requirePresence('postal_code', 'create')
            ->notEmptyString('postal_code');

        $validator
            ->scalar('box')
            ->maxLength('box', 256)
            ->requirePresence('box', 'create')
            ->notEmptyString('box');

        $validator
            ->scalar('county')
            ->maxLength('county', 256)
            ->requirePresence('county', 'create')
            ->notEmptyString('county');

        $validator
            ->scalar('street')
            ->maxLength('street', 256)
            ->requirePresence('street', 'create')
            ->notEmptyString('street');

        $validator
            ->scalar('email_provider')
            ->maxLength('email_provider', 256)
            ->requirePresence('email_provider', 'create')
            ->notEmptyString('email_provider');

        $validator
            ->scalar('email_host')
            ->maxLength('email_host', 256)
            ->requirePresence('email_host', 'create')
            ->notEmptyString('email_host');

        $validator
            ->scalar('email_username')
            ->maxLength('email_username', 256)
            ->requirePresence('email_username', 'create')
            ->notEmptyString('email_username');

        $validator
            ->scalar('email_port')
            ->maxLength('email_port', 256)
            ->requirePresence('email_port', 'create')
            ->notEmptyString('email_port');

        $validator
            ->scalar('email_password')
            ->maxLength('email_password', 256)
            ->requirePresence('email_password', 'create')
            ->notEmptyString('email_password');

        $validator
            ->scalar('sms_balance')
            ->maxLength('sms_balance', 256)
            ->requirePresence('sms_balance', 'create')
            ->notEmptyString('sms_balance');

        $validator
            ->scalar('sms_provider')
            ->maxLength('sms_provider', 256)
            ->requirePresence('sms_provider', 'create')
            ->notEmptyString('sms_provider');

        $validator
            ->scalar('sms_Url')
            ->maxLength('sms_Url', 256)
            ->requirePresence('sms_Url', 'create')
            ->notEmptyString('sms_Url');

        $validator
            ->scalar('sms_API_Key')
            ->maxLength('sms_API_Key', 256)
            ->requirePresence('sms_API_Key', 'create')
            ->notEmptyString('sms_API_Key');

        $validator
            ->scalar('sms_username')
            ->maxLength('sms_username', 256)
            ->requirePresence('sms_username', 'create')
            ->notEmptyString('sms_username');

        $validator
            ->scalar('sms_invoices')
            ->maxLength('sms_invoices', 256)
            ->requirePresence('sms_invoices', 'create')
            ->notEmptyString('sms_invoices');

        $validator
            ->scalar('sms_receipts')
            ->maxLength('sms_receipts', 256)
            ->requirePresence('sms_receipts', 'create')
            ->notEmptyString('sms_receipts');

        $validator
            ->scalar('sms_passwords')
            ->maxLength('sms_passwords', 256)
            ->requirePresence('sms_passwords', 'create')
            ->notEmptyString('sms_passwords');

        return $validator;
    }
}
