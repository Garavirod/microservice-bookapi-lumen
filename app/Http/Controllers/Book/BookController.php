<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    // Standar responses
    use ApiResponser;

    public function __construct()
    {
        //
    }

    /**
     * Return a Book's list
     * @return Illuminate\Http\Response
     */
    public function booksList()
    {
      $books = Book::all();
      return $this->successResponse($books);
    }

    /**
     * Create an instance of Book
     * @return Illuminate\Http\Response
     */
    public function storeBook(Request $request){
        $rules =[
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
            'price'=> 'required|min:1',
            'author_id'=> 'required|min:1',
        ];

        $this->validate($request,$rules);
        $book = Book::create($request->all());
        return $this->successResponse($book,Response::HTTP_CREATED);
    }


    /**
     * Return an specific Book
     * @return Illuminate\Http\Response
     */
    public function getBook($book){
       $book = Book::findOrFail($book);
       return $this->successResponse($book);
    }

    /**
     * Update an especific book data
     * @return Illuminate\Http\Response
     */
    public function updateBook(Request $request, $book){
        $rules =[
            'title'=> 'max:255',
            'description'=> 'max:255',
            'price'=> 'min:1',
            'author_id'=> 'min:1',
        ];

        $this->validate($request,$rules);

        $book = Book::findOrFail($book);

        $book->fill($request->all());
        
        // Validate if user has changed its data
        if($book->isClean()){
            return $this->errorResponse('At least one value must change',Response::HTTP_UNPROCESSABLE_ENTITY); //422
        }

        $book->save();

        return $this->successResponse($book);
    }

    /**
     * Delete an specific book data
     * @return Illuminate\Http\Response
     */
    public function deleteBook($book){
       $book  = Book::findOrFail($book);
       $book->delete();
       return $this->successResponse($book);
    }
}
