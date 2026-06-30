<?php

declare(strict_types=1);

namespace Rushing\CircuitSpineData\Ports;

use RuntimeException;

/** Thrown when an envelope does not satisfy the port it is crossing. */
final class PortValidationException extends RuntimeException {}
