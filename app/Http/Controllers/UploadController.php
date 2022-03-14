<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {

        if ($request->hasFile('avatar')) {

            $files = $request->file('avatar');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $path = $file->storeAs('avatars' . DIRECTORY_SEPARATOR . $folder, $filename, 'public');

                Picture::create([
                    'folder' => $folder,
                    'filename' => $filename,
                    'path' => $path,
                ]);

                return $path;
            }
        }

        return '';
    }

    public function delete(Request $request)
    {

        $avatar = Picture::where('path', $request->get('path'))->first();

        if (Storage::disk('public')->delete($avatar->path)) {
            rmdir(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . $avatar->folder));
        }

        $avatar->delete();

        return response('ok', 200);
    }
}
