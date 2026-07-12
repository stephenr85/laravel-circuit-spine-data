<?php

namespace Splicewire\CircuitSpineData\Ports\Contracts;

use Splicewire\CircuitSpineData\Ports\Envelope;
use Splicewire\CircuitSpineData\Ports\Port;
use Splicewire\CircuitSpineData\Ports\PortValidationException;

/**
 * Validates an {@see Envelope} against the {@see Port} it is crossing. The kernel
 * ships a structural default; a host may bind a fuller JSON Schema validator without
 * the scheduler changing.
 */
interface PortValidator
{
    /**
     * @throws PortValidationException when the envelope's type or payload does not satisfy the port.
     */
    public function validate(Envelope $envelope, Port $port): void;
}
