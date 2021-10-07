<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    public static function storeNews(array $data)
    {
        $img = null;

        if ($file = data_get($data, 'photo')) {
            /** @var $file UploadedFile */
            dd($file);
//            dd($file->getClientOriginalName());
            $imgName = $file->getClientOriginalName();
            $img = 'storage/images/' . $imgName;
            if (Storage::disk('public')->missing($imgName)) {
                $file->storeAs('images', $imgName, 'public');
            }
        }

        $news = News::create([
            'name' => data_get($data, 'name'),
            'mainText' => data_get($data, 'mainText'),
            'desc' => data_get($data, 'desc'),
            'user_id' => auth()->id(),
            'img' => $img,
        ]);

        $news->categories()->attach(data_get($data, 'cetegories'));

        return true;
    }

    public static function updateNews(array $data)
    {
        $img = null;

        if ($file = data_get($data, 'photo')) {
            /** @var $file UploadedFile */

            $file->storeAs('images/', $file->getClientOriginalName());
            $img  = 'images/'.$file->getClientOriginalName();
        }

        News::where('id', data_get($data, 'id'))
            ->update([
                'name' => data_get($data, 'name'),
                'mainText' => data_get($data, 'mainText'),
                'desc' => data_get($data, 'desc'),
                'img' => $img,
            ]);

        return true;
    }
}
