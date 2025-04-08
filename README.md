
# Say Hello Package

**Say Hello Package** is a simple library for Laravel projects that helps streamline sending personalized welcome messages to users. This package provides a flexible interface for receiving a user's name and sending a welcome message in a convenient manner.

## Requirements

- PHP 7.4 or higher
- Laravel 8 or higher

## Installation

### Install via Composer

To install the package in your Laravel project, use Composer:

```bash
composer require zaheralmattrud/say_hello_package
```

## Usage

After the package is successfully installed, you can start using it in your project. There are two main ways to use the package: through **Traits** or via **Service Providers**.

### Using the Trait

1. **Use the Trait in your class**

   First, add the `SayHelloTrait` to the class you want to use it in, for example, in `UserController`:

   ```php
   <?php

   namespace App\Http\Controllers;

   use Illuminate\Http\Request;
   use SayHelloPackage\SayHelloTrait; // Import the Trait

   class UserController extends Controller
   {
       use SayHelloTrait; // Use the Trait

       public function greetUser($name)
       {
           // Using the trait to send a greeting message
           return response()->json([
               'message' => $this->greet($name) // The greeting message
           ]);
       }
   }
   ```

2. **The result**

   Now you can use this method via a route in `web.php` or `api.php`:

   ```php
   Route::get('/greet/{name}', [UserController::class, 'greetUser']);
   ```

   When you visit the route `/greet/John`, you'll receive the following response:

   ```json
   {
       "message": "Hallo, John!"
   }
   ```

### Using the Service

If you prefer using a **Service** instead of the Trait, you can define the service as follows.

1. **Create a Service**

   Create a new service file, for example, `SayHelloService.php` inside the `app/Services` directory.

   ```php
   <?php

   namespace App\Services;

   use SayHelloPackage\SayHelloTrait;

   class SayHelloService
   {
       use SayHelloTrait;

       public function greetUser($name)
       {
           return $this->greet($name);
       }
   }
   ```

2. **Use the Service in your Controller**

   After defining the service, you can use it in any class or controller like this:

   ```php
   <?php

   namespace App\Http\Controllers;

   use App\Services\SayHelloService; // Import the Service

   class UserController extends Controller
   {
       protected $sayHelloService;

       public function __construct(SayHelloService $sayHelloService)
       {
           $this->sayHelloService = $sayHelloService; // Inject the service
       }

       public function greetUser($name)
       {
           return response()->json([
               'message' => $this->sayHelloService->greetUser($name) // Using the service
           ]);
       }
   }
   ```

3. **The result**

   This will work the same way as before, and you'll get the same response when you visit `/greet/John`.

## Notes

- **Traits** provide a quick and easy solution when you want to reuse the code in multiple classes without creating objects.
- **Services** offer a more organized approach when you need to add additional logic or complexity to your package.

## Future Improvements

- Adding the ability to customize greeting messages.
- Support for different greeting formats such as `Hello`, `Hi`, `Bonjour`, etc.
- Ability to customize the greeting language based on user settings.

## Contributing

If you would like to contribute to improving this package, you are welcome to submit a **Pull Request** via GitHub.

### How to contribute:

1. Fork the repository.
2. Create a new branch for the changes you want to make.
3. Submit a **Pull Request** for review.

## License

This package is released under the **MIT License**.

---

### Reporting Issues or Feedback:

If you encounter any issues or have feedback regarding this package, feel free to open an **Issue** on [GitHub](https://github.com/ZaherAlmattrud/say_hello_package/issues).

---

