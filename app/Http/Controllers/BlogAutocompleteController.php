<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\JsonResponse;

class BlogAutocompleteController extends Controller
{
    //

    public function __invoke(Request $request){

        $searchTerm = $request->get('search');

        if(!$searchTerm || strlen($searchTerm) < 3){
            return response()->json([]);
        }

        $result = Blog::where('title','like',$searchTerm . '%')->latest()->take(5)->get();
        $formattedResult = [];

        foreach($result as $item){
            $formattedResult[] = ['lable' => $item->title, 'value' => $item->id];
        }

        return new JsonResponse($formattedResult);

    }
}
