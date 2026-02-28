# tickets-for-concerts
Scratch project with Laravel framework, for practising db and web-dev.

This is a website where you can buy tickets to concerts using virtual credits and I decided at first to break it down in smaller chunks for simplicity.
The very first thing was to make the database tables with relations.

28/02/2026
I created 4 basic tables as it follows: 
	Users (id [pk, int], name [varchar], email [varchar unique];
	Tickets (id [pk int], user_id [int not null], concert_id [int not null], price [decimal], status [varchar];
	Concerts (id [pk int], band_id [int not null], date [datetime], location [varchar];
	Bands (id [pk int], name [varchar], genre [varchar].

Relations: 
	Bands 1:M Concerts
	Concerts 1: M Tickets
	Users 1:M Tickets
	
	
	
