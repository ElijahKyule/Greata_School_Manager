<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\ClassroomstatusesTable&\Cake\ORM\Association\BelongsTo $Classroomstatuses
 * @property \App\Model\Table\ClassroomStudentsTable&\Cake\ORM\Association\HasMany $ClassroomStudents
 * @property \App\Model\Table\FeeStudentsTable&\Cake\ORM\Association\HasMany $FeeStudents
 * @property \App\Model\Table\MessagesTable&\Cake\ORM\Association\HasMany $Messages
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\StudentActivitiesTable&\Cake\ORM\Association\HasMany $StudentActivities
 * @property \App\Model\Table\StudentSubjectMarksTable&\Cake\ORM\Association\HasMany $StudentSubjectMarks
 * @property \App\Model\Table\StudentSubjectsTable&\Cake\ORM\Association\HasMany $StudentSubjects
 *
 * @method \App\Model\Entity\Student newEmptyEntity()
 * @method \App\Model\Entity\Student newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsTable extends Table
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

        $this->setTable('students');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Classroomstatuses', [
            'foreignKey' => 'classroomstatus_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ClassroomStudents', [
            'foreignKey' => 'student_id',
        ]);
        $this->hasMany('FeeStudents', [
            'foreignKey' => 'student_id',
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'student_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'student_id',
        ]);
        $this->hasMany('StudentActivities', [
            'foreignKey' => 'student_id',
        ]);
        $this->hasMany('StudentSubjectMarks', [
            'foreignKey' => 'student_id',
        ]);
        $this->hasMany('StudentSubjects', [
            'foreignKey' => 'student_id',
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create') 
            ->notEmptyString('email');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 50)
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->scalar('admission_number')
            ->maxLength('admission_number', 20)
            ->requirePresence('admission_number', 'create')
            ->notEmptyString('admission_number');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmptyDate('date_of_birth');

        $validator
            ->scalar('address')
            ->maxLength('address', 100)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('password')
            ->maxLength('password', 256)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');
        $validator
            ->date('admission_date')
            ->requirePresence('admission_date', 'create')
            ->notEmptyDate('admission_date');

        $validator
            ->allowEmptyFile('image', null, 'create')
            ->allowEmptyFile('image', null, 'update')
            ->add('image', [
            'mimeType'=>[
                'rule'=>[ 'mimeType', ['image/jpg', 'image/jpeg', 'image/png'] ],
                'message'=>'Please upload .jpg, .jpeg or .png files only'
            ],
            'fileSize'=>[
                'rule'=>['fileSize', '<=', '1MB'],
                'message'=>'Image file size must be below 1MB of size',
            ],
        ]);
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['gender_id'], 'Genders'), ['errorField' => 'gender_id']);
        $rules->add($rules->existsIn(['status_id'], 'Statuses'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn(['classroomstatus_id'], 'Classroomstatuses'), ['errorField' => 'classroomstatus_id']);

        return $rules;
    }
}
