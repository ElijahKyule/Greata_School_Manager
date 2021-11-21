<?php 
declare(strict_types=1);

namespace App\Controller;

/**
 * ClassroomStudents Controller
 *
 * @property \App\Model\Table\ClassroomStudentsTable $ClassroomStudents
 * @method \App\Model\Entity\ClassroomStudent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClassroomStudentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id)
    {
        $tab = $this->request->getQuery('tab'); 
        $this->paginate = [ 
            'contain' => ['Classrooms', 'Students'],
            'conditions'=>['classroom_id'=>$id, 'classroomstatus_id'=>1]
        ];
        
        $classroomstatuses = $this->ClassroomStudents->Classroomstatuses->find('list', ['limit' => 200])->where(['id'=>1]);
        $classroomStudents = $this->paginate($this->ClassroomStudents);
        $classroomStudentsNames = $this->ClassroomStudents->Classrooms->find()->select(['name'])->where(['id' => $id])->first();
        $classroomStudentsName =$classroomStudentsNames->name;
        
        $this->paginate = [
            'contain' => ['Students', 'Users', 'Messagestatuses'],
        ];
        
        $this->set(compact('classroomStudents', 'classroomStudentsName', 'id', 'classroomstatuses', 'tab'));

    }

    /**
     * View method
     *
     * @param string|null $id Classroom Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classroomStudent = $this->ClassroomStudents->get($id, [
            'contain' => ['Classrooms', 'Students', 'Classroomstatuses'],
        ]); 
        $classroomStudent->classroom_id =$id;
        $this->set(compact('classroomStudent', 'id'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $classroomStudent = $this->ClassroomStudents->newEmptyEntity();
        $this->loadModel('Students');
        if ($this->request->is('post')) 
        { 
            $student_id = $this->request->getData('student_id');
            $classroom_students_auth = $this->ClassroomStudents->find()
                ->select(['id'])
                ->where(['student_id' => $student_id])
                ->count();
            if ($classroom_students_auth == 0) 
            {
                $change_old_classroom_status = $this->Students->query()
                    ->update()
                    ->set(['classroomstatus_id' => 1])
                    ->where(['id'=> $student_id])
                    ->execute();
                $classroomStudent = $this->ClassroomStudents->patchEntity($classroomStudent, $this->request->getData());
                $classroomStudent->classroomstatus_id = 1;
                $save_student = $this->ClassroomStudents->save($classroomStudent);
                if ($change_old_classroom_status && $save_student) 
                {
                    $this->Flash->success(__('The classroom student has been saved.'));

                    return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $id, '?'=>['tab'=>'classlist']]);
                }
                $this->Flash->error(__('The classroom student could not be saved. Please, try again.'));
            }
            
        }

        $classrooms = $this->ClassroomStudents->Classrooms->find('list', ['limit' => 200])->where(['id'=>$id]);
        $students = $this->ClassroomStudents->Students->find('list', ['limit' => 200])->where(['classroomstatus_id'=>3, 'status_id'=>1]);
        $classroomstatuses = $this->ClassroomStudents->Classroomstatuses->find('list', ['limit' => 200])->where(['id'=>1]);
        $this->set(compact('classroomStudent','classrooms', 'students', 'classroomstatuses', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Classroom Student id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $classroomStudent = $this->ClassroomStudents->get($id, [
            'contain' => [],
        ]);
        $authenticate_classrooms = $this->ClassroomStudents->find()
            ->select(['classroom_id'])
            ->where(['id' => $id])
            ->first();
        $authenticate_classroom = $authenticate_classrooms->classroom_id;
        $authenticate_students = $this->ClassroomStudents->find()
            ->select(['student_id'])
            ->where(['id' => $id])
            ->first();
        $authenticate_student = $authenticate_students->student_id;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classroomStudent = $this->ClassroomStudents->patchEntity($classroomStudent, $this->request->getData());
            if ($this->ClassroomStudents->save($classroomStudent)) {
                $this->Flash->success(__('The classroom student has been saved.'));

                return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $classroomStudent->classroom_id, '?'=>['tab'=>'classlist']]);
            }
            $this->Flash->error(__('The classroom student could not be saved. Please, try again.'));
        }
        $classroomStudent->classroom_id =$id;
        $classrooms = $this->ClassroomStudents->Classrooms->find('list', ['limit' => 200])->where(['id'=>$authenticate_classroom]);
        $students = $this->ClassroomStudents->Students->find('list', ['limit' => 200])->where(['id'=>$authenticate_student]);
        $classroomstatuses = $this->ClassroomStudents->Classroomstatuses->find('list', ['limit' => 200]);
        $this->set(compact('classroomStudent', 'classrooms', 'students', 'classroomstatuses', 'id', 'authenticate_classroom', 'authenticate_student'));
    }

    /**
     * PromoteClass method
     *
     * @param string|null $id Classroom Student id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function promoteClass($id)
    {   
        $classroomStudent = $this->ClassroomStudents->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $current_classroom_id = $this->request->getData('classroom');
            $destination_classroom_id = $this->request->getData('classroom_id');
            $classroomstatus_id = 1;

            $current_class_students_count = $this->ClassroomStudents->find()
                ->select(['student_id'])
                ->where(['classroomstatus_id' => 1, 'classroom_id'=> $current_classroom_id])
                ->count();
            if ($current_class_students_count > 0) 
            {
                $dest_class_students_count = $this->ClassroomStudents->find()
                    ->select(['student_id'])
                    ->where(['classroomstatus_id' => 1, 'classroom_id'=> $destination_classroom_id])
                    ->count();
                if ($dest_class_students_count == 0) 
                {
                    $student_ids = $this->ClassroomStudents->find()
                        ->select(['student_id'])
                        ->where(['classroom_id'=>$current_classroom_id, 'classroomstatus_id'=>1])
                        ->toArray();

                    foreach ($student_ids as $student_id) 
                    {
                        $student = $student_id->student_id;
                        $changeOldStatus = $this->ClassroomStudents->query()
                            ->update()
                            ->set(['classroomstatus_id' => 2])
                            ->where(['classroomstatus_id' => 1, 'classroom_id'=> $current_classroom_id])
                            ->execute();
                        $classroomStudent = $this->ClassroomStudents->newEmptyEntity();
                        $classroomStudent = $this->ClassroomStudents->patchEntity($classroomStudent, $this->request->getData());
                        $classroomStudent->student_id = $student_id->student_id;
                        $classroomStudent->classroomstatus_id = $classroomstatus_id;
                        $classroomStudent->classroom_id = $destination_classroom_id;
                        $promote = $this->ClassroomStudents->save($classroomStudent);
                    }
                    $dest_class_students_new_count = $this->ClassroomStudents->find()
                        ->select(['student_id'])
                        ->where(['classroomstatus_id' => 1, 'classroom_id'=> $destination_classroom_id])
                        ->count();
                    $current_class_students_new_count = $this->ClassroomStudents->find()
                        ->select(['student_id'])
                        ->where(['classroomstatus_id' => 1, 'classroom_id'=> $current_classroom_id])
                        ->count();
                    if (($dest_class_students_new_count == $current_class_students_count) && ($current_class_students_new_count == 0))
                    {
                        $this->Flash->success(__('The classroom student has been promoted successfully.'));
                        return $this->redirect(['controller'=>'Classrooms','action'=>'view',$current_classroom_id, '?'=>['tab'=>'classlist']]);
                    }
                }
                elseif ($dest_class_students_count > 0) 
                {
                    $this->Flash->error(__('The classroom student could not be promoted. Destination class already contains students.'));
                    return $this->redirect(['controller'=>'Classrooms','action'=>'view',$current_classroom_id, '?'=>['tab'=>'promoteclass']]);
                }
            }
            elseif ($current_class_students_count == 0) 
            {
                $this->Flash->error(__('The classroom student could not be promoted. It contains 0 students.'));
                return $this->redirect(['controller'=>'Classrooms','action'=>'view',$current_classroom_id, '?'=>['tab'=>'promoteclass']]);
            }
            
        }
        $this->Flash->error(__('The classroom student could not be saved. Please, try again.'));
    }

    public function promoteStudent($id)
    {
        $classroomStudent = $this->ClassroomStudents->newEmptyEntity();
        $this->request->allowMethod(['post', 'delete']);
        if ($this->request->is('post')) {
            $destination_classroom_id = $this->request->getData('classroom_id');
            $current_classroom_id = $this->request->getData('classrooms');
            $student_id = $id;
            $changeOldStatus = $this->ClassroomStudents->query()
                ->update()
                ->set(['classroomstatus_id' => 2])
                ->where(['student_id' => $student_id, 'classroom_id'=> $current_classroom_id])
                ->execute();
            $classroomStudent = $this->ClassroomStudents->patchEntity($classroomStudent, $this->request->getData());
            $classroomStudent->student_id = $student_id; 
            if (($changeOldStatus) && ($this->ClassroomStudents->save($classroomStudent))) {
                $this->Flash->success(__('The student has been promoted.'));
                return $this->redirect(['controller'=>'Students', 'action' => 'view', $student_id, '?'=>['tab'=>'classrooms']]);
            }
            $this->Flash->error(__('The student could not be promoted. Please, try again.'));
        }
    }
    public function freeClass($id)
    {
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $classroom_id = $this->request->getData('classroom_id');
            $classroomstatus_id = 2;
            $authenticate_classroom = $this->ClassroomStudents->find()
                ->select(['id'])
                ->where(['classroom_id' => $classroom_id, 'classroomstatus_id'=>1])
                ->count();
            if ($authenticate_classroom > 0) 
            {
                $student_ids = $this->ClassroomStudents->find()
                    ->select(['student_id'])
                    ->where(['classroomstatus_id' => 1, 'classroom_id'=> $classroom_id])
                    ->toArray();

                foreach ($student_ids as $student_id) 
                {
                    $student = $student_id->student_id;
                    $this->loadModel('Students');
                    $deactivate = $this->Students->query()
                        ->update()
                        ->set(['status_id' => 2, 'classroomstatus_id'=>4])
                        ->where(['id' => $student])
                        ->execute();
                }
                $free = $this->ClassroomStudents->query()
                    ->update()
                    ->set(['classroomstatus_id' => $classroomstatus_id])
                    ->where(['classroomstatus_id' => 1, 'classroom_id'=> $classroom_id])
                    ->execute();
                
                if ($free) 
                {
                    $this->Flash->success(__('The classroom student has been freed.'));
                    return $this->redirect(['controller'=>'ClassroomStudents', 'action' => 'index', $classroom_id, '?'=>['tab'=>'classlist']]);
                } 
            }
            elseif ($authenticate_classroom == 0) 
            {
                $this->Flash->error(__('The classroom student could not be freed. It is already empty.'));
                return $this->redirect(['controller'=>'ClassroomStudents', 'action' => 'index', $classroom_id, '?'=>['tab'=>'freeclass']]);
            }
            
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Classroom Student id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('Students');
        $authenticate_classrooms = $this->ClassroomStudents->find()
            ->select(['classroom_id'])
            ->where(['id' => $id])
            ->first();
        $authenticate_classroom = $authenticate_classrooms->classroom_id;
        $authenticate_students = $this->ClassroomStudents->find()
            ->select(['student_id'])
            ->where(['id' => $id])
            ->first();
        $authenticate_student = $authenticate_students->student_id;
        $auth_class_statuses = $this->ClassroomStudents->find()
            ->select(['classroomstatus_id'])
            ->where(['id' => $id])
            ->first();
        $auth_class_status = $auth_class_statuses->classroomstatus_id;
        $classroomStudent = $this->ClassroomStudents->get($id);
        if ($auth_class_status == 1) 
        {
            $change_old_classroom_status = $this->Students->query()
                ->update()
                ->set(['classroomstatus_id' => 3])
                ->where(['id'=> $authenticate_student])
                ->execute();
            $delete_classroom_student = $this->ClassroomStudents->delete($classroomStudent);
            if ($change_old_classroom_status && $delete_classroom_student) 
            {
                $this->Flash->success(__('The classroom student has been deleted.'));
            } 
            else 
            {
                $this->Flash->error(__('The classroom student could not be deleted. Please, try again.'));
            }
            return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $authenticate_classroom, '?'=>['tab'=>'classlist']]);
        }
        else
        {
            if ($this->ClassroomStudents->delete($classroomStudent)) 
            {
                $this->Flash->success(__('The classroom student has been deleted.'));
            } 
            else 
            {
                $this->Flash->error(__('The classroom student could not be deleted. Please, try again.'));
            }

            return $this->redirect(['controller'=>'Classrooms', 'action' => 'view', $authenticate_classroom, '?'=>['tab'=>'classlist']]);
        }
        
        
    }
    public function deleteStudent($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('Students');
        $authenticate_classrooms = $this->ClassroomStudents->find()
            ->select(['classroom_id'])
            ->where(['id' => $id])
            ->first();
        $authenticate_classroom = $authenticate_classrooms->classroom_id;
        $authenticate_students = $this->ClassroomStudents->find()
            ->select(['student_id'])
            ->where(['id' => $id])
            ->first();
        $authenticate_student = $authenticate_students->student_id;
        $auth_class_statuses = $this->ClassroomStudents->find()
            ->select(['classroomstatus_id'])
            ->where(['id' => $id])
            ->first();
        $auth_class_status = $auth_class_statuses->classroomstatus_id;
        $classroomStudent = $this->ClassroomStudents->get($id);
        if ($auth_class_status == 1) 
        {
            $change_old_classroom_status = $this->Students->query()
                ->update()
                ->set(['classroomstatus_id' => 3])
                ->where(['id'=> $authenticate_student])
                ->execute();
            $delete_classroom_student = $this->ClassroomStudents->delete($classroomStudent);
            if ($change_old_classroom_status && $delete_classroom_student) 
            {
                $this->Flash->success(__('The classroom student has been deleted.'));
            } 
            else 
            {
                $this->Flash->error(__('The classroom student could not be deleted. Please, try again.'));
            }
            return $this->redirect(['controller'=>'Students', 'action' => 'view', $authenticate_student, '?'=>['tab'=>'classrooms']]);
        }
        else
        {
            if ($this->ClassroomStudents->delete($classroomStudent)) 
            {
                $this->Flash->success(__('The classroom student has been deleted.'));
            } 
            else 
            {
                $this->Flash->error(__('The classroom student could not be deleted. Please, try again.'));
            }

            return $this->redirect(['controller'=>'Students', 'action' => 'view', $authenticate_student, '?'=>['tab'=>'classrooms']]);
        }
        
        
    }
}
