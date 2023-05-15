### Техническое задание от РИИТ

* 1 Создать три таблицы в БД:
1.1. В одной хранятся имена пользователей.
1.2. Во второй - связь между пользователями и их образованием (среднее, бакалавр,
магистр, еще что-то).
1.3. В третьей - связь между пользователями и некими городами, у каждого пользователя
может быть 1 или более городов.
* 2 Написать приложение, которое будет:
2.1. Выводить список (grid) этих пользователей, в зависимости от отмеченных галочек
(для каждой таблички свой набор галочек). Список должен обновляться без перезагрузки
страницы. Поля: пользователь, образование, город.
2.2. Предоставлять возможность смены образования в этой таблице. При этом изменения
должны отправляться на сервер и сохраняться в базе данных.
* 3 Приложение должно быть написано с использованием следующего инструментария:
3.1. Серверная часть должна быть написана на PHP. Можно использовать любой удобный
framework (хотя Zend, конечно, предпочтительней).
3.2. Клиентская часть должна быть написана на ExtJS 5/6 (по выбору).
* 4 В работе должно использоваться ООП, должен использоваться шаблон проектирования
MVC или MVVM, сложная выборка должна реализовываться средствами SQL.
* 5 Приветствуются функции "от себя", показывающие уровень владения предметом.
* 6 Результат выполнения задания должен быть представлен в виде приложения и дампа
базы, чтобы можно было «поднять» и посмотреть на его работу.
* 7 Решение предпочтительно выкладывать в GitHub.

### Установка (запускается локально в Docker)
1: clone repository
``` 
git clone https://github.com/olegvpc/laravel-riit.git
```
2: cd to work-project

3: for short record use ALIAS
```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

4: Run MIGRATION
```shell
sail artisan migrate 
```

5: To start all of the Docker containers in the background, you may start Sail in "detached" mode:
```shell
sail up -d
```
6: You may use the shell command to connect to your application's container, allowing you to inspect its files and installed services as well execute arbitrary shell commands within the container:
```shell
sail shell
```

7: for install all dependencies
```shell
composer dump
```
Finish: Project run: 
```
http://localhost:80
``` 

### Выполнено
1: BackEnd выполнен на PHP (Laravel)
2: DB - MySQL
3: Создан UI на PHP (http://localhost:80) для занесения данных в базу
4: Настроена верификация данных на уровне контроллера при получении формы
5: Данные верификации возвращаются на исходную страницу при fail
![validation](https://github.com/olegvpc/laravel-riit/blob/main/images/validation.png?raw=true)
6: выводится сообщение при создании записи в ВD (через запист в session())
![alert](https://github.com/olegvpc/laravel-riit/blob/main/images/alert.png?raw=true)
7: Настроены route(End-points) как для записи данных из формы, так и через API
