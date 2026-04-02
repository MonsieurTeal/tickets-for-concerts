# About this project:
Scratch project with **Laravel framework**, for practising db and web-dev.

This is a website where you can buy tickets to concerts using virtual credits and I decided at first to break it down in smaller chunks for simplicity.
The very first thing was to make the database tables with relations.

## 28/02/2026
I created 4 basic tables as it follows: 
* Users (id [pk, int], name [varchar], email [varchar unique];
* Tickets (id [pk int], user_id [fk int not null], concert_id [fk int not null], price [decimal], status [varchar];
* Concerts (id [pk int], band_id [fk int not null], date [datetime], location [varchar];
* Bands (id [pk int], name [varchar], genre [varchar].

### Database design decisions
#### Relations: 
* Bands 1:M Concerts
* Concerts 1: M Tickets
* Users 1:M Tickets
	
While designing the database schema I tried to keep the structure simple but consistent with real world relationships.
* Bands → Concerts
    * A band can perform multiple concerts, therefore the relationship is one-to-many.

* Concerts → Tickets
    * Each concert can have multiple tickets available or sold.
    * This results in another one-to-many relationship.

* Users → Tickets
    * A user can buy multiple tickets, therefore this is also a one-to-many relationship.
    * This design implicitly creates a many-to-many relationship between Users and Concerts, which is handled through the tickets table. The tickets table acts as a pivot entity and also stores additional data such as the ticket price and status.

#### Foreign keys and cascade deletes
Foreign keys were used to enforce data integrity between related tables.
For simplicity, **cascadeOnDelete()** was used on the relationships.
This means that when a parent entity is deleted, all related child records are automatically removed.

##### Example:
* If a Band is deleted:
    * all related Concerts will also be deleted
	* all Tickets related to those concerts will be deleted as well
    * This prevents orphan records and keeps the database consistent.
    * For this practice project this approach keeps the logic simple while still respecting relational database principles.
	
## 1/03/2026
I initialized a new **Laravel project** with all the needed files for the application.

## 5/03/2026
After some tutorials that I watched, I managed to **migrate my tables to my database**.<br>
I noticed that the **timestamp of the migrations** is very important because if we don't migrate the tables in the **same order** as our **relations**, we'll fail into migrating tables. The **server** is now up and running.

## 7/03/2026
I implemented the **Eloquent Models** relationships in Laravel.<br>
The goal was to reflect the database relations directly in the application logic using **Laravel's ORM (Eloquent)**.

#### Model relationships implemented:
	Band → hasMany Concerts
	Concert → belongsTo Band
	Concert → hasMany Tickets
	Ticket → belongsTo User
	Ticket → belongsTo Concert
	User → hasMany Tickets

This structure mirrors the relational database design and allows easy querying of related data.

#### Example queries that are now possible with Eloquent:
	$band->concerts → returns all concerts for a band
	$concert->tickets → returns all tickets for a concert
	$user->tickets → returns all tickets owned by a user

By defining relationships inside **Models** rather than **Controllers**, the business logic related to the database remains centralized and reusable.

## 31/03/2026
Today marked the transition from backend-only setup to a functional admin interface using Filament.<br>
### What was accomplished:<br>
#### 1. Filament Installation & Setup
* Installed Filament into the Laravel project
* Created and configured the admin panel (/admin)
* Successfully accessed the Filament dashboard
#### 2. Admin Authentication
* Created an admin user manually using Tinker<br>
	* email: admin@test.com
	* password: password
* Implemented login functionality in the Filament panel
#### 3. First CRUD Implementation (Bands)
* Generated a Filament Resource for Band
* Understood the structure:
	* Resource (main logic)
	* Forms (input fields)
	* Tables (data display)
#### 4. Form Creation (BandForm)
* Added input fields:
	* name (Band Name)
	* genre
* Applied validation rules:
	* required
	* max length
#### 5. Database Integration
* Fixed mass assignment issue by adding:
	* protected $fillable = ['name', 'genre'];
	* Successfully created records from UI → stored in database
#### 6. Table Display (BandsTable)
* Configured table columns:
	* name
	* genre
* Data is now visible in the Filament admin panel
### Errors Encountered & Fixes
#### 1. Filament Command Not Found
* Issue: make:filament-resource not recognized
* Fix: Installed Filament properly using Composer
#### 2. /admin Returning 404
* Issue: Panel not registered
* Fix: Created panel manually:
	* php artisan make:filament-panel admin
#### 3. Missing Cache Table
* Error: relation "cache" does not exist
* Fix:
	* php artisan cache:table
	* php artisan migrate
#### 4. Data Not Visible in Table
* Issue: Table columns not defined
* Fix: Added TextColumn for each field
### Key Learnings
* Filament does not replace Laravel — it builds on top of it
* Clear separation of responsibilities:
	* Model → data
	* Form → input
	* Table → display
* Laravel conventions (naming, fillable, etc.) are critical
* Errors are not blockers — they are guidance
## 02/04/2026
### New CRUD: Users
* Learned how Filament can auto-generate resources based on existing database schema
* Created and configured a Filament Resource for Users
* Customized the user form to handle sensitive data properly:
	* Password field configured to be hashed before saving
	* Conditional validation depending on create vs edit operations
### Key Learnings
* Filament significantly accelerates CRUD development by generating admin panels from models and database schema
* Laravel conventions (naming, structure, and model configuration) are essential for smooth integration
* Proper handling of sensitive data (e.g., passwords) requires explicit transformation logic at the form level
* Understanding how Filament maps forms and tables to database fields is crucial for customization and control