<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/19/2018
 * Time: 12:51 AM
 */

namespace App\Http\Controllers\Misc;


use App\Eloquents\Attachment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttachmentController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    function insert(Request $request)
    {
        $constrains = collect([
            'size' => '3',
            'destination' => 'files',
            'context' => 'general'
        ])->merge([]);
        $file = $request->file('attachment');
        $extension = $file->getClientOriginalExtension();
        $attachment = (new Attachment)->create([
            'uri' => $file->storeAs("attachments/{$constrains->get('destination')}", $file->hashName()),
            'mime' => $file->getMimeType(),
            'extension' => $extension,
            'size' => $file->getSize(),
            'type' => $file->getType(),
            'user_id' => loggedId(),
        ]);

        return response()->json(['attachment' => $attachment]);
    }
}