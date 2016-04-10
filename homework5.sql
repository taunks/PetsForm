drop database if exists dogsdb;
create database if not exists dogsdb;

use dogsdb;

create table breeds(
	breed_id int unsigned not null auto_increment primary key,
    breed_name nvarchar(50) not null,
    created_date datetime default current_timestamp
);

create table dogs(
	dog_id int unsigned not null auto_increment primary key,
    dog_name nvarchar(100) not null,
    breed_id int unsigned,
    age int unsigned,
    is_fixed boolean,
    is_vaccinated boolean,
    created_date datetime default current_timestamp,
    foreign key (breed_id) references breeds(breed_id)
);

# some sample data
insert into breeds (breed_name) values ('Alaskan Malamute');
insert into breeds (breed_name) values ('Australian Shepherd');
insert into breeds (breed_name) values ('Bernese Mountain Dog');
insert into breeds (breed_name) values ('Cairn Terrier');
insert into breeds (breed_name) values ('Chihuahua');
insert into breeds (breed_name) values ('Collie');
insert into breeds (breed_name) values ('Golden Retriever');
insert into breeds (breed_name) values ('Italian Greyhound');
insert into breeds (breed_name) values ('Jack Russell Terrier');
insert into breeds (breed_name) values ('Mixed Breed');
insert into breeds (breed_name) values ('Papillon');
insert into breeds (breed_name) values ('Springer Spaniel');

# local variables
#set @breedId = (select breed_id from breeds where breed_name = 'Collie');
#set @age = 3;

# more sample data
insert into dogs (dog_name, age, breed_id, is_fixed, is_vaccinated) 
	values ('Merlin', 1, 3, true, true);
insert into dogs (dog_name, age, breed_id, is_fixed, is_vaccinated) 
	values ('Buffy', 6, 1, true, false);
insert into dogs (dog_name, age, breed_id, is_fixed, is_vaccinated) 
	values ('Sable', 4, 7, true, true);
insert into dogs (dog_name, age, breed_id, is_fixed, is_vaccinated) 
	values ('Missy', 2, 2, false, false);
insert into dogs (dog_name, age, breed_id, is_fixed, is_vaccinated) 
	values ('Daisy', 1, 5, false, true);


# join both tables to get data
select * from dogs d join breeds b on b.breed_id = d.breed_id;