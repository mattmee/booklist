<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\booklist;

class booklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(request()->input('r') == 'author')
		{
			$books = booklist::orderBy('author')->get();
		}
		else if(request()->input('r') == 'title')
		{
			$books = booklist::orderby('title')->get();
		}
		else 
		{
			$books = booklist::orderBy('rank')->get();	
		}
        return view('book-list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newBook = new booklist;
		$newBook->title = $request->bookTitle;
		$newBook->author = $request->bookAuthor;
		$newBook->publicationDate = $request->publicationDate;
		$newBook->rank = booklist::all()->count() + 1;
		$newBook->save();
		return redirect('book-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$item = booklist::find($id);
        return view('bookview', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = booklist::find($id);
		$currentRank = $item->rank;
		$item->rank = 0;
		$item->save();
		$booklistTable = (new booklist())->getTable();
		DB::table($booklistTable)->where('rank', '<', $currentRank)->update(array('rank' => DB::raw('rank + 1')));
		return redirect('book-list');
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = booklist::find($id);
		$currentRank = $item->rank;
		$item->delete();
		$booklistTable = (new booklist())->getTable();
		DB::table($booklistTable)->where('rank', '>', $currentRank)->update(array('rank' => DB::raw('rank - 1')));
		return redirect('book-list');
    }
}
