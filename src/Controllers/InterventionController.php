<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\Controllers;

use NINACORE\Core\Support\Facades\File;
use NINACORE\Core\Support\Facades\Image;
use NINACORE\Models\PhotoModel;
use Illuminate\Support\Str;

class InterventionController extends Controller
{
    public function thumb($thumbsize, $path, $folder, $imageUrl)
    {
        $imageUrl = Str::beforeLast($imageUrl, '.webp');
        list($width, $height, $zoom_crop) = array_pad(explode('x', $thumbsize), 3, null);
        $thumb_path = thumb_path() . '/' . $thumbsize . '/' . $path . '/' . $folder;
        if (!File::exists($thumb_path . '/' . $imageUrl . '.webp')) {
            $image = $this->getRead($thumb_path, $folder, $imageUrl, $width, $height, $zoom_crop, $path);
            $image = $image->toWebp(100);
            $image->save($thumb_path . '/' . $imageUrl . '.webp');
            return $image->response();
        } else {
            $image = Image::read($thumb_path . '/' . $imageUrl . '.webp');
        }
        return $image->response();
    }
    public function watermark($thumbsize, $path, $folder, $imageUrl)
    {
        $imageUrl = Str::beforeLast($imageUrl, '.webp');
        list($width, $height, $zoom_crop) = array_pad(explode('x', $thumbsize), 3, null);
        $thumb_path = watermark_path() . '/' . $thumbsize . '/' . $path . '/' . $folder;
        if (!File::exists($thumb_path . '/' . $imageUrl . '.webp')) {
            clock()->event('Read image')->color('grey')->begin();
            $image = $this->getRead($thumb_path, $folder, $imageUrl, $width, $height, $zoom_crop);
            clock()->event('Read image')->end();
            $watermark = PhotoModel::where('type', 'watermark_product')->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->first();
            if (!empty($watermark)) {

                $options = (!empty($watermark['options'])) ? json_decode($watermark['options'], true) : ['position' => 'top-left', 'offset_x' => 0, 'offset_y' => 0, 'opacity' => 100];
                clock()->event('Read wte')->color('grey')->begin();
                $wte = Image::read(upload_path('photo') . '/' . $watermark->photo);
                clock()->event('Read wte')->end();
                $wte->contain(config('type.photo.watermark_product.width'), config('type.photo.watermark_product.height'), background: 'ffffff00', position: 'center');
                $image->place(
                    $wte,
                    $options['position'],
                    $options['offset_x'],
                    $options['offset_y'],
                    $options['opacity'],
                );
            }
            clock()->event('Read toWebp')->color('grey')->begin();
            $image = $image->toWebp(100);
            clock()->event('Read toWebp')->end();
            clock()->event('save toWebp')->color('grey')->begin();
            $image->save($thumb_path . '/' . $imageUrl . '.webp');
            clock()->event('save toWebp')->end();
            return $image->response();
        } else {
            $image = Image::read($thumb_path . '/' . $imageUrl . '.webp');
        }
        return $image->response();
    }
    /**
     * @param string $thumb_path
     * @param $folder
     * @param $imageUrl
     * @param $ext
     * @param mixed $width
     * @param mixed $height
     * @return mixed
     */
    public function getRead(string $thumb_path, $folder, $imageUrl, mixed $width, mixed $height, mixed $zoom_crop, $path = ''): mixed
    {
        if (!file_exists($thumb_path)) mkdir($thumb_path, 0777, true);
        $folder = ($path == 'assets') ? base_path('assets/' . $folder) : upload_path($folder);
        $image = Image::read($folder . '/' . $imageUrl);
        if ($zoom_crop == 3) $image->scale($width, $height);
        else if ($zoom_crop == 2) $image->contain($width, $height, background: 'ffffff', position: 'center');
        else $image->cover($width, $height, position: 'center');
        return $image;
    }
}