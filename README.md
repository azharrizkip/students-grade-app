# Project Name

Project Name is a Laravel application for managing student data.

## Table of Contents

- [Project Name](#project-name)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Database Setup](#database-setup)
  - [Seeding the Database](#seeding-the-database)
  - [Usage](#usage)
  - [Contributing](#contributing)
  - [License](#license)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/your-username/project-name.git
```

2. Navigate to the project directory:
```bash
cd project-name
```

3. Install the dependencies:
```bash
composer install
npm install
```

4. Copy the .env.example file and rename it to .env. Update the database configuration and other necessary environment variables in the .env file.

5. Generate an application key:
```bash
php artisan key:generate
```

## Database Setup
1. Create a new MySQL database for the project.

2. Update the `.env` file with your database credentials:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
3. Run the database migrations to create the necessary tables:
```bash
php artisan migrate

```

## Seeding the Database

The application provides a seeder to populate the database with sample data. Run the following command to seed the database:

```bash
php artisan db:seed
```
This will create a set of dummy student records in the `students` table.

## Usage

1. Start the development server:
```bash
php artisan serve

```
2. Access the application by visiting `http://localhost:8000` in your web browser.

## Contributing

Contributions are welcome! Please read the Contributing Guidelines for more information.

## License

This project is open-source and available under the MIT License.

