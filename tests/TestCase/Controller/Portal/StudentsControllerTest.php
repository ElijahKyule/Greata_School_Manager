<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Portal;

use App\Controller\Portal\StudentsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Portal\StudentsController Test Case
 *
 * @uses \App\Controller\Portal\StudentsController
 */
class StudentsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Students',
        'app.Genders',
        'app.Statuses',
        'app.Classroomstatuses',
        'app.ClassroomStudents',
        'app.FeeStudents',
        'app.Messages',
        'app.Payments',
        'app.StudentActivities',
        'app.StudentSubjectMarks',
        'app.StudentSubjects',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
