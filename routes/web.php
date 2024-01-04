<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\QuestionController;
use App\Http\Controllers\ExamController;

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

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('backend.layout');
    });

    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories');

    Route::get('subjects', [SubjectController::class, 'index'])->name('admin.subjects');

    Route::get('questions', [QuestionController::class, 'index'])->name('admin.quiz');

    Route::get('question/create', [QuestionController::class, 'create'])->name('admin.question.create');

    Route::get('question/edit/{id}', [QuestionController::class, 'edit'])->name('admin.question.edit');

    Route::post('category/save', [CategoryController::class, 'store'])->name('admin.category.save');

    Route::post('subject/save', [SubjectController::class, 'store'])->name('admin.subject.save');

    Route::post('question/save', [QuestionController::class, 'store'])->name('admin.question.save');

    // Route::post('question/save', [QuestionController::class, 'store'])->name('admin.question.save');

    Route::get('/exam/booking', function () {
        return view('backend.exam-booking.index');
    })->name('admin.exam.booking');

    Route::get('/exam/booking/student/{id}', function () {
        return view('backend.exam-booking.student');
    })->name('admin.exam.booking.student');

    Route::get('/exam/exemptions', function () {
        return view('backend.exemptions.index');
    })->name('admin.exam.exemptions');

    Route::get('/exam/exemption/student/{id}', function () {
        return view('backend.exemptions.exams');
    })->name('admin.exam.exemption.student');
});


Route::get('exam/id/{id}', [ExamController::class, 'index'])->name('exam');
Route::post('exam/store', [ExamController::class, 'store'])->name('exam.store');

Route::get('exam/destroy', [ExamController::class, 'destroyEaxm'])->name('exam.destroy');
