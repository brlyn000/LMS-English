<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class MediaCompressionService
{
    public function compressImage(UploadedFile $file, $maxWidth = 1200, $quality = 80)
    {
        $filename = time() . '_' . uniqid() . '.jpg';
        $path = storage_path('app/public/compressed/' . $filename);
        
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }
        
        try {
            $source = imagecreatefromstring(file_get_contents($file));
            if (!$source) {
                throw new \Exception('Cannot create image from file');
            }
            
            $width = imagesx($source);
            $height = imagesy($source);
            
            if ($width > $maxWidth) {
                $newHeight = intval(($height / $width) * $maxWidth);
                $resized = imagecreatetruecolor($maxWidth, $newHeight);
                imagecopyresampled($resized, $source, 0, 0, 0, 0, $maxWidth, $newHeight, $width, $height);
                imagejpeg($resized, $path, $quality);
                imagedestroy($resized);
            } else {
                imagejpeg($source, $path, $quality);
            }
            
            imagedestroy($source);
            return 'compressed/' . $filename;
        } catch (\Exception $e) {
            // Fallback: store without compression
            return $file->store('compressed', 'public');
        }
    }
    
    public function compressVideo(UploadedFile $file)
    {
        $filename = time() . '_' . uniqid() . '.mp4';
        $file->storeAs('compressed', $filename, 'public');
        return 'compressed/' . $filename;
    }
}