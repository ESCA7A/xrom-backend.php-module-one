 Задание по Модулю 1
===========
#### Написать простую форму на HTML
```
  - форма комментария.
      - author
      - comment
      - submit
```
#### При нажатии на submit при помощи PHP необходимо сохранять содержимое полей в базу данных. 

____

* При помощи PHP/MYSQL (на выбор) необходимо создать таблицу:
```
“id”, “author”, “comment”, “created_at” 
(created_at в формате YYYY-MM-DD HH:MM:SS , т.е. реальное время)
```

_При этом, нужно сделать так, чтобы в поле `“author”` не могли сохраниться цифры (т.е. только буквы имени). 
Сделать это на стороне PHP._

* Создать ветку `frontend` - в ней написать форму для отправки данных на бэкенд. 
* Ветку запушить.
* Создать ветку `backend` - в ней написать код для сохранения данных и код инициализации таблицы в базе данных. 
_Сохранение необходимо реализовать в отдельном PHP-файле._

* Смёржить в ветку backend ветку frontend. 
* После, Ветку backend спулить в master.

### DEPLOYMENT
* clone repo
```
#clone repo
#
user@workspace:&> git clone git@github.com:ESCA7A/module-one.git example
#
#go to repo
#
user@workspace:&> cd example
#
#copy .ENV config
#
user@workspace:&> cp .env.example .env
```
* change .ENV configuration
* run `php -S localhost:8000` in terminal
