<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\MyList;
use App\User;
use DB;

class ListsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['index', 'show']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = MyList::orderBy('created_at', 'desc')->paginate(4);
        return view('pages.lists')->with('lists', $lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('pages/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $post = new MyList;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // $post->MyList()->tasks()->$request->input('title');
        // $post->MyList()->tasks()->$request->input('body');
        // $post->list_id = mylist()->id;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/dashboard')->with('success', 'List Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user_id = auth()->user()->id;
        $showList = User::find($user_id);
        // $showList = MyList::all();
        return view('pages.view')->with('showList', $showList->mylists);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $showList = MyList::find($id);
        if(auth()->user()->id != $showList->user_id){
            return redirect('/lists')->with('error', 'Unauthorized Page');
        }
        return view('pages.edit')->with('showList', $showList);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = MyList::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save(); 

        return redirect('/dashboard')->with('success', 'List Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $showList = MyList::find($id);
        if(auth()->user()->id != $showList->user_id){
            return redirect('/lists')->with('error', 'Unauthorized Page');
        }
        $showList->delete();
        
        return redirect('/dashboard')->with('success', 'List Removed');
    }
}
