<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class CreateBroadcastDTO extends DataTransferObject
{
    public string $name;

    public string $description;

    public string $password;

    public string $username;

    public string $type;
}
