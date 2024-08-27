<?php

namespace App\Filament\ClientAuth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Register as RegisterPage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Register extends RegisterPage
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getFirstNameFormComponent(),
                        $this->getLastNameFormComponent(),
                        $this->getCompanyFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])->columns(2)
                    ->statePath('data'),
            ),
        ];
    }

    protected function getFirstNameFormComponent(): Component
    {
        return TextInput::make('first_name')
            ->label('First name')
            ->placeholder("Enter first name")
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

    protected function getLastNameFormComponent(): Component
    {
        return TextInput::make('last_name')
            ->label('Last name')
            ->placeholder("Enter last name")
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

    protected function getCompanyFormComponent(): Component
    {
        return TextInput::make('company')
            ->required()
            ->placeholder("Enter company name")
            ->maxLength(255)
            ->autofocus();
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label(__('filament-panels::pages/auth/register.form.email.label'))
            ->email()
            ->placeholder("Enter email address")
            ->required()
            ->maxLength(255)
            ->unique($this->getUserModel());
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label(__('filament-panels::pages/auth/register.form.password.label'))
            ->password()
            ->placeholder("Enter password")
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->rule(Password::default())
            ->dehydrateStateUsing(fn($state) => Hash::make($state))
            ->same('passwordConfirmation')
            ->validationAttribute(__('filament-panels::pages/auth/register.form.password.validation_attribute'));
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return TextInput::make('passwordConfirmation')
            ->label(__('filament-panels::pages/auth/register.form.password_confirmation.label'))
            ->password()
            ->placeholder("Confirm password")
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->dehydrated(false);
    }
}
