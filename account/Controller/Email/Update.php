<?php

/**
 * @package monolyth
 * @subpackage account
 */

namespace monolyth\account;
use monolyth\Controller;
use monolyth\Login_Required;

class Update_Email_Controller extends Controller implements Login_Required
{
    public function __construct()
    {
        parent::__construct();
        $this->form = new Update_Email_Form;
    }

    protected function get(array $args)
    {
        return $this->view('page/email/update');
    }

    protected function post(array $args)
    {
        if (!$this->form->errors()) {
            $account = new User_Model;
            if (!($error = $account->email($this->form))) {
                self::message()->add(
                    'success',
                    $this->text('./confirm')
                );
            } else {
                self::message()->add(
                    'error',
                    $this->text("./error.$error")
                );
            }
        }
        return $this->get($args);
    }
}

