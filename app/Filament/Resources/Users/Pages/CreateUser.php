<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected ?string $plainPassword = null;

    protected  function mutateFormDataBeforeCreate(array $data): array
    {


        $plain = generateHumanReadable(2, 2);
        $this->plainPassword = $plain;

        $data['password'] = $plain;
        $data['email'] = generate_email();

        return  $data;
    }

    protected function afterCreate(): void
    {
        if ($this->plainPassword) {
            // Показываем уведомление с plain паролем. (Будь осторожен — видно в UI!)
            Notification::make()
                ->title('Пользователь создан')
                ->body("Пароль для входа: <strong>{$this->plainPassword}</strong>. Попросите ребёнка сменить пароль при первом входе.")
                ->success()
                ->send();
        }
    }
}
