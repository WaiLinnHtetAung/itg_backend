<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blogs.index');
    }

    /**
     * get data with datatable
     */
    public function dataTable()
    {
        $data = Blog::with('author');

        return Datatables::of($data)
            ->editColumn('plus-icon', function ($each) {
                return null;
            })
            ->editColumn('photo', function ($each) {
                return '<img src="' . $each->getUrl() . '" width="100" />';
            })
            ->editColumn('author_id', function ($each) {
                return $each->author->name;
            })
            ->addColumn('action', function ($each) {
                $show_icon = '';
                $edit_icon = '';
                $del_icon = '';

                if (auth()->user()->can('blog_show')) {
                    $show_icon = '<a href="' . route('admin.blogs.show', $each->id) . '" class="text-warning me-3"><i class="bx bxs-show fs-4"></i></a>';
                }

                if (auth()->user()->can('blog_edit')) {
                    $edit_icon = '<a href="' . route('admin.blogs.edit', $each->id) . '" class="text-info me-3"><i class="bx bx-edit fs-4" ></i></a>';
                }

                if (auth()->user()->can('blog_delete')) {
                    $del_icon = '<a href="" class="text-danger delete-btn" data-id="' . $each->id . '"><i class="bx bxs-trash-alt fs-4" ></i></a>';

                }

                return '<div class="action-icon text-nowrap">' . $show_icon . $edit_icon . $del_icon . '</div>';
            })
            ->rawColumns(['photo', 'action'])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::pluck('name', 'id');

        return view('admin.blogs.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create($request->all());

        if ($request->file('photo')) {
            $fileName = uniqid() . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/images', $fileName);

            $blog->update(['photo' => $fileName]);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Created Blog Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog = $blog->load('author');

        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $users = User::pluck('name', 'id');
        return view('admin.blogs.edit', compact('blog', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $oldPhotoName = $blog->photo;

        $blog->update($request->all());
        if ($request->file('photo')) {
            if ($oldPhotoName) {
                Storage::disk('public')->delete('images/' . $oldPhotoName);
            }

            $newPhotoName = uniqid() . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/images', $newPhotoName);
            $blog->update(['photo' => $newPhotoName]);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Edited Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->photo) {
            Storage::disk('public')->delete('images/' . $blog->photo);
        }
        $blog->delete();

        return 'success';
    }
}
