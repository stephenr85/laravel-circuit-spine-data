<?php

namespace Rushing\CircuitSpineData\Run;

use Rushing\CircuitSpineData\Ports\Envelope;

/**
 * The record of one node pass. `iteration` is the seam for loops (issue 06): a node
 * runs once per pass and a looping node produces many node-runs per run, each with its
 * own index. For this acyclic slice every node-run is iteration 0.
 */
class NodeRun
{
    public function __construct(
        public string $nodeRef,
        public NodeRunStatus $status,
        public ?Envelope $output = null,
        public ?string $error = null,
        public int $iteration = 0,
        public ?string $label = null,
    ) {}

    public function succeeded(): bool
    {
        return $this->status === NodeRunStatus::Completed;
    }

    public function broke(): bool
    {
        return $this->status === NodeRunStatus::Failed
            || $this->status === NodeRunStatus::Skipped;
    }
}
