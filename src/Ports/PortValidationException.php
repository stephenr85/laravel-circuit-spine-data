<?php

namespace Splicewire\CircuitSpineData\Ports;

use RuntimeException;

/** Thrown when an envelope does not satisfy the port it is crossing. */
class PortValidationException extends RuntimeException {}
