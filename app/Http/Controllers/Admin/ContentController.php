<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Str;

class ContentController extends Controller
{
	public function contentList(){
		$contents = Content::orderBy('id','desc')->where('deleted','No')->get();
    	//return $contents;
		return view('admin.home.content.content-list',compact('contents'));
	}

	public function addContent(){
		return view('admin.home.content.add-content');
	}

	public function contentSave(Request $request){
		$content = new Content();
		$content->content_title = $request->content_title;
		$content->content_description = $request->content_description;
		$content->status = $request->status;
		$content->alias = Str::slug($request->alias, '-');
		$content->sequence = $request->sequence;
		$content->created_by = auth()->user()->id;
		$content->save();
		return redirect()->back()->with('message','Content created successfully');
	}

	public function editContent($id){

		$content = Content::where('id',$id)->first();
		return view('admin.home.content.edit-content',compact('content'));

	}

	public function updateContent(Request $request){

		$content = Content::find($request->id);
		//return $content;
		$content->content_title = $request->content_title;
		$content->content_description = $request->content_description;
		$content->status = $request->status;
		$content->alias = Str::slug($request->alias, '-');
		$content->last_updated_by = auth()->user()->id;
		$content->sequence = $request->sequence;
		$content->save();
		return redirect()->back()->with('message','Content Updated Successfully');

	}

	public function deleteContent($id){
		$content = Content::find($id);
		$content->deleted = "Yes";
		$content->deleted_by = auth()->user()->id;
		$content->save();
		return redirect()->back()->with('message','Content Deleted Successfully');
	}
}
