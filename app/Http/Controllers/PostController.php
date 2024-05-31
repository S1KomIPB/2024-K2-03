<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Lab;
use App\Models\Jenjang;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home', [
            'title' => 'Products',
            "products" => Post::latest('published_at')->paginate(6)
        ]);
    }

    public function products()
    {
        $products = Post::all();
        return view('products.index', ['title' => 'Products'], compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form', [
            'title' =>'Upload',
            'labs' => Lab::all(),
            'jenjangs' => Jenjang::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'authorFirstName' => 'required',
            'authorLastName' => 'required',
            'title' => 'required|max:255',
            'published_at' => 'required', //??
            'slug' => 'required',
            'lab_id' => 'required',
            'jenjang_id' => 'required',
            'dosenFirstName' => 'required',
            'dosenLastName' => 'required',
            'abstract' => 'required',
            'poster' => 'image|file|max:6000',
            'pdf' => 'file|mimes:pdf'
        ]);

        $validatedData['url'] = $request->input('url', ''); 

        $validatedData['published_at'] = $request->input('published_at', 'stripes');
        
        $validatedData['poster'] = $request->file('poster')->store('cover-poster');

        $validatedData['pdf'] = $request->file('pdf')->store('thesis-files');
        
        $validatedData['user_id'] = auth()->user()->id;

        // Store the post in the database
        $post = Post::create($validatedData);

        // Redirect to the post's page with a success message
        return redirect('/post/' . $post->slug)->with('success', 'Your Product Has Been Added');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Product",
            "product" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Post::findorfail($id);
        $labs = Lab::all();
        $jenjangs = Jenjang::all();
        $title = "Product / Edit / " . $product->title;
        return view('products.edit', ['title' => $title], compact('product', 'labs', 'jenjangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Post::findorfail($id);

        if($request->poster == null){
            $request->poster =  $product->poster;
        }

        if($request->pdf == null){
            $request->pdf =  $product->pdf;
        }

        $rules =[
            'title' => 'required|max:255',
            'published_at' => 'required',
            'lab_id' => 'required',
            'jenjang_id' => 'required',
            'dosenFirstName' => 'required',
            'dosenLastName' => 'required',
            'abstract' => 'required'
        ];

        $validatedata = $request->validate($rules);

        $product->where('id', $product->id)->update($validatedata);

        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Post::findorfail($id);
        $product->delete();
        return redirect('/products');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        
        $message = '';

        if (!empty($search)) {
            $posts = Post::where(function ($query) use ($search) {
                $query->searchByTitle($search)
                    ->orWhere(function ($query) use ($search) {
                        $query->searchByFirstName($search);
                    })
                    ->orWhere(function ($query) use ($search) {
                        $query->searchByLastName($search);
                    });
            })->paginate(6);

            if ($posts->isEmpty()) {
                $message = 'No posts found.';
            }
        } else {
            $posts = Post::latest('published_at')->paginate(6);
        }

        return view('home', [
            'title' => !empty($search) ? "Search results for '$search'" : 'Products',
            'products' => $posts,
            'searchMessage' => $message, 
        ]);
    }

    // Not yet
    public function searchPostsAdmin(Request $request)
    {
        $search = $request->input('searchadmin');

        $posts = Post::where(function ($query) use ($search) {
            $query->searchByTitle($search)
                ->orWhere(function ($query) use ($search) {
                    $query->searchByFirstName($search);
                })
                ->orWhere(function ($query) use ($search) {
                    $query->searchByLastName($search);
                });
        })->paginate(6);

        if ($posts->isEmpty()) {
            $message = 'No posts found.';
        } else {
            $message = '';
        }

        return view('products/index', [
            'title' => "Search results for '$search'",
            'products' => $posts,
            'searchMessage' => $message,
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function filterPost(Request $request)
    {
        $labs = $request->input('lab', []);
        $jenjangs = $request->input('jenjang', []);

        $posts = Post::when(count($labs) > 0, function($query) use ($labs) {
            return $query->whereIn('lab_id', $labs);
        })
            ->when(count($jenjangs) > 0, function($query) use ($jenjangs) {
                return $query->whereIn('jenjang_id', $jenjangs);
            })
            ->paginate(9999);
            
//        dd($posts);

        if ($posts->isEmpty()) {
            $message = 'No posts found.';
        } else {
            $message = '';
        }

        return view('home', [
            'title' => "Products",
            "products" => $posts,
           'searchMessage' => $message,
        ]);
    }
}

