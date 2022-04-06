<?php

function getSocialAvatar($file, $user){
    $profilePicture = file_get_contents($file);
    $filename = $user->getId() . ".jpg";
    Storage::disk('public')->put('images/'.$filename, $profilePicture);
    return $filename;
}
