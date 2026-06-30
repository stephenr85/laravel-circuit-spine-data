<?php

declare(strict_types=1);

namespace Rushing\CircuitSpineData\Ports;

/**
 * The one value that crosses every node boundary: a `{type, payload}` pair. `type`
 * names the port type (the host's default is `fragment`; the kernel default is
 * `object`); `payload` is whatever that type carries — a list, a scalar, an object.
 *
 * Demoting Fragment from *the* currency to the *default* port type is the whole point
 * of the re-base: the envelope is type-tagged so a downstream node, a validator, and a
 * run viewer can all tell a Fragment list from a JSON blob from a scalar.
 */
final class Envelope
{
    public function __construct(
        public readonly string $type,
        public readonly mixed $payload,
    ) {}

    public static function of(string $type, mixed $payload): self
    {
        return new self($type, $payload);
    }

    /**
     * @param  array{type: string, payload: mixed}  $array
     */
    public static function fromArray(array $array): self
    {
        return new self((string) $array['type'], $array['payload'] ?? null);
    }

    /**
     * True when an array is already shaped as an envelope (exactly `type` + `payload`),
     * so a capability may return one directly instead of having its result wrapped.
     *
     * @param  array<string, mixed>  $array
     */
    public static function looksLikeEnvelope(array $array): bool
    {
        return count($array) === 2
            && array_key_exists('type', $array)
            && array_key_exists('payload', $array)
            && is_string($array['type']);
    }

    /**
     * @return array{type: string, payload: mixed}
     */
    public function toArray(): array
    {
        return ['type' => $this->type, 'payload' => $this->payload];
    }
}
