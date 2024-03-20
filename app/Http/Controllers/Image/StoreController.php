<?php

namespace App\Http\Controllers\Image;

use App\Http\Requests\Image\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->Store($data);

        return redirect()->route('image.index');
    }
}