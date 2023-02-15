<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    protected $rluse = [
        'name' => ['required','string','between:2,255'],
        'parent_id' => ['nullable','int','exists:categories,id'],
        'description' => ['required','nullable','string'],
        'art_file' => ['nullable','image'],
    ];
    protected $messages = [
        'name.required' => 'This :attribute filed is mandatory'
    ];

    public function index($id = 0)
    {
        // return __METHOD__ ;
        // $categories = DB::table('categories')->get();
        $categories = Category::paginate();

           return view('categories.index' , [
            'categories' => $categories,
            'title' => 'Categories',
            // 'flashMessage' => session('success'),
           ]);
        // $title = 'Categories';
        // return view('categories.index', compact('categories', 'title'));
    }
    public function show($id)
    {
        // return __METHOD__ ;
        // $category = DB::table('categories')->where('id' , '=' , $id)->first();
        // $category = Category::where('id' , '=' , $id)->first();
        $category = Category::findOrFail($id);

        // if($category == null){
        //     abort(404);
        // }
        return view('categories.show', [
            'category' => $category
        ]);

        // dd($categories);

    }
    public function create()
    {
        $parents = Category::all();
        return view('categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        // dd(
        //     $request->name,
        //     $request->input('name'),
        //     $request->get('name'),
        //     $request->post('name'),
        //     $request['name'],
        // );

        $clean = $request->validate($this->rluse , $this->messages);
        // $clean = $this->validate($request,$rluse);

        // $Validator = Validator::make($request->all(), $rluse);
        // $clean = $Validator->validate();

        // $request->validate([
        //     'name' => ['required','string','between:2,255'],
        //     'parent_id' => ['nullable','int','exists:categories,id'],
        //     'description' => ['nullable','string'],
        //     'art_file' => ['nullable','image'],
        // ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($category->name);

        $category->save();

        return redirect()
        ->route('categories.index')->with('success', 'Category Create!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::all();
        return view('categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request,  $id)
    {
        $category = Category::findOrFail($id);

        $clean = $request->validate($this->rluse , $this->messages);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($category->name);

        $category->save();

        return redirect()
        ->route('categories.index')
        ->with('success', 'Category Update!');
    }

    public function destroy($id)
    {
        // DB::table('categories')->where('id' ,$id)->delete();
        // Category::where('id' , $id)->delete();
        Category::destroy($id);

        // $category = Category::findOrFail($id);
        // $category->delete();



        return redirect()
        ->route('categories.index')
        ->with('success', 'Category Delete!');
    }
}
