<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentCollection;
use App\Models\Auth;
use App\Models\Cart;
use App\Models\Order;
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
        if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin')) {
            $this->authorize('viewAny', Comment::class);
            $filter = \request()->input('filter_status');
            $comments = Comment::query()
                ->when(!empty($filter), function ($query) use ($filter) {
                    return $query->where('status', $filter);
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            return view('comment.index', compact('comments'));
        } else {
            $comments = \Illuminate\Support\Facades\Auth::user()->restaurant->comments;
            $filter = \request()->input('filter_food');

            $comments = $comments->when(!empty($filter), function ($query) use ($filter) {
                $food = Food::query()->find($filter);
                return $query->filter(function ($comment) use ($food) {
                    return $comment->cart->foods->contains($food);
                });
            })
                ->sortByDesc('created_at')
                ->values();

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
        $this->authorize('delete', $comment);
        $comment->delete();


        return redirect()->route('comments.index')->with('success', 'نظر با موفقیت حذف شد.');

    }
}
