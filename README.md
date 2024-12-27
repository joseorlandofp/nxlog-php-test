# NxLog PHP Test authored by Jose Orlando Felicio Parreira

For convinience, there is a fully working demo of this codebase at https://nxlog.boltout.com.br

## Project Design

This project is built using **Laravel 11** and follows a clean, modular design with the following key components:

- **Docker:** The development environment is containerized for consistency and ease of setup. Docker is the preferred method for running the project.
- **MVC Architecture:** The project adheres to the Model-View-Controller architecture for a clear separation of concerns.
- **Services and Repository Pattern:** Business logic is encapsulated within service classes, while database interactions are handled by repository classes, ensuring clean and maintainable code.
- **MySQL Database:** The project uses MySQL as the primary database for data storage and management.
- **API Integration:** The project integrates with external APIs to enhance functionality and provide additional features.
- **Authentication:** Secure user authentication is implemented, adhering to modern best practices.
- **Abstract Classes examples** are used for base repository classes, promoting code reusability and consistency across implementations.

This design ensures scalability, maintainability, and performance while following Laravel's best practices.


## Installation with Docker

Follow these steps to set up the project:

1. Clone the repository: 
~~~shell
   git clone https://github.com/joseorlandofp/nxlog-php-test.git
~~~

2. Download the `.env` file shared via email (as it contains sensitive data such as LinkedIn and SMTP app credentials) and place it in the root of the project.

3. Start the Docker environment using the command: 
~~~shell
   docker compose up -d --build
~~~

4. Access the application container by running:
~~~shell
   docker compose exec app bash
~~~


5. Install the project dependencies:
~~~shell
   composer install && npm install
~~~

6. Generate the application key and run the database migrations with:
~~~shell
   php artisan key:generate && php artisan migrate
~~~

7. Start the application (It will run at http://localhost:8001):
~~~shell
   npm run dev
~~~

## Installation locally (Your own enviroment)

1. Clone the repository:
~~~shell
   git clone https://github.com/joseorlandofp/nxlog-php-test.git
~~~

2. Download the `.env` file shared via email (as it contains sensitive data such as LinkedIn and SMTP app credentials) and place it in the root of the project. Make sure to set proper mysql credentials and change the APP_URL variable to the correct port, 8000.

3. Install the project dependencies:
~~~shell
   composer install && npm install
~~~

4. Generate the application key and run the database migrations with:
~~~shell
   php artisan key:generate && php artisan migrate
~~~

5. Start the server:
~~~shell
   php artisan serve
~~~

## Usage

1. Open your browser and access http://localhost:8000 or http://localhost:8001 depending on the installation method (your console will point out the correct port).
2. Authenticate with LinkedIn.
3. Reset your password, create accounts with different e-mails and test the requested business rules.