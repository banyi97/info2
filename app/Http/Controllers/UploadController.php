<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAlbumPic(Request $request, $id)
    {
        //
        $datetime = date("Y-m-d H:i:s");
        if ($request->file('photo')->isValid()) {
            //
            $path = $request->photo->store('public');
            $filename = basename($path);
            DB::table('albums')
                ->where('albums.id', $id)
                ->update([
                    'pic_url' => $filename,
                    'updated_at' => $datetime
                ]);
        return response()->json(['success' => $filename], 200);
        }
    }

    public function storeArtistPic(Request $request, $id)
    {
        //
        $datetime = date("Y-m-d H:i:s");
        if ($request->file('photo')->isValid()) {
            //
            $path = $request->photo->store('public');
            $filename = basename($path);
            DB::table('artists')
                ->where('artists.id', $id)
                ->update([
                    'pic_url' => $filename,
                    'updated_at' => $datetime
                ]);
        return response()->json(['success' => $filename], 200);
        }
    }

    public function storeSongs(Request $request, $id)
    {
        //
        if ($request->file('photo')->isValid()) {
            //
            $path = $request->photo->store('public');
        }
    }
    
    public function storeTest(Request $request)
    {
        
        return Storage::url();
        
    }
}
