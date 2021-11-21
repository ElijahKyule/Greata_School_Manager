<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StreamsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StreamsTable Test Case
 */
class StreamsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StreamsTable
     */
    protected $Streams;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Streams',
        'app.Classrooms',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Streams') ? [] : ['className' => StreamsTable::class];
        $this->Streams = $this->getTableLocator()->get('Streams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Streams);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
