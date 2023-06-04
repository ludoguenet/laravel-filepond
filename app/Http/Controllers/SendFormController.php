<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RahulHaque\Filepond\Facades\Filepond;

class SendFormController extends Controller
{
    public function __invoke(
        Request $request
    ): JsonResponse {
        $request->validate([
           'gallery.*' => Rule::filepond([
               'required',
               'image',
               'max:2000',
           ]),
        ]);

        $galleryName = 'gallery-' . 1;

        $fileInfos = Filepond::field($request->gallery)
            ->moveTo('galleries/' . $galleryName);

        return response()->json([
            'success' => true,
            'data' => $fileInfos,
        ]);
    }
}
