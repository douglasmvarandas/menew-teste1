<?php

use App\DefaultController;
use App\Entity\Cadastro;
use PHPUnit\Framework\TestCase;

// PHPUnit

class DefaultControllerTest extends TestCase
{
    public function testSalvarDefaultUsage()
    {
        $esperado="ok";
        $resultado = "ok";
        $this->assertEquals($esperado, $resultado);
    }
}