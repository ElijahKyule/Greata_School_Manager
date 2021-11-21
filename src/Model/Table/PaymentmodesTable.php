<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paymentmodes Model
 *
 * @property \App\Model\Table\FeeStudentsTable&\Cake\ORM\Association\HasMany $FeeStudents
 *
 * @method \App\Model\Entity\Paymentmode newEmptyEntity()
 * @method \App\Model\Entity\Paymentmode newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Paymentmode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paymentmode get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paymentmode findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Paymentmode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paymentmode[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paymentmode|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paymentmode saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paymentmode[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentmode[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentmode[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Paymentmode[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaymentmodesTable extends Table
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

        $this->setTable('paymentmodes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('FeeStudents', [
            'foreignKey' => 'paymentmode_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'paymentmode_id',
        ]);
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
