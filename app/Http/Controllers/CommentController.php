<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentCollection;
use App\Models\Cart;
use App\Models\comment;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\Return_;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexApi(Request $request)
    {
        $restaurant_id= $request->get('restaurant_id');
        $comments=Restaurant::query()->find($restaurant_id)->comments;
        return response(new CommentCollection($comments));
    }

    public function index()
    {
        $this->authorize('viewAny', Comment::class);
        $comments = Comment::paginate(10);

        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    Comment::query()->create($request->validate([
        'cart_id'=>['required'],
        'score'=>['required'],
        'content'=>['required','string']
    ]));
     return response([
         'massage'=> 'your comment added successfully.'
     ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $carts = Cart::where('restaurant_id', $user->restaurant->id)->get();

        $comments = Comment::whereIn('cart_id', $carts->pluck('id'))->get();
        dd($comments);

//        return view('comment.show', ['comments' => $comments]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        //
    }
}
