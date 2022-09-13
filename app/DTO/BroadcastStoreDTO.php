<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;

class BroadcastStoreDTO extends DataTransferObject
{
    public string $name;

    public string $description;

    public string $preview;

    public string $stream_id;
}
