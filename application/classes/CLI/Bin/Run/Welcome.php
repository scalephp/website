<?php
/**
 * Welcome
 *
 * @package    Kli
 * @category   Base
 * @author     Kohana Team
 * @author     Kli Team
 */

namespace App\CLI\Bin\Run;

use Scale\Kli\CLI\Bin\Task;
use Scale\Kli\CLI\Bin\ExecutableInterface;

class Welcome extends Task implements ExecutableInterface
{
    protected $_options = [
        'foo'  => 'bar',
        'opt' => null,
    ];

    /**
	 * Example Task.
	 *
	 *
	 * @return void
	 */
    protected function _execute(array $params)
    {
        $data = [
            [
              'PHP',
              phpversion(),
            ],
            [
              'Date',
              date(DATE_RSS),
            ],
            [
              'Params',
              implode(' ', $params)
            ]
        ];

        $this->output->whiteTable($data);

        $progress = $this->output->yellowProgress()->total(100);

        for ($i = 0; $i <= 100; $i++) {
            $progress->current($i);

            // Simulate something happening
            usleep(40000);
        }

        $this->output->error('Ruh roh.');
        $this->output->comment('Just so you know.');
        $this->output->whisper('Not so important, just a heads up.');
        $this->output->shout('This. This is important.');
        $this->output->info('Nothing fancy here. Just some info.');
    }
}
