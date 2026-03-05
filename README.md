# tickets-for-concerts
Scratch project with Laravel framework, for practising db and web-dev.

This is a website where you can buy tickets to concerts using virtual credits and I decided at first to break it down in smaller chunks for simplicity.
The very first thing was to make the database tables with relations.

28/02/2026
I created 4 basic tables as it follows: 
	Users (id [pk, int], name [varchar], email [varchar unique];
	Tickets (id [pk int], user_id [fk int not null], concert_id [fk int not null], price [decimal], status [varchar];
	Concerts (id [pk int], band_id [fk int not null], date [datetime], location [varchar];
	Bands (id [pk int], name [varchar], genre [varchar].

Relations: 
	Bands 1:M Concerts
	Concerts 1: M Tickets
	Users 1:M Tickets
	
1/03/2026
I initialized a new Laravel project with all the needed files for the application.

5/03/2026
After some tutorials that I watched, I managed to migrate my tables to my database.
I noticed that the timestamp of the migrations is very important because if we don't migrate the tables in the same order as our relations, we'll
fail into migrating tables. The server is now up and running.
	
