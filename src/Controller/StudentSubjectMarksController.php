<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StudentSubjectMarks Controller
 *
 * @property \App\Model\Table\StudentSubjectMarksTable $StudentSubjectMarks
 * @method \App\Model\Entity\StudentSubjectMark[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentSubjectMarksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'StudentSubjects', 'Exams', 'Classrooms', 'Grades'],
        ];
        $studentSubjectMarks = $this->paginate($this->StudentSubjectMarks);

        $this->set(compact('studentSubjectMarks'));
    }


    /**
     * View method
     *
     * @param string|null $id Student Subject Mark id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentSubjectMark = $this->StudentSubjectMarks->get($id, [
            'contain' => ['Students', 'StudentSubjects'=>['Subjects'], 'Exams', 'Classrooms', 'Grades'],
        ]);

        $this->set(compact('studentSubjectMark'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $this->loadModel('ClassroomStudents');
        $this->loadModel('Classrooms');
        $this->loadModel('Grades');
        $studentSubjectMark = $this->StudentSubjectMarks->newEmptyEntity();
        $current_class_ids = $this->ClassroomStudents->find()
            ->select(['classroom_id'])
            ->where(['student_id' => $id, 'classroomstatus_id'=> 1])
            ->first();
        $current_class_id = $current_class_ids->classroom_id;
        $current_level_ids = $this->Classrooms->find()
            ->select(['level_id'])
            ->where(['id' => $current_class_id])
            ->first();
        $current_level_id = $current_level_ids->level_id;
        
        if ($this->request->is('post')) {
            $student_id = $this->request->getData('student_id');
            $exam_id = $this->request->getData('exam_id');
            $student_subject_id = $this->request->getData('student_subject_id');
            $classroom_id = $this->request->getData('classroom_id');
            $marks = $this->request->getData('marks');
            //grading
            $grades = $this->paginate($this->Grades);
            $grade_id = '';
            foreach ($grades as $grade) 
            {
                if (($marks >= $grade->lower_bound)&&($marks<=$grade->upper_bound)) 
                {
                    $grade_id = $grade->id;
                }
            }
            //end grading
            $student_subject_auth = $this->StudentSubjectMarks->find()
                ->select(['id'])
                ->where(['student_id' => $student_id, 'student_subject_id'=>$student_subject_id, 'classroom_id'=> $classroom_id, 'exam_id'=>$exam_id])
                ->count();
            if ($student_subject_auth == 0) 
            {
                if (($marks>=0)&&($marks<=100)) 
                {
                    $studentSubjectMark = $this->StudentSubjectMarks->patchEntity($studentSubjectMark, $this->request->getData());
                    $studentSubjectMark->grade_id = $grade_id;
                    if ($this->StudentSubjectMarks->save($studentSubjectMark)) 
                    {
                        $this->Flash->success(__('The student subject mark has been saved.'));
                        return $this->redirect(['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'subjectmarks']]);
                    }
                } 
                else 
                {
                    $this->Flash->error(__('The student subject mark could not be saved. Check whether the marks entered are valid.'));
                }
            } 
            elseif ($student_subject_auth > 0) 
            {
                $this->Flash->error(__('The student subject mark could not be saved. The student subject already exists.'));
            }
        }

        $students = $this->StudentSubjectMarks->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
        $studentSubjects = $this->StudentSubjectMarks->StudentSubjects->find('list', ['limit' => 200])->contain('Subjects')->where(['student_id'=>$id]);
        $exams = $this->StudentSubjectMarks->Exams->find('list', ['limit' => 200])->where(['level_id'=>$current_level_id, 'status_id'=>1]);
        $classrooms = $this->StudentSubjectMarks->Classrooms->find('list', ['limit' => 200])->where(['id'=>$current_class_id]);
        $grades = $this->StudentSubjectMarks->Grades->find('list', ['limit' => 200]);
        $this->set(compact('studentSubjectMark', 'students', 'studentSubjects', 'exams', 'classrooms', 'grades', 'id'));
    }

     /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function importMarks()
    {
        $this->loadModel('Subjects');
        $this->loadModel('StudentSubjects');
        $this->loadModel('ClassroomStudents');
        $this->loadModel('Classrooms');
        $this->loadModel('Exams');
        $this->loadModel('Grades');

        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $studentSubjectMark = $this->StudentSubjectMarks->newEmptyEntity();
            if (!$studentSubjectMark->getErrors) 
            {
                $class = $this->request->getData('classroom');
                $file = $this->request->getData('marks_sheet');
                $filename  = $file->getClientFilename();
                $targetPath = WWW_ROOT.'document'.DS.$filename;
                
                if($filename)
                {
                    $file->moveTo($targetPath);
                    $handle = fopen($targetPath, "r");
                    $header = fgetcsv($handle);

                    while(($row = fgetcsv($handle)) !== FALSE)
                    {
                        
                        $student_id  = $row[1];
                        $classroom_id = $this->request->getData('classroom');
                        $exam_id = $this->request->getData('exam_id');

                        $stud_sub_id = '';
                        $sub_marks = '';
                        $grade_id = '';

                        for ($i=3; $i < count($header); $i++) 
                        { 
                            $stud_sub_code = $header[$i];
                            $sub_marks = $row[$i];
                            //grading
                            $grades = $this->paginate($this->Grades);
                            foreach ($grades as $grade) 
                            {
                                if (($sub_marks >= $grade->lower_bound)&&($sub_marks<=$grade->upper_bound)) 
                                {
                                    $grade_id = $grade->id;
                                }
                            }
                            //end grading

                            $sub_id = $this->Subjects->find()
                                ->select(['id'])
                                ->where(['code' => $stud_sub_code])
                                ->first(); 
                            $sub_id = $sub_id->id;
                            $stud_sub_id = $this->StudentSubjects->find()
                                ->select(['id'])
                                ->where(['student_id' => $student_id, 'subject_id'=>$sub_id]); 
                            
                            if($stud_sub_id)
                            $stud_sub_id = $stud_sub_id->first()->id;
                            
                            $current_class = $this->ClassroomStudents->find()
                                ->select(['classroom_id'])
                                ->where(['student_id' => $student_id, 'classroomstatus_id'=>1])
                                ->first(); 
                            $current_class = $current_class->classroom_id;
                            $class_level = $this->Classrooms->find()
                                ->select(['level_id'])
                                ->where(['id' => $current_class])
                                ->first(); 
                            $class_level = $class_level->level_id;
                            $exam_level = $this->Exams->find()
                                ->select(['level_id'])
                                ->where(['id' => $exam_id])
                                ->first(); 

                            $exam_level = $exam_level->level_id;

                            if ($class_level == $exam_level) 
                            {
                                if ($stud_sub_id) 
                                {
                                    $stud_sub_auth = $this->StudentSubjectMarks->find()
                                        ->select(['id'])
                                        ->where(['student_id' => $student_id, 'student_subject_id'=>$stud_sub_id, 'classroom_id'=> $classroom_id, 'exam_id'=>$exam_id])
                                        ->count();
                                    if ($stud_sub_auth == 0) 
                                    {
                                        if (($sub_marks>=0)&&($sub_marks<=100)) 
                                        {
                                            $studentSubjectMark = $this->StudentSubjectMarks->newEmptyEntity();
                                            $studentSubjectMark = $this->StudentSubjectMarks->patchEntity($studentSubjectMark, $this->request->getData());
                                            $studentSubjectMark->student_id = $student_id;
                                            $studentSubjectMark->exam_id = $exam_id;
                                            $studentSubjectMark->classroom_id = $classroom_id;
                                            $studentSubjectMark->student_subject_id = $stud_sub_id;
                                            $studentSubjectMark->marks = $sub_marks;
                                            $studentSubjectMark->grade_id = $grade_id;
                                            $this->StudentSubjectMarks->save($studentSubjectMark);
                                        }
                                    }
                                    elseif ($stud_sub_auth == 1) 
                                    {
                                        if (($sub_marks>=0)&&($sub_marks<=100)) 
                                        {
                                            $grading = $this->StudentSubjectMarks->query()
                                                ->update()
                                                ->set(['marks' => $sub_marks, 'grade_id'=>$grade_id])
                                                ->where(['student_id' => $student_id, 'student_subject_id'=>$stud_sub_id, 'classroom_id'=> $classroom_id, 'exam_id'=>$exam_id])
                                                ->execute();
                                        }
                                    }
                                }
                            }                            
                        }
                    } 
                    fclose($handle); 

                    $this->Flash->success(__('The marks sheet has been uploaded and saved successfully. However some redundant marks could have been forfeited'));
                    return $this->redirect(['controller'=>'Classrooms','action' => 'view',$class,'?'=>['tab'=>'classlist']]);
                }

                $this->Flash->error(__('An error occured staging the marks sheet. Please, try again.'));
                return $this->redirect(['controller'=>'Classrooms','action' => 'view',$class,'?'=>['tab'=>'classlist']]);
            }    
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Subject Mark id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $studentSubjectMark = $this->StudentSubjectMarks->get($id, [
            'contain' => [],
        ]);
        $selected_students = $this->StudentSubjectMarks->find()
            ->select(['student_id'])
            ->where(['id' => $id])
            ->first();
        $selected_student = $selected_students->student_id;
        $selected_subjects = $this->StudentSubjectMarks->find()
            ->select(['student_subject_id'])
            ->where(['id' => $id])
            ->first();
        $selected_subject = $selected_subjects->student_subject_id;
        $selected_exams = $this->StudentSubjectMarks->find()
            ->select(['exam_id'])
            ->where(['id' => $id])
            ->first();
        $selected_exam = $selected_exams->exam_id;
        $selected_classrooms = $this->StudentSubjectMarks->find()
            ->select(['classroom_id'])
            ->where(['id' => $id])
            ->first();
        $selected_classroom = $selected_classrooms->classroom_id;
        $this->loadModel('Grades');
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $marks = $this->request->getData('marks');
            $grade_id = '';
            //grading
            $grades = $this->paginate($this->Grades);
            foreach ($grades as $grade) 
            {
                if (($marks >= $grade->lower_bound)&&($marks<=$grade->upper_bound)) 
                {
                    $grade_id = $grade->id;
                }
            }
            //end grading
            if (($marks>=0)&&($marks<=100)) 
            {
                $studentSubjectMark = $this->StudentSubjectMarks->patchEntity($studentSubjectMark, $this->request->getData());
                $studentSubjectMark->grade_id = $grade_id;
                if ($this->StudentSubjectMarks->save($studentSubjectMark)) 
                {
                    $this->Flash->success(__('The student subject mark has been saved.'));

                    return $this->redirect(['controller'=>'Students', 'action' => 'view', $selected_student, '?'=>['tab'=>'subjectmarks']]);
                }
            }
            else
            {
                $this->Flash->error(__('The student subject mark could not be saved. Check whether the marks entered are valid.'));
            } 
        }

        $students = $this->StudentSubjectMarks->Students->find('list', ['limit' => 200])->where(['id'=>$selected_student]);
        $studentSubjects = $this->StudentSubjectMarks->StudentSubjects->find('list', ['limit' => 200])->contain('Subjects')->where(['StudentSubjects.id'=>$selected_subject]);
        $exams = $this->StudentSubjectMarks->Exams->find('list', ['limit' => 200])->where(['id'=>$selected_exam]);
        $classrooms = $this->StudentSubjectMarks->Classrooms->find('list', ['limit' => 200])->where(['id'=>$selected_classroom]);
        $grades = $this->StudentSubjectMarks->Grades->find('list', ['limit' => 200]);

        $this->set(compact('studentSubjectMark', 'students', 'studentSubjects', 'exams', 'classrooms', 'grades','selected_student'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Subject Mark id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selected_students = $this->StudentSubjectMarks->find()
            ->select(['student_id'])
            ->where(['id' => $id])
            ->first();
        $selected_student = $selected_students->student_id;
        $studentSubjectMark = $this->StudentSubjectMarks->get($id);
        if ($this->StudentSubjectMarks->delete($studentSubjectMark)) {
            $this->Flash->success(__('The student subject mark has been deleted.'));
        } else {
            $this->Flash->error(__('The student subject mark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Students', 'action' => 'view', $selected_student, '?'=>['tab'=>'subjectmarks']]);
    }
}
