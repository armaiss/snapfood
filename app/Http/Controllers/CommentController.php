<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentCollection;
use App\Models\Auth;
use App\Models\Cart;
use App\Models\comment;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
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
        if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin')){
            $this->authorize('viewAny', Comment::class);
            $filter = \request()->input('filter_status');
            $comments = Comment::query()->when(!empty($filter),function ($query) use ($filter){
                return $query->where('status', $filter);
            })->paginate(5);

            return view('comment.index', compact('comments'));
        }
        else{
//            $carts = Cart::where('restaurant_id', $user->restaurant->id)->get();

//        $comments = Comment::whereIn('cart_id', $carts->pluck('id'))->get();
            $comments =\Illuminate\Support\Facades\Auth::user()->restaurant->comments;
            $filter = \request()->input('filter_food');
//            $comments = $comments->when(!empty($filter),function ($query) use ($filter){
//                return $query->map(function ($comment){
//                    return $comment->cart;
//
//                })->map(fn($cart)=>$cart->foods)->map(fn($food));
//
//            });
//dd($comments);
            return view('comment.index', compact('comments'));
        }

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
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update([
            'status' => $request->input('status'),
        ]);


        return redirect()->route('comments.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
       return 1;
    }

    public function indexByStatus(Request $request)
    {
        $carts = Auth::user()->restaurant->carts->where('status','!=','تحویل گرفته شد');
        $filter = $request->get('filter_status');
        return view('comment.index',[
            'carts'=>$carts->when(!empty($filter),function ($query) use ($filter){
                return $query->where('status', $filter);
            })->paginate(5),
        ]);

    }
//    public function indexByFood(Request $request)
//    {
//        if (Auth::user()->hasRole('admin')){
//            $foods = Food::all();
//        }
//        else{
//            $foods =  Auth::user()->restaurant->foods;
//        }
//
//        $filter = $request->get('food_name');
//        $comments = Comment::whereHas('food', function ($query) use ($filter) {
//            $query->where('name', $filter);
//        })->get();
//
//        return view('comment.index', ['foods' => $foods, 'comments' => $comments]);
//    }
}
