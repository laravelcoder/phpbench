<?php

/*
 * This file is part of the PHP Bench package
 *
 * (c) Daniel Leech <daniel@dantleech.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PhpBench\Benchmark\Iteration;
use PhpBench\Benchmark;

class IsolatedCase implements Benchmark
{
    /**
     * @description 5 iterations in isolation
     * @iterations 5
     * @processIsolation iteration
     */
    public function benchIterationIsolation()
    {
        usleep(1);
    }

    /**
     * @description Set of 5 iterations in isolation
     * @iterations 5
     * @processIsolation iterations
     */
    public function benchIterationsIsolation()
    {
        usleep(1);
    }
}

