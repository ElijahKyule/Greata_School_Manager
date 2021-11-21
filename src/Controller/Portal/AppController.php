<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Portal;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /** 
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
    **/

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'logout']);
        $this->viewBuilder()->setLayout('students');
        if (($this->request->getAttribute('identity'))==true) 
        {
            $Stdnt = $this->request->getAttribute('identity');
            $student_id = $Stdnt->id;
            $subjectsTotal = $this->loadModel('StudentSubjects')->find()
                ->select(['id'])
                ->where(['student_id' => $student_id])
                ->count();
            $unreadmsgsTotal = $this->loadModel('Messages')->find()
                ->select(['id'])
                ->where(['student_id' => $student_id, 'messagestatus_id'=>1])
                ->count();
            $activitiesTotal = $this->loadModel('StudentActivities')->find()
                ->select(['id'])
                ->where(['student_id' => $student_id])
                ->count();
            $currentClasses_id = $this->loadModel('ClassroomStudents')->find()
                ->select(['classroom_id'])
                ->where(['student_id' => $student_id, 'classroomstatus_id'=>1])
                ->first();
            $currentClass_id = $currentClasses_id->classroom_id;
            $currentClasses = $this->loadModel('Classrooms')->find()
                ->select(['name'])
                ->where(['id' => $currentClass_id])
                ->first();
            $currentClass = $currentClasses->name;
            $student = $this->loadModel('Students')->get($student_id, [
                'contain' => ['StudentActivities'=>['Activities', 'Statuses', 'Measures'], 'Messages'=>['Users', 'Messagestatuses']]
            ]);
            $messages = $this->loadModel('Messages')->find()
                ->select([
                    'id'=>'Messages.id',
                    'title'=>'Messages.title',
                    'body'=>'Messages.body',
                    'sender'=>'Users.name',
                    'status'=>'Messagestatuses.name',
                    'created'=>'Messages.created',
                ])
                ->join([
                    'Users'=>[
                        'type'=>'left',
                        'table'=>'users',
                        'conditions'=>['Users.id = Messages.user_id']
                    ],
                    'Messagestatuses'=>[
                        'type'=>'left',
                        'table'=>'messagestatuses',
                        'conditions'=>['Messagestatuses.id = Messages.messagestatus_id']
                    ],
                    'Students'=>[
                        'type'=>'left',
                        'table'=>'students',
                        'conditions'=>['Students.id = Messages.student_id']
                    ],
                ])
                ->where(['Messagestatuses.id'=>1, 'Students.id'=>$student_id]);
            $this->set(compact('Stdnt', 'subjectsTotal', 'messagesTotal', 'unreadmsgsTotal', 'activitiesTotal', 'currentClass', 'student', 'messages'));
        }
        
    }

    public function initialize(): void 
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
        $this->loadComponent('Authentication.Authentication');
    }
}
