<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\BookStore;
use Validator;
use App\Http\Resources\BookStoreResource;

class BookStoreController extends BaseController
{
    /**
     * Display a list of the all Book Stores created.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookstores = BookStore::all();

        return $this->sendResponse(BookStoreResource::collection($bookstores), 'Book Stores retrieved successfully.');
    }

    /**
     * Store a newly created Book Store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'isbn' => 'nullable|regex:/^[0-9]+$/',
            'value' => 'nullable|decimal:0,2'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $bookstore = BookStore::create($input);

        return $this->sendResponse(new BookStoreResource($bookstore), 'Book Store created successfully.');
    }

    /**
     * Display the specified Book Store.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookstore = BookStore::find($id);

        if (is_null($bookstore)) {
            return $this->sendError('Book Store not found.');
        }

        return $this->sendResponse(new BookStoreResource($bookstore), 'Book Store retrieved successfully.');
    }

    /**
     * Update the specified Book Store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, int $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'isbn' => 'nullable|regex:/^[0-9]+$/',
            'value' => 'nullable|decimal:0,2'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $bookstore = BookStore::find($id);

        if (is_null($bookstore)) {
            return $this->sendError('Book Store not found.');
        }

        $bookstore->name = $input['name'];
        $bookstore->isbn = $input['isbn'];
        $bookstore->value = $input['value'];
        $bookstore->save();

        return $this->sendResponse(new BookStoreResource($bookstore), 'Book Store updated successfully.');
    }

    /**
     * Remove the specified Book Store.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(int $id)
    {
        $bookstore = BookStore::find($id);

        if (is_null($bookstore)) {
            return $this->sendError('Book Store not found.');
        }

        $bookstore->delete();

        return $this->sendResponse([], 'Book Store deleted successfully.');
    }
}
