<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Statuses', 'ClassroomStudents'=>['Classrooms'], 'StudentActivities', 'Classroomstatuses'],
        ];

        $students = $this->Students->find()
            ->select([
                'id'=>'Students.id',
                'name'=>'Students.name',
                'email'=>'Students.email',
                'gender'=>'Genders.name',
                'class'=>'Classrooms.name',
                'class_id'=>'Classrooms.id',
                'admission_number'=>'Students.admission_number',
                'admission_date'=>'Students.admission_date',
                'status'=>'Statuses.name',
                'status_id'=>'Statuses.id',
                'created'=>'Students.created',
                'modified'=>'Students.modified',
            ])
            ->join([
                'Statuses'=>[
                    'type'=>'left',
                    'table'=>'statuses',
                    'conditions'=>['Statuses.id = Students.status_id']
                ],
                'ClassroomStudents'=>[
                    'type'=>'left',
                    'table'=>'(select classroom_id as class, student_id from  classroom_students where classroomstatus_id = 1)',
                    'conditions'=>['ClassroomStudents.student_id = Students.id']
                ],
                'Classrooms'=>[
                    'type'=>'left',
                    'table'=>'classrooms',
                    'conditions'=>['Classrooms.id = ClassroomStudents.class']
                ],
                'Genders'=>[
                    'type'=>'left',
                    'table'=>'genders',
                    'conditions'=>['Genders.id = Students.gender_id']
                ],


            ]);

            
        $this->set(compact('students'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $tab = $this->request->getQuery('tab'); 
        $student = $this->Students->get($id, [
            'contain' => ['Statuses', 'ClassroomStudents'=>['Classrooms'=>['Users'], 'Classroomstatuses'], 'FeeStudents'=>['Fees', 'Paymentmodes', 'Users'], 'Payments'=>['Students', 'Paymentmodes', 'Users'], 'StudentSubjects'=>['Students', 'Subjects'=>['Users']], 'StudentActivities'=>['Activities', 'Statuses', 'Measures', 'Students'], 'Genders', 'StudentSubjectMarks'=>['Students', 'Classrooms', 'Exams', 'StudentSubjects'=>['Subjects']]],
        ]);
        $this->loadModel('Grades');
        $this->loadModel('ClassroomStudents');
        $this->loadModel('Classrooms');
        $this->loadModel('Payments');
        $this->loadModel('Messages');
        $this->loadModel('Fees');
        $this->loadModel('Paymentmodes');
        $this->loadModel('Users');
        $this->loadModel('Exams');

        $classrooms = $this->paginate($this->Classrooms);
        $grades = $this->paginate($this->Grades);
        $this->paginate = [
            'contain' => ['Students', 'Users', 'Messagestatuses'],
            'conditions'=>['student_id'=>$id]
        ];
        $messages = $this->paginate($this->Messages);
        $this->paginate = [
            'contain' => ['Classrooms'],
            'conditions'=>['student_id'=>$id]
        ];

        $current_class_count = $this->ClassroomStudents->find()
            ->select(['id'])
            ->where(['student_id' => $id, 'classroomstatus_id'=> 1])
            ->count();
        if ($current_class_count == 1) 
        {
            $current_class_ids = $this->ClassroomStudents->find()
                ->select(['classroom_id'])
                ->where(['student_id' => $id, 'classroomstatus_id'=> 1])
                ->first();
            $current_class_id = $current_class_ids->classroom_id;
            $current_stream_count = $this->Students->ClassroomStudents->find()
                ->select(['id'])
                ->where(['classroom_id' => $current_class_id, 'classroomstatus_id'=> 1])
                ->count();
            $current_level_ids = $this->Classrooms->find()
                ->select(['level_id'])
                ->where(['id' => $current_class_id]) 
                ->first();
            $current_level_id = $current_level_ids->level_id;
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
                //end rank stream

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
                    'Grades'=>[
                        'type'=>'left',
                        'table'=>'grades',
                        'conditions'=>['Grades.id = StudentSubjectMarks.grade_id']
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
            

            $classrooms = $this->Classrooms->find('list', ['limit' => 200]);
            $classroom = $this->Classrooms->find('list', ['limit' => 200])->where(['id'=>$current_class_id]);
            $fees =$this->Fees->find('list', ['limit' => 200])->where(['level_id'=>$current_level_id,'status_id'=>1]); 
            $paymentmodes = $this->Paymentmodes->find('list', ['limit' => 200]);
            $users = $this->Users->find('list', ['limit' => 200]);
            $stdnts = $this->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
            $students = $this->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
            $fees =$this->Fees->find('list', ['limit' => 200])->where(['level_id'=>$current_level_id,'status_id'=>1]); 
            $exams =$this->Exams->find('list', ['limit' => 200])->where(['level_id'=>$current_level_id, 'status_id'=>1]);

            $payment = $this->Payments->newEmptyEntity();  
            $classroomStudent = $this->ClassroomStudents->newEmptyEntity();
            $filter_exam = $this->Exams->newEmptyEntity();  

            $this->set(compact('student', 'students', 'id', 'messages', 'classroom', 'classrooms', 'classroomStudent', 'payment', 'fees', 'paymentmodes', 'users', 'stdnts', 'tab', 'filter_exam', 'exams', 'studentSubjectMarks', 'grades', 'stream_posn', 'current_level_count', 'current_stream_count', 'level_posn'));

        }
        elseif ($current_class_count == 0)
        {
            $classrooms = $this->Classrooms->find('list', ['limit' => 200])->where(['id'=>0]);
            $classroom = $this->Classrooms->find('list', ['limit' => 200])->where(['id'=>0]);
            $fees =$this->Fees->find('list', ['limit' => 200])->where(['level_id'=>0,'status_id'=>0]); 
            $paymentmodes = $this->Paymentmodes->find('list', ['limit' => 200]);
            $users = $this->Users->find('list', ['limit' => 200]);
            $stdnts = $this->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
            $students = $this->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
            $students = $this->Students->find('list', ['limit' => 200])->where(['id'=>$id]);

            $payment = $this->Payments->newEmptyEntity();  
            $classroomStudent = $this->ClassroomStudents->newEmptyEntity();

            $this->set(compact('student', 'students', 'id', 'messages', 'classroom', 'classrooms', 'classroomStudent', 'payment', 'fees', 'paymentmodes', 'users', 'stdnts', 'tab'));
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
            $student->status_id = 1;
            $student->classroomstatus_id = 3;
            $student->image = '';
            $save = $this->Students->save($student);
            
            if ($save) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $genders = $this->Students->Genders->find('list', ['limit' => 200]);
        $statuses = $this->Students->Statuses->find('list', ['limit' => 200])->where(['id'=>1]);
        $classroomstatuses = $this->Students->Classroomstatuses->find('list', ['limit' => 200])->where(['id'=>3]);
        $this->set(compact('student', 'statuses', 'classroomstatuses','genders'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function uploadImage($id)
    {
        $student = $this->Students->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if (!$student->getErrors) 
            {
                $image = $this->request->getData('student_image');
                $name  = $image->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$name;

                if ($name) 
                {
                    $image->moveTo($targetPath);
                    $upload = $this->Students->query()
                        ->update()
                        ->set(['image' => $name])
                        ->where(['id' => $id])
                        ->execute();
                    if ($upload == true) 
                    {
                        $this->Flash->success(__('The student image has been uploaded.'));

                        return $this->redirect(['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                    }
                    else
                    {
                        $this->Flash->error(__('The student image could not be uploaded. Please, try again.'));
                        return $this->redirect(['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                    }
                }
                elseif(!$name)
                {
                    $this->Flash->error(__('The student image can not be empty.'));
                    return $this->redirect(['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'profile']]);
                }  
            }    
        }
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
            $student->classroomstatus_id = 1;
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $genders = $this->Students->Genders->find('list', ['limit' => 200]);
        $statuses = $this->Students->Statuses->find('list', ['limit' => 200]);
        $classroomstatuses = $this->Students->Classroomstatuses->find('list', ['limit' => 200]);
        $this->set(compact('student', 'statuses', 'genders', 'classroomstatuses'));
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
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
