<?php

namespace App\Controllers;

use App\Models\DataModel;
use App\Services\EmailService;
use App\Services\SmsService;

class HomeController extends BaseController {

    /**
     * @var DataModel
     */
    private $dataModel;

    /**
     * @var EmailService
     */
    protected $emailService;

    /**
     * @var SmsService
     */
    private $smsService;

    public function __construct()
    {
        parent::__construct();
        $this->dataModel = new DataModel();
        $this->smsService = new SmsService();
        $this->emailService = new EmailService();
    }

    public function index() {

        $data = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->csrfSecurityService->isValid($_POST, $_SESSION)) {
            $data = $_POST['data'];            
            $this->dataModel->insert($data);

            $this->smsService->send('000-00-00-00', $data);
            $this->emailService->send('test@gmail.com', $data);
        }

        $this->view->render('home', ['data' => $data]);
    }

}
