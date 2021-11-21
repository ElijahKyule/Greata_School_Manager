<?php
declare(strict_types=1);

namespace Portal\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \Portal\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
 * @property \Portal\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \Portal\Model\Table\ClassroomstatusesTable&\Cake\ORM\Association\BelongsTo $Classroomstatuses
 * @property \Portal\Model\Table\ClassroomStudentsTable&\Cake\ORM\Association\HasMany $ClassroomStudents
 * @property \Portal\Model\Table\FeeStudentsTable&\Cake\ORM\Association\HasMany $FeeStudents
 * @property \Portal\Model\Table\MessagesTable&\Cake\ORM\Association\HasMany $Messages
 * @property \Portal\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \Portal\Model\Table\StudentActivitiesTable&\Cake\ORM\Association\HasMany $StudentActivities
 * @property \Portal\Model\Table\StudentSubjectMarksTable&\Cake\ORM\Association\HasMany $StudentSubjectMarks
 * @property \Portal\Model\Table\StudentSubjectsTable&\Cake\ORM\Association\HasMany $StudentSubjects
 *
 * @method \Portal\Model\Entity\Student newEmptyEntity()
 * @method \Portal\Model\Entity\Student newEntity(array $data, array $options = [])
 * @method \Portal\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \Portal\Model\Entity\Student get($primaryKey, $options = [])
 * @method \Portal\Model\Entity\Student findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \Portal\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Portal\Model\Entity\Student[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Portal\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Portal\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Portal\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \Portal\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \Portal\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \Portal\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
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
            'className' => 'Portal.Genders',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
            'className' => 'Portal.Statuses',
        ]);
        $this->belongsTo('Classroomstatuses', [
            'foreignKey' => 'classroomstatus_id',
            'joinType' => 'INNER',
            'className' => 'Portal.Classroomstatuses',
        ]);
        $this->hasMany('ClassroomStudents', [
            'foreignKey' => 'student_id',
            'className' => 'Portal.ClassroomStudents',
        ]);
        $this->hasMany('FeeStudents', [
            'foreignKey' => 'student_id',
            'className' => 'Portal.FeeStudents',
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'student_id',
            'className' => 'Portal.Messages',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'student_id',
            'className' => 'Portal.Payments',
        ]);
        $this->hasMany('StudentActivities', [
            'foreignKey' => 'student_id',
            'className' => 'Portal.StudentActivities',
        ]);
        $this->hasMany('StudentSubjectMarks', [
            'foreignKey' => 'student_id',
            'className' => 'Portal.StudentSubjectMarks',
        ]);
        $this->hasMany('StudentSubjects', [
            'foreignKey' => 'student_id',
            'className' => 'Portal.StudentSubjects',
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
            ->scalar('image')
            ->maxLength('image', 256)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

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
