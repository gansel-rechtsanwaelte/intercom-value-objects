<?php

declare(strict_types=1);

/**
 * This file is part of datana-gmbh/intercom-value-objects.
 *
 * (c) Datana GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Datana\Intercom\Value\HealthCheck;

use Webmozart\Assert\Assert;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class State
{
    private string $value;

    private function __construct(string $value)
    {
        $value = trim($value);

        Assert::stringNotEmpty($value);
        Assert::notWhitespaceOnly($value);

        $this->value = $value;
    }

    public static function healthy(): self
    {
        return new self('OK');
    }

    public static function unhealthy(): self
    {
        return new self('UNHEALTHY');
    }

    public static function unknown(): self
    {
        return new self('UNKNOWN');
    }

    public function toString(): string
    {
        return $this->value;
    }
}
