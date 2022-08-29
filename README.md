# Customer API

Customer API merupakan API yang dibuat dengan menggunakan PHP framework Laravel dan dapat melakukan CRUD customer dengan end point yang telah disediakan, seperti:

- List Of Customer(**GET** /api/customer).
- Detail Of Customer(**GET** /api/customer/{id}).
- Add New Customer(**POST** /api/customer).
- Add New Address(**POST** /api/address).
- Update Customer(**PATCH** /api/customer/{id}).
- Update Address(**PATCH** /api/address/{id}).
- Delete Customer(**DELETE** /api/customer/{id}).
- Delete Address(**DELETE** /api/address/{id}).

## Running Project

Berikut ini merupakan langkah langkah untuk menjalankan project:

- Run git clone <my-cool-project>
- Run composer install
- Run cp .env.example .env
- Run php artisan key:generate
- Run php artisan migrate
- Run php artisan serve
- Go to link http://127.0.0.1:8000/
- Delete Address(DELETE /api/address/{id}).

**MADE BY NADIR RUAYUANDA BAKRI**
