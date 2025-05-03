<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getCreatedNotificationRedirectUrl(): ?string
    {
        return static::$resource::getUrl('index'); 
    }

    protected function getRedirectUrl(): string
    {
        return static::$resource::getUrl('index'); 
    }
}
