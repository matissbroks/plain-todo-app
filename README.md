
# To-Do app with plain PHP

Small PHP To-Do app project, created with plain PHP and CSS

### Project short setup

1. Clone this repo
2. In MySQL database execute `includes/db_create.sql` scrip
3. Modify `includes/db.inc.php` with your database info
4. Go To `http://localhost/plain-todo-app` to see page

### Docker setup

1. Clone this repo
2. change directory to this project `cd PROEJCT_DIR`
3. Run `docker-compose up` can add `-d` to run in detached mode
4. Connect to MySQL container `docker exec -it plain-todo-db bash`
5. Login to MySQL `mysql -u phpuser -p` enter appropriate password
6. Run `use plain_todo_app;` to change databse in use
7. Execute script from `includes/db_create.sql` to create table
8. Go To `http://localhost/` and you are done!