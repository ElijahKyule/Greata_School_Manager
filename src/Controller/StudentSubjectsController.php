<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StudentSubjects Controller
 *
 * @property \App\Model\Table\StudentSubjectsTable $StudentSubjects
 * @method \App\Model\Entity\StudentSubject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentSubjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Subjects'],
        ];
        $studentSubjects = $this->paginate($this->StudentSubjects);

        $this->set(compact('studentSubjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Student Subject id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentSubject = $this->StudentSubjects->get($id, [
            'contain' => ['Students', 'Subjects'=>['Users']],
        ]);

        $this->set(compact('studentSubject'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $studentSubject = $this->StudentSubjects->newEmptyEntity();
        if ($this->request->is('post')) {
            $student_id = $this->request->getData('student_id');
            $subject_id = $this->request->getData('subject_id');
            $authenticate_subjects = $this->StudentSubjects->find()
                ->select(['id'])
                ->where(['student_id' => $student_id, 'subject_id' => $subject_id,])
                ->count();
            if ($authenticate_subjects == 0) 
            {
                $studentSubject = $this->StudentSubjects->patchEntity($studentSubject, $this->request->getData());
                if ($this->StudentSubjects->save($studentSubject)) {
                    $this->Flash->success(__('The student subject has been saved.'));

                    return $this->redirect(['controller'=>'Students', 'action' => 'view', $id, '?'=>['tab'=>'subjects']]);
                }
                $this->Flash->error(__('The student subject could not be saved. Please, try again.'));
            }
            $this->Flash->error(__('The student subject could not be saved. It already Exists.'));
        }

        $students = $this->StudentSubjects->Students->find('list', ['limit' => 200])->where(['id'=>$id]);
        $subjects = $this->StudentSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('studentSubject', 'students', 'subjects', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Subject id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentSubject = $this->StudentSubjects->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentSubject = $this->StudentSubjects->patchEntity($studentSubject, $this->request->getData());
            if ($this->StudentSubjects->save($studentSubject)) {
                $this->Flash->success(__('The student subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student subject could not be saved. Please, try again.'));
        }
        $students = $this->StudentSubjects->Students->find('list', ['limit' => 200]);
        $subjects = $this->StudentSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('studentSubject', 'students', 'subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Subject id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $selected_students = $this->StudentSubjects->find()
            ->select(['student_id'])
            ->where(['id' => $id])
            ->first();
        $selected_student = $selected_students->student_id;
        $this->request->allowMethod(['post', 'delete']);
        $studentSubject = $this->StudentSubjects->get($id);
        if ($this->StudentSubjects->delete($studentSubject)) {
            $this->Flash->success(__('The student subject has been deleted.'));
        } else {
            $this->Flash->error(__('The student subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Students', 'action' => 'view', $selected_student, '?'=>['tab'=>'subjects']]);
    }
}
