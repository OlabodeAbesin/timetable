
This README provides step-by-step instructions on how to test the `ProcessXmlData` artisan command. This command is responsible for processing XML files containing transportation data and storing it in your MySQL database.

## Installation and Setup

1. Clone the project repository if you haven't already:

   ```bash
   git clone https://github.com/OlabodeAbesin/timetable.git
   cd timetable
   ```

2. Install Composer dependencies:

   ```bash
   composer install
   ```

3. Configure your Laravel application to connect to your MySQL database by updating the `.env` file with your database credentials.

4. Run the database migrations to create the necessary tables:

   ```bash
   php artisan migrate
   ```

## Testing the `ProcessXmlData` Command

Follow these steps to test the `ProcessXmlData` command:

1. Open your terminal and navigate to your Laravel project's root directory.

2. Run the `ProcessXmlData` command:

   ```bash
   php artisan app:process
   ```

   This command will process all XML files in the `xml` folder and populate the database with transportation data.

3. Monitor the command's output for any errors or exceptions. It should display progress and completion messages.

4. After the command completes successfully, you can verify that the data has been stored in the database tables associated with the XML data.


## Support and Feedback

If you have any questions, encounter issues, or would like to provide feedback on the `ProcessXmlData` command or this README, please feel free to contact me or create an issue in the project's GitHub repository.

Happy testing!

---
