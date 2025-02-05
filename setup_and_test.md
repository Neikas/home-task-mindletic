### Breakdown of the `README.md`:

1. **Setup Instructions**:
    - Lists the prerequisites (PHP, Composer, MySQL).
    - Provides steps to clone the repo, install dependencies, configure the `.env` file, and set up the database.

2. Install Dependencies
   Run Composer to install the required PHP dependencies:
    - composer install
3. Set Up Environment Variables
   Copy the .env.example file to .env:
    - cp .env.example .env
4. Generate Application Key
   Run the following command to generate the Laravel application key:
    - php artisan key:generate
5. Run Migrations
   Run the migrations to set up the database tables:
    - php artisan migrate
6. Start the Development Server
   You can start the development server using the following command:
    - php artisan serve

### TESTING

    # Create psycologist CURL
```bash
curl --location 'http://127.0.0.1:8000/api/psychologists' \
--header 'Content-Type: application/json' \
--data-raw '{"name": "Dr. Lukas Lukis", "email": "jane.smith@example.lt"}'
```
    # Get all psycologist
```bash
curl --location --request GET 'http://127.0.0.1:8000/api/psychologists' 
```
    # Create time slot
```bash
curl --location 'http://127.0.0.1:8000/api/psychologists/1/time-slots' \
--header 'Content-Type: application/json' \
--data '{
           "start_time": "2025-02-06 18:00:00",
           "end_time": "2025-02-06 19:00:00"
         }'
```
    # Updated booked time slot
```bash
curl --location --request DELETE 'http://127.0.0.1:8000/api/time-slots/2' \
--header 'Content-Type: application/json' 
```

    # Delete time slot
```bash
curl --location --request DELETE 'http://127.0.0.1:8000/api/time-slots/2' \
--header 'Content-Type: application/json' 
```

    # Get all appointments
```bash
curl --location --request GET 'http://127.0.0.1:8000/api/psychologists' 
```
    # Assign availage time-slot to appointment 
```bash
curl --location 'http://127.0.0.1:8000/api/appointments' \
--header 'Content-Type: application/json' \
--data-raw '{
           "time_slot_id": 9,
           "client_name": "Jane Doe",
           "client_email": "janedoe@example.com"
         }'
```
