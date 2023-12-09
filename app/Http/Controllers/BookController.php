<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
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

        // $book = Book::orderBy('average_rating', 'desc')->take(10)->get(); ;

        $book = Book::where('voter', '>', 2) // Hanya ambil buku dengan minimal 1 voter
            ->orderBy('average_rating', 'desc')
            ->take(10)
            ->get();
            
        return view('main', [
            'book'=> $book,
            //  'voter'=>$voter,
            // 'averageRating'=> $averageRating,
            // 'author' =>$author,
            'active' => 'book',
        ]);
    }


    public function famous()
    {
        $voters = Rating::all()->count();

        $voters= Rating::select('book_id', DB::raw('count(*) as voter'))
        
        ->where('the_rating', '>', 5)
        ->groupBy('book_id')
        ->get();

            foreach ($voters as $voter) {
               $book = Book::find($voter->book_id);
               if ($book) {
                   $book->voter = $voter->voter;
                   $book->save();
               }
           }


    
        $book = Book::select('author_id', DB::raw('SUM(voter) as total_voter'))
        ->groupBy('author_id')
        ->orderBy('total_voter', 'desc')
        ->take(10)
        ->get();

        return view('famous', [
            'book'=> $book,
            'active' => 'book',
        ]);
    }







  /**
     * Show the form for creating a new resource.
     */
    public function test(Request $request)
    {
        $search = $request->input('search');
         $filter = $request->input('filter');
     

        $book = Book::where(function ($query) use ($search) {
            $query->where('book_name', 'like', "%$search%")
                ->orWhereHas('author', function ($authorQuery) use ($search) {
                    $authorQuery->where('author_name', 'like', "%$search%");
                });
        })
        ->orderByDesc('average_rating')
        ->take( $filter)
        ->get();

        return view('/main', compact('book', 'search'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
