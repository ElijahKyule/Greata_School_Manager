<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FeeStructureParameters Model
 *
 * @property \App\Model\Table\FeeStructuresTable&\Cake\ORM\Association\HasMany $FeeStructures
 *
 * @method \App\Model\Entity\FeeStructureParameter newEmptyEntity()
 * @method \App\Model\Entity\FeeStructureParameter newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FeeStructureParameter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FeeStructureParameter get($primaryKey, $options = [])
 * @method \App\Model\Entity\FeeStructureParameter findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FeeStructureParameter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FeeStructureParameter[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FeeStructureParameter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeeStructureParameter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeeStructureParameter[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeeStructureParameter[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeeStructureParameter[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeeStructureParameter[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FeeStructureParametersTable extends Table
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

        $this->setTable('fee_structure_parameters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('FeeStructures', [
            'foreignKey' => 'fee_structure_parameter_id',
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

        $validator
            ->scalar('code')
            ->maxLength('code', 20)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        return $validator;
    }
}
