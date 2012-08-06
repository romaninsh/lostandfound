<?php

class page_register extends Page {

    function init() {
        parent::init();

        // Check if user is already logged in and redirect to home
        if ($this->api->auth->isLoggedIn()) {

            $this->api->redirect('/');
        }

        // Local variables
        $form = $this->add('Form');
        $model = $this->add('Model_User');

        // Form fields from the table user 
        $form->setModel('User', array('first_name', 'last_name', 'email'));
        $form->addField('password', 'password_1', 'Password');
        $form->addField('password', 'password_2', 'Password');
        $form->addField('line', 'created', 'Created')->set($date);

        // Form submit button
        $form->addSubmit('Register');

        // If form is submitted
        if ($form->isSubmitted()) {

            // Check if password fields are not empty
            if ($form->get('password_1') <> "" | $form->get('password_2') <> "") {

                // Check if passwords match
                if ($form->get('password_1') != $form->get('password_2')) {

                    $form->displayError('password_2', 'Passwords does not match');
                } else { // if match do (below):
                    // Set password into table
                    $model->set('password', $form->get('password_1'));

                    // Set created date into table
                    // TODO - missing
                    // update
                    $form->update();
                    $this->js()->univ()->successMessage('User registered with success')
                            ->execute();
                }
            } else { // If password fields are empty
                $form->displayError('password_2', 'Please enter a password');
            }
        }
    }

}

?>