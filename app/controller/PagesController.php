<?php
declare(strict_types=1);

namespace Control;

use Core\Controller;

class PagesController extends Controller
{
    public function indexPage(): void
    {
        echo $this->load('themaIndex');
    }

    public function formQ(): void
    {
        echo $this->load('screenIni');
    }
}