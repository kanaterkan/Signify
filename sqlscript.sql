create table useracc (
	uid serial unique primary key,
	username varchar(20) not null,
	cdate date not null,
	email varchar(255) not null,
	pw varchar(255) not null,
	fname varchar(35) not null,
	lname varchar(35) not null,
	gender varchar(1) not null,
	acctype varchar(7) not null,
	birthdate date not null,
	uage int,
	ppicture varchar(255)
);

create table address (
	uid int primary key,
	street varchar(45) not null,
	housenr int not null,
	zip int not null,
	city varchar(45) not null,
	country varchar(25) not null,
	foreign key (uid) references useracc(uid) on delete cascade
);

create table artist (
	arid serial unique primary key,
	uid int not null,
	revenue decimal not null,
	foreign key (uid) references useracc(uid) on delete cascade
);

create table song (
	sid serial unique primary key,
	arid serial,
	title varchar(50) not null,
	genre varchar(15) not null,
	duration int not null,
	price decimal not null,
	plays int not null,
	purchases int not null,
	revenue decimal not null,
	udate date not null,
	cover varchar(255),
	file varchar not null,
	teaser varchar not null,
	foreign key (arid) references artist (arid)
);

create table ownedsong(
	uid int,
	sid int,
	foreign key (uid) references useracc (uid) on delete cascade,
	foreign key (sid) references song (sid) on delete cascade,
	primary key (uid, sid)
);

create table ownedplaylist(
	plid serial unique,
	uid int,
	foreign key (uid) references useracc (uid) on delete cascade,
	primary key (plid, uid)
);

create table playlist(
	plid int,
	title varchar(30) not null,
	description varchar not null,
	cdate date not null,
	cover varchar(255),
	foreign key (plid) references ownedplaylist (plid) on delete cascade,
	primary key (plid)
);

create table playlistcontent(
	plid int,
	pposition int,
	sid int not null,
	foreign key (plid) references playlist (plid) on delete cascade,
	foreign key (sid) references song (sid) on delete cascade,
	primary key (plid, pposition)
);

alter table song
add constraint checkPrice
check(price between 0.1 and 3.0);

alter table song 
add constraint checkLength
check(duration>0);


alter table song
add constraint checkGenre
check( genre );

alter table song 
add constraint checkTitle
check (title not null);

create or replace function checkSongs()
returns trigger as $$
begin
if(select count(sid) from song s inner join artist a on s.arid = a.arid  where s.arid = a.arid) == 10 then
 raise notice 'Congratulation, your 10th song. Keep going!';
end if ;
   return new;
end;
$$ language plpgsql; 

create trigger checkSongs
after insert or update of sid on song 
FOR EACH ROW execute procedure checkSongs();

create or replace function checkName()
returns trigger as $$
begin
	if new.title like '%terror%' then 
	raise exception 'Please change your title. "Terror" cannot be selected as a title.';
	end if;
	return new;
end;
$$language plpgsql;

create trigger checkName
after insert or update of sid on song 
FOR EACH ROW execute procedure checkName();

