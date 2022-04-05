<?php

function getSocialAvatar($file, $path, $user){
    $fileContents = file_get_contents($file);
    \File::put(public_path() . '/' . $path . $user->getId() . ".jpg", $fileContents);
    return public_path($path . $user->getId() . ".jpg");
}
