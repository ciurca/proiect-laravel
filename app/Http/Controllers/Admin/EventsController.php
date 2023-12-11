<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Eveniment;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        $request->validate([
//            'title' => 'required|max:255',
//            'body' => 'required',
//        ]);
//        Post::create($request->all());
//        return redirect()->route('posts.index')
//            ->with('success', 'Post created successfully.');
//    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//        $request->validate([
//            'title' => 'required|max:255',
//            'body' => 'required',
//        ]);
//        $post = Post::find($id);
//        $post->update($request->all());
//        return redirect()->route('posts.index')
//            ->with('success', 'Post updated successfully.');
//    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $event = Eveniment::find($id);
        $event->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully');
    }
    // routes functions
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        return view('posts.create');
//    }
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        $post = Post::find($id);
//        return view('posts.show', compact('post'));
//    }
    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        $post = Post::find($id);
//        return view('posts.edit', compact('post'));
//    }
}
