<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Measures Model
 *
 * @property \App\Model\Table\ClassroomActivitiesTable&\Cake\ORM\Association\HasMany $ClassroomActivities
 * @property \App\Model\Table\EmployeeLeavesTable&\Cake\ORM\Association\HasMany $EmployeeLeaves
 * @property \App\Model\Table\ExamSubjectsTable&\Cake\ORM\Association\HasMany $ExamSubjects
 * @property \App\Model\Table\StudentActivitiesTable&\Cake\ORM\Association\HasMany $StudentActivities
 *
 * @method \App\Model\Entity\Measure newEmptyEntity()
 * @method \App\Model\Entity\Measure newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Measure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Measure get($primaryKey, $options = [])
 * @method \App\Model\Entity\Measure findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Measure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Measure[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Measure|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Measure saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Measure[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Measure[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Measure[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Measure[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MeasuresTable extends Table
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

        $this->setTable('measures');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ClassroomActivities', [
            'foreignKey' => 'measure_id',
        ]);
        $this->hasMany('EmployeeLeaves', [
            'foreignKey' => 'measure_id',
        ]);
        $this->hasMany('ExamSubjects', [
            'foreignKey' => 'measure_id',
        ]);
        $this->hasMany('StudentActivities', [
            'foreignKey' => 'measure_id',
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
            ->scalar('abbreviation')
            ->maxLength('abbreviation', 50)
            ->requirePresence('abbreviation', 'create')
            ->notEmptyString('abbreviation');

        return $validator;
    }
}
