<?php
declare(strict_types=1); 

namespace App\Controller\Portal;

use App\Controller\Portal\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Genders', 'Statuses', 'Classroomstatuses'],
        ];
        $students = $this->paginate($this->Students);

        $this->set(compact('students'));
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewProfile($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Genders', 'Statuses', 'Classroomstatuses', 'ClassroomStudents', 'FeeStudents', 'Messages', 'Payments', 'StudentActivities', 'StudentSubjectMarks', 'StudentSubjects'],
        ]);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $email = $this->request->getData('email');
            $old_password = $this->request->getData('old_password');
            $new_password = $this->request->getData('new_password');
            $verify_password = $this->request->getData('verify_password');
            if ((new DefaultPasswordHasher)->check($old_password, $student->password)) 
            { 
                if ($new_password == $verify_password) {
                    $new_password =  (new DefaultPasswordHasher())->hash($new_password);
                    $changepass = $this->Students->query()
                        ->update()
                        ->set(['password' => $new_password])
                        ->where(['id'=> $id])
                        ->execute();
                    if ($changepass) 
                    {
                        $this->Flash->success(__('Password has been changed successfully. Login again'));
                        $this->Authentication->logout();
                        return $this->redirect(['controller' => 'Students', 'action' => 'login']);
                    }
                }
                else
                {
                    $this->Flash->error(__('Sorry! Password mismatch. Try again.'));
                }
            }  
            else
            {
                $this->Flash->error(__('Sorry! You provided the wrong password. Try again.'));
            }
            
        }

        $this->set(compact('student', 'id'));
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewSubjects($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Genders', 'Statuses', 'Classroomstatuses', 'ClassroomStudents', 'FeeStudents', 'Messages', 'Payments', 'StudentActivities', 'StudentSubjectMarks', 'StudentSubjects'=>['Subjects'=>['Users']]],
        ]);

        $this->set(compact('student'));
    }

     /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewPayments($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Genders', 'Statuses', 'Classroomstatuses', 'ClassroomStudents', 'FeeStudents', 'Messages', 'Payments'=>['Paymentmodes', 'Users'], 'StudentActivities', 'StudentSubjectMarks', 'StudentSubjects'=>['Subjects'=>['Users']]],
        ]);

        $this->set(compact('student'));
    }

     /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewExams($id = null)
    {
        $this->loadModel('Grades');
        $this->loadModel('Classrooms');
        $this->loadModel('ClassroomStudents');
        $this->loadModel('StudentSubjectMarks');
        $grades = $this->paginate($this->Grades);
        $current_class_ids = $this->Students->ClassroomStudents->find()
            ->select(['classroom_id'])
            ->where(['student_id' => $id, 'classroomstatus_id'=> 1])
            ->first();
        $current_class_id = $current_class_ids->classroom_id;
        $current_stream_count = $this->Students->ClassroomStudents->find()
            ->select(['id'])
            ->where(['classroom_id' => $current_class_id, 'classroomstatus_id'=> 1])
            ->count();
        $current_level_ids = $this->Students->ClassroomStudents->Classrooms->find()
            ->select(['level_id'])
            ->where(['id' => $current_class_id])
            ->first();
        $current_level_id = $current_level_ids->level_id;
        $classrooms = $this->paginate($this->Classrooms);
        //calculate level count
        $current_level_count = 0;
        foreach ($classrooms as $classroom) 
        {
            if ($current_level_id == $classroom->level_id) 
            {
                $current_level_count = $current_level_count + ($this->Students->ClassroomStudents->find()
                    ->select(['id'])
                    ->where(['classroom_id' => $classroom->id, 'classroomstatus_id'=> 1])
                    ->count());
            }
        }
        $exams =$this->Students->StudentSubjectMarks->Exams->find('list', ['limit' => 200])->where(['level_id'=>$current_level_id, 'status_id'=>1]);
            
            $stream_posn = 0; //stream position
            $level_posn = 0; //level position
            $marks_arr = array(); //stream array marks
            $marks_level_arr = array(); //level array marks
            if ($this->request->is(['patch', 'post', 'put']))
            {
                $filtered_exam = $this->request->getData('exam_id');
                //rank students stream
                $this->paginate = [
                    'conditions'=>['classroom_id'=>$current_class_id, 'classroomstatus_id'=>1]
                ];
                $classroomStudents = $this->paginate($this->ClassroomStudents);
                foreach ($classroomStudents as $classroomStudent) 
                {
                    $total_marks = $this->Students->StudentSubjectMarks->find()
                        ->select(['total_marks'=>'sum(marks)'])
                        ->where(['student_id'=>$classroomStudent->student_id,'classroom_id'=>$current_class_id,'exam_id'=>$filtered_exam])
                        ->first();
                    
                    $total_marks = $total_marks->total_marks;
                    if ($total_marks != null) 
                    {
                        array_push($marks_arr, $total_marks);
                    }
                }
                rsort($marks_arr);
                $student_marks = $this->Students->StudentSubjectMarks->find()
                    ->select(['student_marks'=>'sum(marks)'])
                    ->where(['student_id'=>$id,'classroom_id'=>$current_class_id,'exam_id'=>$filtered_exam])
                    ->first();
                $student_marks = $student_marks->student_marks;
                if (count($marks_arr) > 0) 
                {
                    $stream_posn = array_search($student_marks, $marks_arr) + 1;
                }
                else
                {
                    $stream_posn = 0;
                }
                //end rank students stream

                //rank students level
                foreach ($classrooms as $classroom) 
                {
                    
                    if ($current_level_id == $classroom->level_id) 
                    {
                        $this->paginate = [
                            'conditions'=>['classroom_id'=>$classroom->id, 'classroomstatus_id'=>1]
                        ];
                        $classroomStudents = $this->paginate($this->ClassroomStudents);
                        foreach ($classroomStudents as $classroomStudent) 
                        {
                            $total_marks = $this->Students->StudentSubjectMarks->find()
                                ->select(['total_marks'=>'sum(marks)'])
                                ->where(['student_id'=>$classroomStudent->student_id,'classroom_id'=>$classroom->id,'exam_id'=>$filtered_exam])
                                ->first();
                            
                            $total_marks = $total_marks->total_marks;
                            if ($total_marks != null) 
                            {
                                array_push($marks_level_arr, $total_marks);
                            }
                        }
                    }
                }
                rsort($marks_level_arr);
                $student_marks = $this->Students->StudentSubjectMarks->find()
                    ->select(['student_marks'=>'sum(marks)'])
                    ->where(['student_id'=>$id,'classroom_id'=>$current_class_id,'exam_id'=>$filtered_exam])
                    ->first();
                $student_marks = $student_marks->student_marks;
                if (count($marks_level_arr) > 0) 
                {
                    $level_posn = array_search($student_marks, $marks_level_arr) + 1;
                }
                else
                {
                    $level_posn = 0;
                }
                //end rank students level
                
                $studentSubjectMarks = $this->Students->StudentSubjectMarks->find()
                ->select([
                    'id'=>'StudentSubjectMarks.id',
                    'subject'=>'Subjects.name',
                    'code'=>'Subjects.code',
                    'exam'=>'Exams.exam_code',
                    'class'=>'Classrooms.name',
                    'marks'=>'StudentSubjectMarks.marks',
                    'grade'=>'Grades.name',
                    'user'=>'Users.name',
                    'comments'=>'Grades.comments',
                    'created'=>'StudentSubjectMarks.created',
                    'modified'=>'StudentSubjectMarks.modified',
                ])
                ->join([
                    'Exams'=>[
                        'type'=>'left',
                        'table'=>'exams',
                        'conditions'=>['Exams.id = StudentSubjectMarks.exam_id']
                    ],
                    'Classrooms'=>[
                        'type'=>'left',
                        'table'=>'classrooms',
                        'conditions'=>['Classrooms.id = StudentSubjectMarks.classroom_id']
                    ],
                    'Grades'=>[
                        'type'=>'left',
                        'table'=>'grades',
                        'conditions'=>['Grades.id = StudentSubjectMarks.grade_id']
                    ],
                    'StudentSubjects'=>[
                        'type'=>'left',
                        'table'=>'(select id, subject_id from student_subjects)',
                        'conditions'=>['StudentSubjects.id = StudentSubjectMarks.student_subject_id']
                    ],
                    'Subjects'=>[
                        'type'=>'left',
                        'table'=>'subjects',
                        'conditions'=>['Subjects.id = StudentSubjects.subject_id']
                    ],
                    'Users'=>[
                        'type'=>'left',
                        'table'=>'users',
                        'conditions'=>['Users.id = Subjects.user_id']
                    ],
                    'Students'=>[
                        'type'=>'left',
                        'table'=>'students',
                        'conditions'=>['Students.id = StudentSubjectMarks.student_id']
                    ],
                ])
                ->where(['Exams.id'=>$filtered_exam, 'Students.id'=>$id]);
            }
            else
            {
                $studentSubjectMarks = $this->Students->StudentSubjectMarks->find()
                ->select([
                    'id'=>'StudentSubjectMarks.id',
                    'subject'=>'Subjects.name',
                    'exam'=>'Exams.exam_code',
                    'class'=>'Classrooms.name',
                    'marks'=>'StudentSubjectMarks.marks',
                    'created'=>'StudentSubjectMarks.created',
                    'modified'=>'StudentSubjectMarks.modified',
                ])
                ->join([
                    'Exams'=>[
                        'type'=>'left',
                        'table'=>'exams',
                        'conditions'=>['Exams.id = StudentSubjectMarks.exam_id']
                    ],
                    'Classrooms'=>[
                        'type'=>'left',
                        'table'=>'classrooms',
                        'conditions'=>['Classrooms.id = StudentSubjectMarks.classroom_id']
                    ],
                    'StudentSubjects'=>[
                        'type'=>'left',
                        'table'=>'(select id, subject_id from student_subjects)',
                        'conditions'=>['StudentSubjects.id = StudentSubjectMarks.student_subject_id']
                    ],
                    'Subjects'=>[
                        'type'=>'left',
                        'table'=>'subjects',
                        'conditions'=>['Subjects.id = StudentSubjects.subject_id']
                    ],
                    'Students'=>[
                        'type'=>'left',
                        'table'=>'students',
                        'conditions'=>['Students.id = StudentSubjectMarks.student_id']
                    ],
                ])
                ->where(['Students.id'=>0]);  
            }

        $this->set(compact('exams', 'id', 'studentSubjectMarks', 'grades', 'current_stream_count', 'current_level_count', 'stream_posn', 'level_posn')); 
    }

     /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewMessages($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Genders', 'Statuses', 'Classroomstatuses', 'ClassroomStudents', 'FeeStudents', 'Messages'=>['Users', 'Messagestatuses'], 'Payments'=>['Paymentmodes'], 'StudentActivities', 'StudentSubjectMarks'=>['Exams', 'Classrooms','StudentSubjects'=>['Subjects']], 'StudentSubjects'=>['Subjects'=>['Users']]],
        ]);

        $this->set(compact('student', 'id'));
    }

     /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewActivities($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Genders', 'Statuses', 'Classroomstatuses', 'ClassroomStudents', 'FeeStudents', 'Messages', 'Payments'=>['Paymentmodes'], 'StudentActivities'=>['Activities', 'Statuses', 'Measures'], 'StudentSubjectMarks'=>['Exams', 'Classrooms','StudentSubjects'=>['Subjects']], 'StudentSubjects'=>['Subjects'=>['Users']]],
        ]);

        $this->set(compact('student'));
    }


     /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function readMsg($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $msg_id = $this->request->getData('msg');
            $unread = $this->Students->Messages->query()
                ->update()
                ->set(['messagestatus_id' => 2])
                ->where(['id'=> $msg_id])
                ->execute();
            if ($unread) 
            {
                return $this->redirect(['controller'=>'Pages', 'action' => 'home']);
            }

        }
    }

     /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function readMessage($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $msg_id = $this->request->getData('msg');
            $unread = $this->Students->Messages->query()
                ->update()
                ->set(['messagestatus_id' => 2])
                ->where(['id'=> $msg_id])
                ->execute();
            if ($unread) 
            {
                return $this->redirect(['controller'=>'Students', 'action' => 'viewMessages', $id]);
            }

        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->newEmptyEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $genders = $this->Students->Genders->find('list', ['limit' => 200]);
        $statuses = $this->Students->Statuses->find('list', ['limit' => 200]);
        $classroomstatuses = $this->Students->Classroomstatuses->find('list', ['limit' => 200]);
        $this->set(compact('student', 'genders', 'statuses', 'classroomstatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            $student->image = '';
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $genders = $this->Students->Genders->find('list', ['limit' => 200]);
        $statuses = $this->Students->Statuses->find('list', ['limit' => 200]);
        $classroomstatuses = $this->Students->Classroomstatuses->find('list', ['limit' => 200]);
        $this->set(compact('student', 'genders', 'statuses', 'classroomstatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editDetails($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $phone_number = $this->request->getData('phone_number');
            $address = $this->request->getData('address');
            if ((preg_match('/^[0][0-9]{9}$/', $phone_number)) && (strlen($phone_number)>9))
            {
                $update = $this->Students->query()
                    ->update()
                    ->set(['phone_number' => $phone_number, 'address'=>$address])
                    ->where(['id'=> $id])
                    ->execute();
                if ($update) 
                {
                    $this->Flash->success(__('Details has been updated successfully. Login again'));
                    return $this->redirect(['controller' => 'Students', 'action' => 'viewProfile', $id]);
                }
            }
            $this->Flash->error(__('Check whether the phone number is valid.'));
            return $this->redirect(['controller' => 'Students', 'action' => 'viewProfile', $id]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Students->Messages->get($id);
        $student_id = $message->student_id;
        if ($this->Students->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'viewMessages', $student_id]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteMsg($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Students->Messages->get($id);
    
        if ($this->Students->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Pages', 'action' => 'home']);
    }

   public function login()
    {
        $this->viewBuilder()->setLayout('welcome2');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]);

            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Students', 'action' => 'login']);
        // }
    }
}
