<?php

declare(strict_types=1);

namespace Rushing\CircuitSpineData\Run;

/**
 * Lifecycle of a whole run. `Paused` is the seam for durable suspend/resume-from-frontier
 * (issue 07); this kernel slice resolves a run to `Completed` or `Failed`.
 */
enum RunStatus: string
{
    case Running = 'running';
    case Completed = 'completed';
    case Failed = 'failed';
    case Paused = 'paused';
}
