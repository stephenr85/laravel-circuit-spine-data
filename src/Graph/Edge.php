<?php

namespace Rushing\CircuitSpineData\Graph;

/**
 * A directed wire from one node's output to another node's input, addressed by node
 * `ref`. Optional `fromPort`/`toPort` name the typed slots the wire connects — the
 * seam design-time wiring validation (UI handoff, PRD story 7) reads.
 *
 * `loop` marks an **intentional** loop-back edge (n8n parity, issue 06): the scheduler
 * routes control back to an upstream node to retry/refine and does *not* mistake it for
 * an accidental cycle. A cycle among non-loop edges remains an error.
 */
class Edge
{
    public function __construct(
        public string $from,
        public string $to,
        public ?string $fromPort = null,
        public ?string $toPort = null,
        public bool $loop = false,
    ) {}

    public static function loopBack(string $from, string $to): self
    {
        return new self($from, $to, loop: true);
    }
}
