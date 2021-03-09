<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function () {
    DB::insert('insert into Students(name, dateOfBirth, GPA, advisor) values ("Bekzat", "2001-10-30", 3.05, "Zhangir" ) ');
});



Route::get('/insert2', function () {
    $student=new Student;  
    $student->name='Arman';
    $student->dateOfBirth='2000-11-05';
    $student->GPA='3.7';
    $student->advisor='Zhangir';

$student -> save();
});


Route::get('/select', function () {
    $results=DB::select('select * from Students where id="4"');
    foreach ($results as $Students) {
    	echo "name: ".$Students->name;
    	echo "<br>";
    	echo "Date Of Birth: ".$Students->dateOfBirth;
    	echo "<br>";
    	echo "GPA ".$Students->GPA;
    	echo "<br>";
    	echo "advisor:".$Students->advisor;

    }
});

Route::get('/select2', function () {
   $student=Student::where('id',4)->first();
   return $student;
});


Route::get('/update', function () {
    $updated=DB::update('update students set advisor="Azamat" where id=4 ');
   	return $updated;
});

Route::get('/update2',function(){
	$student=Student::find(1);
	$student->advisor='Ali';
	$student->save();
});

Route::get('/delete', function () {
    $deleted=DB::delete('delete from students where id=7 ');
   	return $deleted;
});

Route::get('/delete2',function(){
	$student=Student::find(5);
	$student->delete();
});