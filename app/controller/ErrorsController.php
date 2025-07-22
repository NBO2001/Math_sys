<?php
declare(strict_types=1);

namespace Control;

use Core\Controller;

class ErrorsController extends Controller
{
    public function pgNotFound(): void
    {
        echo $this->load('msgErro');
    }
}