<?php


Route::get('/', function () {
    return Redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('home','HomeController@index')->name('home');

Route::group(['middleware'=>'verified'],function(){

	//for Employee 
	Route::get('add-employee','EmployeeController@index')->name('add.employee');
	Route::post('insert-employee','EmployeeController@store');
	Route::get('all-employee','EmployeeController@allEmployee')->name('all.employee');
	Route::get('view-employee/{id}','EmployeeController@singleEmployee');
	Route::get('delete-employee/{id}','EmployeeController@deleteEmployee');
	Route::get('edit-employee/{id}','EmployeeController@editEmployee');
	Route::post('update-employee/{id}','EmployeeController@update');

	//for customer

	Route::get('add-customer','CustomerController@index')->name('add.customer');
	Route::post('insert-customer','CustomerController@store');
	Route::get('all-customer','CustomerController@allCustomer')->name('all.customer');
	Route::get('view-customer/{id}','CustomerController@viewCustomer');
	Route::get('delete-customer/{id}','CustomerController@delete');
	Route::get('edit-customer/{id}','CustomerController@edit');
	Route::post('update-customer/{id}','CustomerController@update');

	//for supplier
	Route::get('add-supplier','SupplierController@index')->name('add.supplier');
	Route::post('insert-supplier','SupplierController@store');
	Route::get('all-supplier','SupplierController@allSupplier')->name('all.supplier');
    Route::get('view-supplier/{id}','SupplierController@viewSupplier');
    Route::get('delete-supplier/{id}','SupplierController@delete');
    Route::get('edit-supplier/{id}','SupplierController@edit');
    Route::post('update-supplier/{id}','SupplierController@update');

    //salary routes
    Route::get('add-advance-salary','SalaryController@addAdvanceSalary')->name('add.advance.salary');
    Route::post('insert-advance-salary','SalaryController@storeAdvanceSalary');
    Route::get('all-advance-salary','SalaryController@allAdvanceSalary')->name('all.advance.salary');
    Route::get('pay-salary','SalaryController@PaySalary')->name('pay.salary');

    //category route

    Route::get('add-category','CategoryController@addCategory')->name('add.category');
    Route::post('insert-category','CategoryController@store');
    Route::get('all-category','CategoryController@allCategory')->name('all.category');
    Route::get('edit-category/{id}','CategoryController@edit');
    Route::post('update-category/{id}','CategoryController@update');
    Route::get('delete-category/{id}','CategoryController@delete');

    //for products

    Route::get('add-product','ProductController@index')->name('add.product');
    Route::post('insert-product','ProductController@store');
    Route::get('all-product','ProductController@allProduct')->name('all.product');
    Route::get('edit-product/{id}','ProductController@edit');
    Route::post('update-product/{id}','ProductController@update');
    Route::get('delete-product/{id}','ProductController@delete');
    Route::get('view-product/{id}','ProductController@view');

    //xlsx
    Route::get('import-product','ProductController@ImportProduct')->name('import.product');
    Route::get('export','ProductController@export')->name('export');
    Route::post('import','ProductController@import')->name('import');

    //expense route

    Route::get('add-expense','ExpenseController@index')->name('add.expense');
    Route::post('insert-expense','ExpenseController@store');
    Route::get('today-expense','ExpenseController@todayExpense')->name('today.expense');
    Route::get('edit-today-expense/{id}','ExpenseController@edit');
    Route::post('update-today-expense/{id}','ExpenseController@todayExpenseUpdate');
    Route::get('delete-today-expense/{id}','ExpenseController@deleteTodayExpense');
    Route::get('monthly-expense','ExpenseController@monthlyExpense')->name('monthly.expense');
    Route::get('yearly-expense','ExpenseController@yearlyExpense')->name('yearly.expense');

    //all month
    Route::get('view-expense/january','ExpenseController@january');
    Route::get('view-expense/february','ExpenseController@february');
    Route::get('view-expense/march','ExpenseController@march');
    Route::get('view-expense/april','ExpenseController@april');
    Route::get('view-expense/may','ExpenseController@may');
    Route::get('view-expense/june','ExpenseController@june');
    Route::get('view-expense/july','ExpenseController@july');
    Route::get('view-expense/august','ExpenseController@august');
    Route::get('view-expense/september','ExpenseController@september');
    Route::get('view-expense/october','ExpenseController@october');
    Route::get('view-expense/november','ExpenseController@november');
    Route::get('view-expense/december','ExpenseController@december');

    //attendence route
    Route::get('take-attendence','AttendenceController@index')->name('take.attendence');
    Route::post('insert-attendence','AttendenceController@insert');
    Route::get('all-attendence','AttendenceController@allAttendence')->name('all.attendence');
    Route::get('edit-attendence/{edit_date}','AttendenceController@editAttendence');
    Route::post('update-attendence','AttendenceController@updateAttendence');
    Route::get('view-attendence/{edit_date}','AttendenceController@view');

    //pos route
    Route::get('pos','PosController@index')->name('pos');

    //cart route
    Route::post('add-cart','CartController@index');
    Route::post('cart-update/{rowId}','CartController@UpdateCart');
    Route::get('cart-remove/{rowId}','CartController@CartRemove');
    Route::post('create-invoice','CartController@CreateInvoice');

    //invoice
    Route::post('final-invoice','CartController@FinalInvoice');

    //order
    Route::get('/all-pending-orders','PosController@pendingOrders')->name('pending.order');
    Route::get('/view-single-order/{id}','PosController@singleOrder');
    Route::get('/aprove-pending-order/{id}','PosController@aproveOrder');
    Route::get('/all-success-orders','PosController@successOrders')->name('success.order');

});


