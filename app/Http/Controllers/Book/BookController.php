<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Request;

class BookController extends Controller
{
    // Standar responses
    //use ApiResponser;

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
      
    }

    /**
     * Create an instance of Book
     * @return Illuminate\Http\Response
     */
    public function storeBook(Request $request){
       
    }


    /**
     * Return an specific Book
     * @return Illuminate\Http\Response
     */
    public function getBook($book){
       
    }

    /**
     * Update an especific book data
     * @return Illuminate\Http\Response
     */
    public function updateBook(Request $request, $book){
       
    }

    /**
     * Delete an specific book data
     * @return Illuminate\Http\Response
     */
    public function deleteBook($book){
       
    }
}
