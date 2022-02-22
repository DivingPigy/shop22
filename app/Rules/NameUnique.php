<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Game;
use Illuminate\Support\Collection;

class NameUnique implements Rule
{
    /**
     * 平台id
     *
     * @var [int]]
     */
    protected $plateform_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $plateform_id)
    {
        $this -> plateform_id = $plateform_id;
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
        $games = Game::where('plateform_id' , $this -> plateform_id) -> get('name');
        $games_arr = [];
        foreach($games as $game)
        {
            array_push($games_arr , strtoupper(str_replace(" " , "" , $game -> name )));
        }
        $games = collect($games_arr); 
        return !$games -> contains(strtoupper(str_replace(" " , "" , $value )));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '同一个平台中，已经存在重复的游戏名称，请注意您的空格，或者大小写';
    }
}
