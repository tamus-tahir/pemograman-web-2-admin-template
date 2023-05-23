<?php

function upload($file, $oldFile, $temp)
{
    if ($file->getError() == 4) {
        $fileName = $oldFile;
    } else {
        $fileName   = $file->getRandomName();
        $file->move($temp, $fileName);

        if ($oldFile) {
            unlink($temp . '/' . $oldFile);
        }
    }

    return $fileName;
}

function getMenu($param)
{
    return model('NavigasiModel')->getId($param);
}
