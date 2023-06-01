<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelCategory;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;


class SearchChannel extends Controller
{
    public function __invoke(Request $request)
    {

       $result = null;
        if ($request->get('s')!= null && $request->get('cat') == null){
           $result = Channel::query()->where('title', 'like', '%' . request()->get('s') . '%')->select('title','id','slug')->sort()->get();
        }elseif ($request->get('s')!= null && $request->get('cat')!=null)
        {
            $cat_id = ChannelCategory::query()->where('title', $request->get('cat'))->value('id');
            $result = Channel::query()->where('category_id', $cat_id)->where('title', 'like', '%' . request()->get('s') . '%')->where('category_id', $cat_id)->with('categories')->select('title','id','slug')->sort()->get();
        }elseif ($request->get('cat')!=null && $request->get('s')== null){
            $cat_id = ChannelCategory::query()->where('title', $request->get('cat'))->value('id');
            $result = Channel::query()->where('category_id', $cat_id)->sort()->with('categories')->select('title','id')->get();
        }
        if ($result === null)
        {
            return redirect()->route('channel')->with(['info'=>'ничего не найдено']);

        }
        return redirect()->route('channel')->with(['result'=>$result]);
}
}
