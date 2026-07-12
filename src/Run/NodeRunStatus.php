<?php

namespace Splicewire\CircuitSpineData\Run;

/**
 * Outcome of a single node pass. `NeedsReview`/`WaitingForInput` are the HITL seams
 * (issues 07–08); this kernel slice uses `Completed`, `Failed`, and `Skipped`
 * (a node whose upstream broke).
 */
enum NodeRunStatus: string
{
    case Queued = 'queued';
    case Running = 'running';
    case Completed = 'completed';
    case Failed = 'failed';
    case Skipped = 'skipped';
    case NeedsReview = 'needs_review';
    case WaitingForInput = 'waiting_for_input';
}
