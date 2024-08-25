<?php

namespace App\Livewire;

use App\Livewire\Forms\UserRegistrationForm;
use App\Providers\RouteServiceProvider;
use Livewire\Component;

class UserRegistration extends Component
{
    public $event_title = '';
    public $active_tab = 'initial-details';
    public UserRegistrationForm $form;

    public function render()
    {
        return view('livewire.user-registration');
    }

    public function save()
    {
        $this->form->store();

        return redirect(RouteServiceProvider::HOME);
    }

    public function validateInitialDetails()
    {
        $initialFields = [
            "first_name",
            "last_name",
            "email",
            "password",
            "password_confirmation"
        ];
        foreach ($initialFields as $field) {
            $this->form->validateOnly($field);
        }

        $this->dispatch('initial-details-validated', nextTab: 'final-details');
    }
}
