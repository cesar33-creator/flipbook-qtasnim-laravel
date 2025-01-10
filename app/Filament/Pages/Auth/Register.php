<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Page;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Pages\Auth\Register as AuthRegister;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Spatie\Permission\Models\Role as ModelsRole;

class Register extends AuthRegister
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // protected static string $view = 'filament.pages.auth.register';

    public function form(Form $form): Form
    {
        return $form->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getRoleFormComponent(),
                    ])
                    ->statePath('data');
    }

    protected function getRoleFormComponent(): Select
    {
        return Select::make('role')
            ->options(ModelsRole::all()->pluck('name', 'id'))
            ->required()
            ->label('Role');
    }
}
