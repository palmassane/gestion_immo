<?php

namespace App\Services;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageResize
{
    public function buildUrl(
        string $resizeKey,
        string $sourceImageUrl,
        array $imageParams = []
    ) {
        $targetWidth = Arr::get(config("imageresize.sizes.{$resizeKey}"), 'w');
        $targetHeight = Arr::get(config("imageresize.sizes.{$resizeKey}"), 'h');

        $sourceImageUrl = trim($sourceImageUrl, '/');
        $extension = pathinfo($sourceImageUrl, PATHINFO_EXTENSION);
        $resizePath = sprintf(str_replace(".{$extension}", '_%sx%s.jpg', $sourceImageUrl), $targetWidth, $targetHeight);

        if ( !file_exists(public_path('storage/' . $resizePath)) ) {
            if (!file_exists(public_path('storage/' . $sourceImageUrl))) {
                throw new FileNotFoundException(sprintf('File `%s` does not exist!', $sourceImageUrl));
            }

            $image = Image::make(public_path('storage/' . $sourceImageUrl));

            if ($image->width() > $targetWidth || $image->height() > $targetHeight) {
                if ($image->width() / $targetWidth > $image->height() / $targetHeight) {
                    $image->resize($targetWidth, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $image->resize(null, $targetHeight, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            $canvas = Image::canvas($targetWidth, $targetHeight);
            $canvas->fill('#ffffff');
            $canvas->insert($image, 'center');
            $canvas->save(public_path('storage/' . $resizePath));
        }

        return Storage::url($resizePath);

        /*if ( !file_exists(public_path('storage/' . $resizePath)) ) {
            if ( !file_exists(public_path('storage/' . $sourceImageUrl)) ) {
                throw new FileNotFoundException(sprintf('File `%s` does not exist!', $sourceImageUrl));
            }

            $image = Image::make(public_path('storage/' . $sourceImageUrl));

            if (
                isset($targetWidth) && !empty($targetWidth)
                && isset($targetHeight) && !empty($targetHeight)
            ) {
                $image->resize($targetWidth, $targetHeight, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $canvas = Image::canvas($targetWidth, $targetHeight);
                $canvas->fill('#ffffff');
                $canvas->insert($image, 'center');

                $canvas->save(public_path('storage/' . $resizePath));
                //$image->resizeCanvas($targetWidth, $targetHeight, 'center', false, '#ffffff');
            } elseif (
                $image->width() > $targetWidth
                && isset($targetWidth) && !empty($targetWidth)
            ) {
                if ($image->width() > $targetWidth) {
                    $image->resize($targetWidth, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $image->resize($image->width(), null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            } elseif (
                $image->height() > $targetHeight
                && isset($targetHeight) && !empty($targetHeight)
            ) {
                if ($image->height() > $targetHeight) {
                    $image->resize(null, $targetHeight, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                } else {
                    $image->resize(null, $image->height(), function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            }

            $image->save(public_path('storage/' . $resizePath));
        }

        return '/storage/' . $resizePath;*/
    }

    public function buildUrlPlaceholder(
        string $resizeKey
    ) {
        $targetWidth = Arr::get(config("imageresize.sizes.{$resizeKey}"), 'w');
        $targetHeight = Arr::get(config("imageresize.sizes.{$resizeKey}"), 'h');
        return "https://placehold.co/{$targetWidth}x{$targetHeight}";
    }
}
