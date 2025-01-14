<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Page;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Pages\Auth\Register as AuthRegister;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;

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

            FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->directory('photos'),
            Select::make('gender')
                ->label('Gender')
                ->options([
                    'pria' => 'Pria',
                    'wanita' => 'Wanita',
                ]),
            TextInput::make('bio')
                ->label('Bio'),
            TextInput::make('phone_number')
                ->label('Phone'),
        ])
            ->statePath('data');
    }

    protected function getRoleFormComponent(): Select
    {
        return Select::make('role_id')
            ->options(ModelsRole::all()->pluck('name', 'id'))
            ->required()
            ->label('Role');
    }
}
