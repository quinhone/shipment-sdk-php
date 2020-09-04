<?php

namespace MelhorEnvio\Tests;

use MelhorEnvio\Enums\Environment;
use MelhorEnvio\Exceptions\InvalidEnvironmentException;
use MelhorEnvio\Shipment;
use PHPUnit\Framework\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * PHPUnit: Token
     */
    const TOKEN = 'token-testing';

    /** @test */
    public function is_invalid_environment()
    {
        $this->expectException(InvalidEnvironmentException::class);

        new Shipment(self::TOKEN, 'invalid-environment');
    }

    /** @test */
    public function is_valid_environment()
    {
        foreach (Environment::ENVIRONMENTS as $environment) {
            $shipment = new Shipment(self::TOKEN, $environment);

            $this->assertEquals($environment, $shipment->getEnvironment());
        }
    }
}
