<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ExamSubjects Controller
 *
 * @property \App\Model\Table\ExamSubjectsTable $ExamSubjects
 * @method \App\Model\Entity\ExamSubject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamSubjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Exams', 'Subjects', 'Measures'],
        ];
        $examSubjects = $this->paginate($this->ExamSubjects);

        $this->set(compact('examSubjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam Subject id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examSubject = $this->ExamSubjects->get($id, [
            'contain' => ['Exams', 'Subjects', 'Measures'],
        ]);

        $this->set(compact('examSubject'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $examSubject = $this->ExamSubjects->newEmptyEntity();
        if ($this->request->is('post')) 
        {
            $exam_id = $this->request->getData('exam_id');
            $subject_id = $this->request->getData('subject_id');
            $subject_authenticate = $this->ExamSubjects->find()
                ->select(['id'])
                ->where(['exam_id'=>$exam_id, 'subject_id'=>$subject_id])
                ->count();
            if ($subject_authenticate == 0) 
            {
                $examSubject = $this->ExamSubjects->patchEntity($examSubject, $this->request->getData());
                if ($this->ExamSubjects->save($examSubject)) 
                {
                    $this->Flash->success(__('The exam subject has been saved.'));

                    return $this->redirect(['controller'=>'Exams', 'action' => 'view', $id, '?'=>['tab'=>'examsubjects']]);
                }

                $this->Flash->error(__('The exam subject could not be saved. Please, try again.'));
            }
            elseif ($subject_authenticate > 0) 
            {
                $this->Flash->error(__('The exam subject could not be saved. It already exists in the exam.'));
            }
            
        }
        $exams = $this->ExamSubjects->Exams->find('list', ['limit' => 200])->where(['id'=>$id]);
        $subjects = $this->ExamSubjects->Subjects->find('list', ['limit' => 200]);
        $measures = $this->ExamSubjects->Measures->find('list', ['limit' => 200]);
        $this->set(compact('examSubject', 'exams', 'subjects', 'measures', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam Subject id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $examSubject = $this->ExamSubjects->get($id, [
            'contain' => [],
        ]);
        $selected_exams = $this->ExamSubjects->find()
                ->select(['exam_id'])
                ->where(['id' => $id])
                ->first();
        $selected_exam = $selected_exams->exam_id;
        $selected_subjects = $this->ExamSubjects->find()
                ->select(['subject_id'])
                ->where(['id' => $id])
                ->first();
         $selected_subject =  $selected_subjects->subject_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examSubject = $this->ExamSubjects->patchEntity($examSubject, $this->request->getData());
            if ($this->ExamSubjects->save($examSubject)) {
                $this->Flash->success(__('The exam subject has been saved.'));

                return $this->redirect(['controller'=>'Exams', 'action' => 'view', $selected_exam, '?'=>['tab'=>'examsubjects']]);
            }
            $this->Flash->error(__('The exam subject could not be saved. Please, try again.'));
        }
        $exams = $this->ExamSubjects->Exams->find('list', ['limit' => 200])->where(['id'=>$selected_exam]);
        $subjects = $this->ExamSubjects->Subjects->find('list', ['limit' => 200])->where(['id'=>$selected_subject]);
        $measures = $this->ExamSubjects->Measures->find('list', ['limit' => 200]);
        $this->set(compact('examSubject', 'exams', 'subjects', 'measures', 'selected_exam'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam Subject id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $selected_exams = $this->ExamSubjects->find()
                ->select(['exam_id'])
                ->where(['id' => $id])
                ->first();
        $selected_exam = $selected_exams->exam_id;
        $this->request->allowMethod(['post', 'delete']);
        $examSubject = $this->ExamSubjects->get($id);
        if ($this->ExamSubjects->delete($examSubject)) {
            $this->Flash->success(__('The exam subject has been deleted.'));
        } else {
            $this->Flash->error(__('The exam subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Exams', 'action' => 'view', $selected_exam, '?'=>['tab'=>'examsubjects']]);
    }
}
