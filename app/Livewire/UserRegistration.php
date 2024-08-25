<?php

namespace App\Livewire;

use App\Enums\ProfileType;
use App\Livewire\Forms\UserDetailsForm;
use App\Providers\RouteServiceProvider;
use Livewire\Component;

class UserRegistration extends Component
{
    public $type = ProfileType::User;
    public $login_action = '';
    public $event_title = '';
    public $active_tab = 'initial-details';

    public UserDetailsForm $form;

    public function render()
    {
        return view('livewire.user-registration');
    }

    public function save()
    {
        $this->form->type = $this->type;
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

        $this->dispatch('initial-details-validated', nextTab: match ($this->type) {
            ProfileType::User => 'final-details',
            ProfileType::Exhibitor => 'company-details',
        });
    }
}
