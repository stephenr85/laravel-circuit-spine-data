<?php

declare(strict_types=1);

namespace Rushing\CircuitSpineData\Ports\Contracts;

use Rushing\CircuitSpineData\Ports\Envelope;
use Rushing\CircuitSpineData\Ports\Port;
use Rushing\CircuitSpineData\Ports\PortValidationException;

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
