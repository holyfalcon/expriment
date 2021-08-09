<?php

    function flash($message , $level = 'info')
    {
        session()->flash('flash_message',$message);
        session()->flash('flash_level',$level);
    }

    function storeImage($ImageObject){

        $file = $ImageObject;
        $imgname = 'storage/' . time() . $file->getClientOriginalName();
        $file->move('storage', $imgname);
        return $imgname;
    }
//$file = $validated['imagePost'];
//$imgname = 'storage/' . time() . $file->getClientOriginalName();
//$file->move('storage', $imgname);
