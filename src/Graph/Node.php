<?php

declare(strict_types=1);

namespace Rushing\CircuitSpineData\Graph;

use Rushing\CircuitSpineData\Ports\Port;

/**
 * A vertex in a circuit graph. Generically named to avoid colliding with a host's
 * `CircuitNode` Eloquent model — the brand rides the package, the seam stays clean.
 *
 * A node carries no behavior: it names a popcorn `capability` the scheduler dispatches
 * through the registry, plus typed `config` for that capability. Optional input/output
 * {@see Port}s let the kernel validate the envelope on the node boundary; omit them and
 * the node is untyped (accept/emit anything).
 */
final class Node
{
    /**
     * @param  array<string, mixed>  $config  Typed config handed to the capability.
     * @param  array<string, Port>  $inputs  Declared input ports, keyed by port name.
     * @param  string|null  $iterateOver  A dot-path into an upstream output payload whose
     *                                    items the node runs over one-by-one (issue 06):
     *                                    an N-item collection produces N iteration-indexed
     *                                    node-runs. Null = run once.
     * @param  int  $maxLoops  Safety cap on how many times an intentional loop-back may
     *                         re-run this node before the scheduler stops (prevents a
     *                         runaway loop). Counts the re-entries, not the first pass.
     */
    public function __construct(
        public readonly string $ref,
        public readonly string $capability,
        public readonly array $config = [],
        public readonly ?string $label = null,
        public readonly ?Port $output = null,
        public readonly array $inputs = [],
        public readonly ?string $iterateOver = null,
        public readonly int $maxLoops = 10,
    ) {}
}
