<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Examtypes Model
 *
 * @property \App\Model\Table\ExamsTable&\Cake\ORM\Association\HasMany $Exams
 *
 * @method \App\Model\Entity\Examtype newEmptyEntity()
 * @method \App\Model\Entity\Examtype newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Examtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Examtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Examtype findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Examtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Examtype[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Examtype|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examtype saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Examtype[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Examtype[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Examtype[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Examtype[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExamtypesTable extends Table
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

        $this->setTable('examtypes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Exams', [
            'foreignKey' => 'examtype_id',
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
            ->integer('score_out_of')
            ->requirePresence('score_out_of', 'create')
            ->notEmptyString('score_out_of');

        return $validator;
    }
}
