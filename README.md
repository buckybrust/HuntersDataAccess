<h2>Base Information</h2>
<p>My name is Hunter Brust and this is my database access app. At this point it simply enoughs stores 2 tables of information "businesses", and "employees". The app offers authentification, a nice UI and full CRUD functionality</p>

<p>The app currently configured to run on localhost database port 3306, with a database name of 'contacts' a username of 'root' and a blank password
I managed to complete all the main asks and managed to add in Laravel Events, Tailwind Css. This is of course up on github right now and credit is both below and in a file in the root directory called codereferences.txt</p>

<h3>Getting Started Running It</h3>
You will need to download the whole directory and run a local server with a database of the proper name. You hopefully know how to pull that off with 'php artisan serve'. You should also make sure that you have the required libraries installed. The required libraries would just be those typical of Kartra (composer, node.js, tailwind, etc). Once you can get the system running you should run the database seeder with the command below. If you want to have some businesses also auto generated try the factory command below. It will generate 20 businesses with different names and emails. The businesses generated from the factory will all have the default logo though.

<h3>Useful Commands</h3>
<p>Run Database Seeder For First Account: php artisan db:seed</p>
<p>Business Factory: App\Models\Business::factory()->count(20)->create();</p>

<h3>Code References</h3>
<p>Most Code Comes From Documentation Provided By https://laravel.com/</p>
<p>Code Structure loosely based off Laracast "laravel 6 from scratch": https://laracasts.com/series/laravel-6-from-scratch</p>
<p>All other code was generated from Laravel itself or was hand written by me.</p>
