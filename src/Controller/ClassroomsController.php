<?php 
declare(strict_types=1);

namespace App\Controller;

/** 
 * Classrooms Controller
 *
 * @property \App\Model\Table\ClassroomsTable $Classrooms
 * @method \App\Model\Entity\Classroom[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassroomsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    
    public function index()
    { 
        $classrooms = $this->Classrooms->find()
            ->select([
                'id'=>'Classrooms.id',
                'name'=>'Classrooms.name',
                'total'=>'ClassroomStudents.total',
                'level'=>'Levels.level_numeric',
                'stream'=>'Streams.name',
                'user'=>'Users.name',
                'created'=>'Classrooms.created',
                'modified'=>'Classrooms.modified',
            ])
            ->join([
                'Users'=>[
                    'type'=>'left',
                    'table'=>'users',
                    'conditions'=>['Users.id = Classrooms.user_id']
                ],
                'Streams'=>[
                    'type'=>'left',
                    'table'=>'streams',
                    'conditions'=>['Streams.id = Classrooms.stream_id']
                ],
                'Levels'=>[
                    'type'=>'left',
                    'table'=>'levels',
                    'conditions'=>['Levels.id = Classrooms.level_id']
                ],
                'ClassroomStudents'=>[
                    'type'=>'left',
                    'table'=>'(select classroom_id, classroomstatus_id, count(*) as total from  classroom_students where classroomstatus_id = 1 group by classroom_id)',
                    'conditions'=>['ClassroomStudents.classroom_id = Classrooms.id']
                ]
            ]);
        $this->set(compact('classrooms'));

    }

    /**
     * View method, 
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $tab = $this->request->getQuery('tab'); 
        $this->loadModel('ClassroomStudents');
        $this->loadModel('Messages');
        $this->loadModel('ClassroomActivities');
        $this->loadModel('Subjects');
        $this->loadModel('Exams');
        $this->loadModel('StudentSubjectMarks');
        $classroom = $this->Classrooms->get($id, [
            'contain' => ['Users', 'Streams', 'Levels', 'ClassroomStudents'=>['Classrooms', 'Students', 'Classroomstatuses']],
        ]);
        $classrooms = $this->Classrooms->find()
            ->select([
                'id'=>'ClassroomStudents.id',
                'student_name'=>'Students.name',
                'student_id'=>'Students.id', 
                'status_name'=>'Classroomstatuses.name',
                'adm_no'=>'Students.admission_number',
                'created'=>'ClassroomStudents.created',
                'modified'=>'ClassroomStudents.modified',
            ])
            ->join([
                'ClassroomStudents'=>[
                    'type'=>'left', 
                    'table'=>'classroom_students',
                    'conditions'=>['ClassroomStudents.classroom_id = Classrooms.id']
                ],
                'Students'=>[
                    'type'=>'left',
                    'table'=>'students',
                    'conditions'=>['Students.id = ClassroomStudents.student_id']
                ],
                'Classroomstatuses'=>[
                    'type'=>'left',
                    'table'=>'classroomstatuses',
                    'conditions'=>['Classroomstatuses.id = ClassroomStudents.classroomstatus_id']
                ],
            ])
            ->where(['ClassroomStudents.classroom_id'=>$id, 'ClassroomStudents.classroomstatus_id'=>1]);

        $messages = $this->Messages->find() 
            ->select([
                'id'=>'Messages.id',
                'title'=>'Messages.title',
                'student'=>'Students.name',
                'user'=>'Users.name',
                'messagestatus'=>'Messagestatuses.name',
                'created'=>'Messages.created',
                'modified'=>'Messages.modified',
            ])
            ->join([
                'ClassroomStudents'=>[
                    'type'=>'left', 
                    'table'=> 'classroom_students',
                    'conditions'=>['ClassroomStudents.student_id = Messages.student_id']
                ],
                'Students'=>[
                    'type'=>'left',
                    'table'=>'students',
                    'conditions'=>['Students.id = Messages.student_id']
                ],
                'Users'=>[
                    'type'=>'left',
                    'table'=>'users',
                    'conditions'=>['Users.id = Messages.user_id']
                ],
                'Messagestatuses'=>[
                    'type'=>'left',
                    'table'=>'messagestatuses',
                    'conditions'=>['Messagestatuses.id = Messages.messagestatus_id']
                ]
            ])
            ->where(['ClassroomStudents.classroom_id'=>$id, 'ClassroomStudents.classroomstatus_id'=>1]);

        $classroom_activities = $this->ClassroomActivities->find() 
            ->select([
                'id'=>'ClassroomActivities.id',
                'activity_name'=>'Activities.name',
                'status_name'=>'Statuses.name',
                'start'=>'ClassroomActivities.start',
                'end'=>'ClassroomActivities.end',
                'achieved'=>'ClassroomActivities.achieved',
                'measure_name'=>'Measures.name',
                'created'=>'ClassroomActivities.created',
                'modified'=>'ClassroomActivities.modified',
            ])
            ->join([
                'Classrooms'=>[
                    'type'=>'left', 
                    'table'=> 'classrooms',
                    'conditions'=>['Classrooms.id = ClassroomActivities.classroom_id']
                ],
                'Activities'=>[
                    'type'=>'left',
                    'table'=>'activities',
                    'conditions'=>['Activities.id = ClassroomActivities.activity_id']
                ],
                'Statuses'=>[
                    'type'=>'left',
                    'table'=>'statuses',
                    'conditions'=>['Statuses.id = ClassroomActivities.status_id']
                ],
                'Measures'=>[
                    'type'=>'left',
                    'table'=>'measures',
                    'conditions'=>['Measures.id = ClassroomActivities.measure_id']
                ]
            ])
            ->where(['ClassroomActivities.classroom_id'=>$id]);
        $subjects = $this->paginate($this->Subjects);

        $class_students_count = $this->ClassroomStudents->find()
            ->select(['student_id'])
            ->where(['classroomstatus_id' => 1, 'classroom_id'=> $id])
            ->count();
        $selected_class_levels = $this->Classrooms->find()
            ->select(['level_id'])
            ->where(['id' => $id])
            ->first();
        $class_level_id = $selected_class_levels->level_id;
        
        $classroomStudent = $this->ClassroomStudents->newEmptyEntity();         
        $classrooms_id = $this->ClassroomStudents->Classrooms->find('list', ['limit' => 200]);
        $classroom_id = $this->ClassroomStudents->Classrooms->find('list', ['limit' => 200])->where(['id'=>$id]);
        $exams = $this->Exams->find('list', ['limit' => 200])->where(['level_id'=>$class_level_id, 'status_id'=>1]);
        $studentSubjectMark = $this->StudentSubjectMarks->newEmptyEntity();
        $this->set(compact('classroom', 'tab', 'id', 'classrooms','class_students_count', 'classroomStudent', 'classrooms_id', 'classroom_id', 'messages', 'classroom_activities', 'subjects', 'exams', 'studentSubjectMark'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classroom = $this->Classrooms->newEmptyEntity();
        if ($this->request->is('post')) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The classroom has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classroom could not be saved. Please, try again.'));
        }
        $users = $this->Classrooms->Users->find('list', ['limit' => 200])->where(['role_id'=>2]);
        $levels = $this->Classrooms->Levels->find('list', ['limit' => 200]);
        $streams = $this->Classrooms->Streams->find('list', ['limit' => 200]);
        $this->set(compact('classroom', 'users', 'streams', 'levels'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addClassroom($id)
    {
        $classroom = $this->Classrooms->newEmptyEntity();
        if ($this->request->is('post')) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The classroom has been saved.'));

                return $this->redirect(['controller'=>'Users','action'=>'view',$id, '?'=>['tab'=>'classrooms']]);
            }
            $this->Flash->error(__('The classroom could not be saved. Please, try again.'));
        }
        $users = $this->Classrooms->Users->find('list', ['limit' => 200])->where(['id'=>$id]);
        $levels = $this->Classrooms->Levels->find('list', ['limit' => 200]);
        $streams = $this->Classrooms->Streams->find('list', ['limit' => 200]);
        $this->set(compact('classroom', 'users', 'streams', 'levels', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classroom = $this->Classrooms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The classroom has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The classroom could not be saved. Please, try again.'));
        }
        $users = $this->Classrooms->Users->find('list', ['limit' => 200]);
        $levels = $this->Classrooms->Levels->find('list', ['limit' => 200]);
        $streams = $this->Classrooms->Streams->find('list', ['limit' => 200]);
        $this->set(compact('classroom', 'users', 'streams', 'levels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editClassroom($id)
    {
        $classroom = $this->Classrooms->get($id, [
            'contain' => [],
        ]);
        $selected_users = $this->Classrooms->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $selected_user = $selected_users->user_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classroom = $this->Classrooms->patchEntity($classroom, $this->request->getData());
            if ($this->Classrooms->save($classroom)) {
                $this->Flash->success(__('The classroom has been saved.'));

                return $this->redirect(['controller'=>'Users','action'=>'view',$selected_user,'?'=>['tab'=>'classrooms']]);
            }
            $this->Flash->error(__('The classroom could not be saved. Please, try again.'));
        }
        $users = $this->Classrooms->Users->find('list', ['limit' => 200]);
        $levels = $this->Classrooms->Levels->find('list', ['limit' => 200]);
        $streams = $this->Classrooms->Streams->find('list', ['limit' => 200]);
        $this->set(compact('classroom', 'users', 'streams', 'levels', 'selected_user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classroom = $this->Classrooms->get($id);
        if ($this->Classrooms->delete($classroom)) {
            $this->Flash->success(__('The classroom has been deleted.'));
        } else {
            $this->Flash->error(__('The classroom could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Classroom id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteClassroom($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selected_users = $this->Classrooms->find()
            ->select(['user_id'])
            ->where(['id' => $id])
            ->first();
        $selected_user = $selected_users->user_id;
        $classroom = $this->Classrooms->get($id);
        if ($this->Classrooms->delete($classroom)) {
            $this->Flash->success(__('The classroom has been deleted.'));
        } else {
            $this->Flash->error(__('The classroom could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Users','action'=>'view',$selected_user,'?'=>['tab'=>'classrooms']]);
    }
}
