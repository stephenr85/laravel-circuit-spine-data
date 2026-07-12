<?php

namespace Splicewire\CircuitSpineData\Ports;

/**
 * A typed slot on a node: an envelope `type` name plus the JSON Schema its payload
 * must satisfy. Schemas are authored host-side — `Data` classes projected to JSON
 * Schema via laravel-data-schemas, or raw JSON Schema from an external integrator —
 * and handed to the kernel as a plain array, so the kernel never reflects PHP types.
 */
class Port
{
    /**
     * @param  array<string, mixed>  $schema  JSON Schema for the payload (`[]` = accept any payload).
     */
    public function __construct(
        public string $type,
        public array $schema = [],
        public ?string $name = null,
    ) {}

    /**
     * @param  array<string, mixed>  $schema
     */
    public static function of(string $type, array $schema = [], ?string $name = null): self
    {
        return new self($type, $schema, $name);
    }
}
