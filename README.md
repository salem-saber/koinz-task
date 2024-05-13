## Books Recommender

This project is a books recommender system based on users reading intervals.

## Requirements

- PHP >= 8.x
- Composer

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/salem-saber/koinz-task.git
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Set up your environment variables by copying the `.env.example` file:

    ```bash
    cp .env.example .env
    ```

   Make sure to set the `SMS_PROVIDER` , `SMS_PROVIDER_A_URL` , `SMS_PROVIDER_B_URL` variable in the `.env` file .

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Serve the application:

    ```bash
    php artisan serve
    ```

6. The API should now be accessible at `http://localhost:8000/api`.

## Database

Before running the application you need to create the database and run the migrations and seeders by running the
following commands:

- Migrations
```bash
  php artisan migrate:fresh
```

- Seeders
```bash
  php artisan db:seed
```

## Usage

### Endpoints

- `POST /api/insert-interval`: Insert a new reading interval for a user.

  Request body:
    ```json
    {
      "book_id":"1",
      "user_id":"1",
      "start_page":"1",
      "end_page":"20"
    }
    ```
  Response:
    ```json
    {
      "message": "Reading interval inserted successfully."
    }
    ```


- `GET /api/most-recommended`: Get the most recommended books.

  Response:
  ```json
  [
    {
        "book_id": 1,
        "book_name": "Exercitationem occaecati voluptates animi non quidem.",
        "num_of_read_pages": 28
    },
    {
        "book_id": 2,
        "book_name": "Distinctio vel soluta corporis et est minus odio non.",
        "num_of_read_pages": 19
    }
  ]
  ```

## API Documentation

The API documentation is available at https://documenter.getpostman.com/view/4199586/2sA3JNbLUh.
