<?php

/*
 * This file is part of the PHPBench package
 *
 * (c) Daniel Leech <daniel@dantleech.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhpBench\Tests\Unit\Subject\Metadata;

use PhpBench\Model\Subject;

class SubjectTest extends \PHPUnit_Framework_TestCase
{
    private $subject;
    private $benchmark;

    public function setUp()
    {
        $this->benchmark = $this->prophesize('PhpBench\Model\Benchmark');
        $this->subject = new Subject($this->benchmark->reveal(), 'subjectOne', 0);
    }

    /**
     * It should say if it is in a set of groups.
     */
    public function testInGroups()
    {
        $this->subject->setGroups(array('one', 'two', 'three'));
        $result = $this->subject->inGroups(array('five', 'two', 'six'));
        $this->assertTrue($result);

        $result = $this->subject->inGroups(array('eight', 'seven'));
        $this->assertFalse($result);

        $result = $this->subject->inGroups(array());
        $this->assertFalse($result);
    }

    /**
     * It should create variants.
     */
    public function testCreateVariant()
    {
        $parameterSet = $this->prophesize('PhpBench\Model\ParameterSet');
        $variant = $this->subject->createVariant(
            $parameterSet->reveal()
        );

        $this->assertEquals($this->subject, $variant->getSubject());
        $this->assertEquals($parameterSet->reveal(), $variant->getParameterSet());
        $this->assertEquals(0, $variant->count());
    }
}