insert into useracc (username, cdate, email, pw, fname, lname, gender, acctype, birthdate, uage, ppicture)
values ('Erkan Scott', CURRENT_DATE, 'erkanabi@gmail.com', 'CactusJack44', 'Max', 'Mustermann', 'm', 'basic', '02-07-2003', '19', 'testpp.jpg'),
('Big Maik', CURRENT_DATE, 'maikyboy@gmail.com', 'YiDior55', 'Mina', 'Musterfrau', 'w', 'premium', '02-07-2003', '19', 'testpp.jpg'),
('Mocro', CURRENT_DATE, 'hikmet66@gmail.com', 'Maghreb66', 'Hikmet', 'Bilal', 'm', 'premium', '02-07-2003', '19', 'testpp.jpg'),
('Ero47', CURRENT_DATE, 'azeriausdu@gmail.com', 'Pamuk77', 'Islam', 'Mammadov', 'm', 'premium', '02-07-2003', '19', 'testpp.jpg'),
('T-Dog', CURRENT_DATE, 't-dog@gmail.com', 'Aksaray88', 'Yuna', 'Baum', 'w', 'basic', '02-07-2003', '19', 'testpp.jpg');

insert into address (uid, street, housenr, zip, city, country)
values ('1', 'Teststrasse', '25', '41812', 'Musterstadt', 'Deutschland'),
('2', 'Teststrasse', '25', '41812', 'Musterstadt', 'Deutschland'),
('3', 'Teststrasse', '25', '41812', 'Musterstadt', 'Deutschland'),
('4', 'Teststrasse', '25', '41812', 'Musterstadt', 'Deutschland'),
('5', 'Teststrasse', '25', '41812', 'Musterstadt', 'Deutschland');

insert into artist (arid, uid, revenue)
values ('1', '1', '0'),
('2', '2', '0'),
('3', '3', '0'),
('4', '4', '0'),
('5', '5', '0');


insert into song (arid, sid, title, genre, duration, price, plays, purchases, revenue, udate, cover, file)
values ('2', '1', 'Big Maik is back', 'Hiphop', '180', '3.00', '0', '0', '0', CURRENT_DATE, 'pictures/1.jpg', 'songs/1.mp3'),
('4', '2', 'Duman', 'Rock', '420', '1.50', '0', '0', '0', CURRENT_DATE, 'pictures/1.jpg', 'songs/1.mp3'),
('5', '3', 'Yuna', 'Pop', '210', '1.00', '0', '0', '0', CURRENT_DATE, 'pictures/1.jpg', 'songs/1.mp3'),
('1', '4', 'Lowest in the Room', 'Rap', '160', '0.10', '0', '0', '0', CURRENT_DATE, 'pictures/1.jpg', 'songs/1.mp3'),
('3', '5', 'MM', 'Rap', '110', '2.00', '0', '0', '0', CURRENT_DATE, 'pictures/1.jpg', 'songs/1.mp3');

insert into ownedsong (uid, sid)
values ('1', '1');

insert into ownedplaylist (uid)
values ('1');

insert into playlist (plid, title, description, cdate, cover)
values ('1', 'Playlist Test', 'This is a description.', CURRENT_DATE, 'pictures/111.jpg');


insert into playlistcontent (plid, pposition, sid)
values ('1', '1', '1'), ('1', '2', '1'), ('1', '3', '1');