<?php

namespace App\Http\Controllers;

use App\DTO\BroadcastStoreDTO;
use App\DTO\CreateBroadcastDTO;
use App\Http\Requests\BroadcastIndexRequest;
use App\Http\Requests\BroadcastStoreRequest;
use App\Models\Broadcast;
use App\Services\AntMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class BroadcastController extends Controller
{
    //

    public function index()
    {
        $broadcasts = Broadcast::latest()
            ->paginate();

        return view('home', compact('broadcasts'));
    }

    public function create()
    {
        return view('create');
    }

    /**
     * @throws UnknownProperties
     */
    public function store(BroadcastStoreRequest $request, AntMedia $antMedia)
    {
        $createBroadcastDto = new CreateBroadcastDTO(
            name: $request->name,
            description: $request->description,
            username: auth()->user()->login,
            password: auth()->user()->secret_key,
            type: "liveStream"
        );

        $response = $antMedia->broadcastCreate($createBroadcastDto->all());

        if (!$response->successful()) {
            return back()->withErrors('что-то пошло не так, повторите позже.');
        }

        $storeDto = new BroadcastStoreDTO(
            name: $createBroadcastDto->name,
            description: $createBroadcastDto->description,
            preview: Storage::url($request->file('preview')->store('public/previews')),
            stream_id: $response->object()->streamId
        );

        auth()->user()
            ->broadcasts()
            ->create($storeDto->all());

        return redirect()->route('home')->with('success', 'Стрим успешно добавлен');
    }

    public function show(Broadcast $broadcast, AntMedia $antMedia)
    {
        $response = $antMedia->getBroadcastById($broadcast->stream_id);

        abort_if(!$response->successful(), 404);

        $broadcast->setAttribute('is_online', $response->object()->status == Broadcast::BROADCASTING);

        return view('show', compact('broadcast'));
    }
}
