
# To-Do app with plain PHP (Bootstraped)

Small PHP To-Do app project, created with plain PHP and Bootstrap in place of plain CSS

___

### Project short setup

1. Clone this repo
2. Create database for app
3. Created table
4. Modify `includes/db.inc.php` with your database info
5. Go To `localhost/plain-todo-app-bootstrap` to see page

___

### Docker setup

1. Clone this repo
2. change directory to this project `cd PROEJCT_DIR`
3. Run `docker-compose up` can add `-d` to run in detached mode
4. Connect to MySQL container `docker exec -it plain-todo-bootstrap-db bash`
5. Login to MySQL `mysql -u phpuser -p` enter appropriate password
6. Run `use plain_todo_app;` to change databse in use
7. Execute script from `includes/db_create.sql` to create table
8. Go To `http://localhost/` and you are done!