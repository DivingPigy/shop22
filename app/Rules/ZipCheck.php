<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Services\UploadsZip;
use App\Models\Import;
use Illuminate\Support\Facades\Storage;
use Zipper;

class ZipCheck implements Rule
{
    protected $request;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this -> request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $import = Import::findOrFail($this -> request -> import_id);
        $remains = $import -> total - $import -> imported;

        Storage::disk('local') -> deleteDirectory("/tmp");
        $path = $this -> request -> file('zip') -> store("/tmp");  
        $zip = Zipper::make(storage_path("app/") . $path) -> extractTo(storage_path("app/temp"));
        $files = Storage::disk('local') -> allFiles("/temp");
        Storage::disk('local') -> deleteDirectory("/temp");

        return $remains >= count($files);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '上传压缩包中照片的数量超过了剩余的采购数量';
    }
}
