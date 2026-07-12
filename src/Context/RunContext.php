<?php

namespace Splicewire\CircuitSpineData\Context;

/**
 * Provenance carried through a run, read from one place instead of reconstructed per
 * node: the triggering `actor`, the `runId`, and (per node) the node `ref`/`label`.
 * The host's lineage projection (issue 02) reads the actor/run/ref from here so node
 * behavior no longer reaches for `Auth::user()`.
 *
 * Immutable: {@see forNode()} returns a per-node copy the scheduler hands to dispatch.
 */
class RunContext
{
    /**
     * @param  array<string, mixed>  $metadata
     */
    public function __construct(
        public string $runId,
        public mixed $actor = null,
        public ?string $nodeRef = null,
        public ?string $nodeLabel = null,
        public array $metadata = [],
    ) {}

    public function forNode(string $ref, ?string $label = null): self
    {
        return new self($this->runId, $this->actor, $ref, $label, $this->metadata);
    }

    /**
     * @return array{run_id: string, actor: mixed, node_ref: ?string, node_label: ?string, metadata: array<string, mixed>}
     */
    public function toArray(): array
    {
        return [
            'run_id' => $this->runId,
            'actor' => $this->actor,
            'node_ref' => $this->nodeRef,
            'node_label' => $this->nodeLabel,
            'metadata' => $this->metadata,
        ];
    }
}
