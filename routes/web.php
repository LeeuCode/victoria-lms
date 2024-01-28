<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\QuestionController;
use App\Http\Controllers\Backend\ReceiptController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ExamController as ExamBKController;
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

    Route::get('questions', [QuestionController::class, 'index'])->name('admin.questions');

    Route::get('question/create/', [QuestionController::class, 'create'])->name('admin.question.create');

    Route::get('question/edit', [QuestionController::class, 'edit'])->name('admin.question.edit');

    Route::get('question/view/{id}', [QuestionController::class, 'view'])->name('admin.question.view');

    Route::get('exam/booking', [ExamBKController::class, 'booking'])->name('admin.exam.booking');

    Route::get('exam/booking/student/{id}', [ExamBKController::class, 'bookingById'])->name('admin.exam.booking.student');

    Route::get('exam/exemptions', [ExamBKController::class, 'exemptions'])->name('admin.exam.exemptions');

    Route::get('exam/exemption/student/{id}', [ExamBKController::class, 'exemptionsById'])->name('admin.exam.exemption.student');

    Route::get('receipt', [ReceiptController::class, 'index'])->name('admin.receipt.index');

    Route::get('receipt/show/{id}', [ReceiptController::class, 'show'])->name('admin.receipt.show');

    Route::get('students', [UserController::class, 'students'])->name('admin.students');

    Route::get('student/show/{id}', [UserController::class, 'showStudent'])->name('admin.student.show');

    Route::get('exam/results', [ExamBKController::class, 'examResults'])->name('admin.exam.results');

    Route::get('exam/results/student/{id}', [ExamBKController::class, 'examUserResult'])->name('admin.exam.results.student');

    //====== Post Routes ======//

    Route::post('category/save', [CategoryController::class, 'store'])->name('admin.category.save');

    Route::post('subject/save', [SubjectController::class, 'store'])->name('admin.subject.save');

    Route::post('question/save', [QuestionController::class, 'store'])->name('admin.question.save');

    Route::post('/exam/booking/save', [ExamBKController::class, 'storeBooking'])->name('admin.exam.booking.save');
});


Route::get('exam/id/{id}', [ExamController::class, 'index'])->name('exam');

Route::get('exam/destroy', [ExamController::class, 'destroyEaxm'])->name('exam.destroy');

Route::post('exam/store', [ExamController::class, 'store'])->name('exam.store');
Route::post('exam/bookmark//{id}', [ExamController::class, 'bookmark'])->name('exam.bookmark');
Route::post('exam/update/time/{id}', [ExamController::class, 'updateTime'])->name('exam.updateTime');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
