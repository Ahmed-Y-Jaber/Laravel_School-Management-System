<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request,$folder,$name)
    {
        $file_name = $request->file($name)->getClientOriginalName();
     //   $request->file($name)->storeAs('attachments/library/',$file_name,'upload_attachments');
        $request->file($name)->storeAs('attachments/',$folder.'/'.$file_name,'upload_attachments');
    }

    public function deleteFile($folder,$name)
    {
       // $exists = Storage::disk('upload_attachments')->exists('attachments/library/'.$name);
        $exists = Storage::disk('upload_attachments')->exists('attachments/',$folder.'/'.$name);
        if($exists)
        {
        //    Storage::disk('upload_attachments')->delete('attachments/library/'.$name);
            Storage::disk('upload_attachments')->delete('attachments/',$folder.'/'.$name);
        }
    }
}
