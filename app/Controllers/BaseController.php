<?php

namespace App\Controllers;

use App\Core\View;
use App\Services\CsrfSecurityService;

class BaseController
{
    /**
     * @var View
     */
    protected $view;
    /**
     * @var CsrfSecurityService
     */
    protected $csrfSecurityService;

    public function __construct() {

        $this->csrfSecurityService = new CsrfSecurityService();
        $this->csrfSecurityService->generateToken();

        $this->view = new View();
    }
}

