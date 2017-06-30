<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use yuridik\Http\Requests;
use yuridik\Http\Controllers\Controller;
class StudDbController extends Controller
{
    //
    public function index(){
	$users = DB::select('select * from student');
	return view('stud_view',['users'=>$users]);
	}
	public function destroy($id)
	{
	DB::delete('delete from student where Id = ?',[$id]);
	echo "Record deleted successfully.<br/>";
	echo '<a href="/view-records">Click Here</a> to go back.';
	}

	public function show($id)
	{
	$users = DB::select('select * from student where Id = ?',[$id]);
	return view('stud_update',['users'=>$users]);
	}
	public function edit(Request $request,$id)
	{
	$name = $request->input('stud_name');
	DB::update('update student set name = ? where Id = ?',[$name,$id]);
	echo "Record updated successfully.<br/>";
	echo '<a href="/view-records">Click Here</a> to go back.';
	}
	public function insertform(){
		return view('stud_create');
		}
	public function insert(Request $request){
		$name = $request->input('stud_name');
		DB::insert('insert into student (name) values(?)',[$name]);
		echo "Record inserted successfully.<br/>";
		echo '<a href="/view-records">Click Here</a> to go back.';
	}
}
