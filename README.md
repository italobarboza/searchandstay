# Search and Stay Assessment

Hi! My name is **Ítalo Barboza**, I live in Brazil and this is my Assessment for Backend.

To install this project, you need to meet [the minimum requirements for Laravel 9](https://laravel.com/docs/9.x/deployment#server-requirements) and follow the next steps:

 1. Download or clone this project;
 2. Open the `.env` file and set the `DB_*` variables to your local configuration;
	 2.1. If the `.env` file doesn't exists, please, duplicate and rename the `.env.example` file to `.env`; 
 3. Open terminal on the root folder of this project and run the following commands:
	 3.1. `composer install`
	 3.2. `php artisan migrate`

## Making the requests for the API.
There is a file named `Search and Stay (Ítalo Barboza).postman_collection.json` at the root folder of this project that you can import to postman with all the requests ready to be edited and used. It has the following requests:

 - User Registration (Post)
	 - This request allow you to create a new user.
 - User Login (Post)
	 - This request allow you do login and get a token (required to all Book Stores requests).
 - User Logout (Post)
	 - This request invalidate a specific token.
 - Book Stores > Book Store List (Get)
	 - This request list all the book stores created.
 - Book Stores > Book Store Create (Post)
	 - This request allow the user to create a new book store.
 - Book Stores > Book Store Update (Put)
	 - This request allow the user to update a book store information.
 - Book Stores > Book Store Delete (Delete)
	 - This request allow the user to delete a book store.
 - Book Stores > Book Store Info (Get)
	 - This request show information about a book store.
