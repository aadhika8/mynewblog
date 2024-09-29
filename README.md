
# Basic Blog Application

GitHub Repository: [https://github.com/aadhika8/mynewblog](https://github.com/aadhika8/mynewblog)

## Setup and Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/aadhika8/mynewblog.git
    ```
2. **Checkout branch**

   ```bash
   git checkout feature-posts-api
    ```
3. **copy the .env.example file to .env**
    ```bash
   cp .env.example .env
   ```
4. **Install all the dependencies using teh following command:**
    ```bash
   composer install
   npm install
   ```
5. On separate terminal windows run the following commands to run the application:
    ```bash
   npm run dev
   php artisan serve
    ```
6. The server will be running on the `http://127.0.0.1:8000`

## Approach

Following approach was taken for the completion of assignment 3:

1. I created a new branch in the existing project which was implement for assignment 2 using the following command:
    ```bash
   git checkout -b feature-posts-api
    ```
2. Since, I was running on laravel 10, I did not have to run any configurations for the sanctum as it came pre-installed with sanctum.
3. API routes was then created in the api.php file for Posts index and show API.
4. The implementation for the API routes was done in PostController inside the app\Controllers\Api folder which was generated using the following command:
    ```bash
    php artisan make:controller Api/PostController --api
    ```

## Challenges faced:

The major challenge I experienced during the fulfilment of this assignment was the version difference. Since, my project was running on laravel 10 and all the lectures were on laravel 11, 
I had research on how to do specific things on my version. For example: Installation of sanctum had to be done in laravel 11 using the command `php artisan install:api` while as it came pre-installed in 
my version. Other than that evrything was covered in  the lecture videos.
