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
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        $this->viewBuilder()->setLayout('default2');
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $classesTotal = $this->loadModel('Classrooms')->find()->count();
        $subjectsTotal = $this->loadModel('Subjects')->find()->count();
        $studentsTotal = $this->loadModel('Students')->find()->count();
        $examsTotal = $this->loadModel('Exams')->find()->count();
        $feesTotal = $this->loadModel('Fees')->find()->count();
        $announcement_titles  = $this->Announcements->find()->select(['title'])->where(['messagestatus_id' => 5])->first();
        $announcement_title  =$announcement_titles->title; 
        $announcement_bodies  = $this->Announcements->find()->select(['body'])->where(['messagestatus_id' => 5])->first();
        $announcement_body  =$announcement_bodies->body;
        $announcement_ids  = $this->Announcements->find()->select(['id'])->where(['messagestatus_id' => 5])->first();
        $announcement_id  =$announcement_ids->id;
        $announcement_dates  = $this->Announcements->find()->select(['created'])->where(['messagestatus_id' => 5])->first();
        $announcement_date = $announcement_dates->created;
        $this->set(compact('page', 'subpage', 'classesTotal', 'subjectsTotal','studentsTotal', 'examsTotal', 'feesTotal', 'announcementsTotal', 'announcement_title', 'announcement_body', 'announcement_id', 'announcement_date'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
        
    }
}