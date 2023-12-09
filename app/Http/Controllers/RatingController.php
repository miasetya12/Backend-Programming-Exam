<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        // $authorList= DB::table('books')
        //      ->select('author_id')
        //     //  ->distinct()
        //      ->get();

        // $author= Book::select('author_id')
        //  ->distinct()
        // ->get();

        // $author= Book::distinct()->pluck('author_id');
        //  $authorList = Author::whereIn('author_id', $author)->get();
    
           $author = Author::all();
        //   $authorList = Book::pluck('author_id')->unique()->all();
        //  $authorList = Author::whereIn('id', Book::pluck('author_id')->unique()->all())->get();


        // $author = Book::select('author_id')->get();
        return view('rating', [
            'author'=> $author,
            'active' => 'book',
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function getBook($author_id)
    {
        // $bukus = Book::where('author_id', $author_id)->get();
        // return response()->json($bukus);

        $book = Book::where('author_id', $author_id)->get();
        return response()->json($book);

        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $book_id = $request->book_id;
        // $rating = $request->rating;


        $ratings = new Rating();
        $ratings-> book_id=$request->input('book');
        $ratings-> the_rating=$request->input('the_rating');
        // $ratings-> ratings=$request->input('the_rating');
        $ratings->save();

        $averageRatings = Rating::select('book_id', DB::raw('AVG(the_rating) as average_rating'))
        ->groupBy('book_id')
        ->get();

        foreach ($averageRatings as $averageRating) {
            $book = Book::find($averageRating->book_id);
            if ($book) {
                $book->average_rating = $averageRating->average_rating;
                $book->save();
            }
        }

        $voters = Rating::all()->count();
        $voters= Rating::select('book_id', DB::raw('count(*) as voter'))
        ->groupBy('book_id')
        ->get();

            foreach ($voters as $voter) {
               $book = Book::find($voter->book_id);
               if ($book) {
                   $book->voter = $voter->voter;
                   $book->save();
               }
           }
        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
