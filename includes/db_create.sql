create schema plain_todo_app collate utf8mb4_0900_ai_ci;

create table todo
(
    id         int auto_increment
        primary key,
    title      varchar(255) charset utf8mb3         null,
    is_done    tinyint(1) default 0                 null,
    created_at timestamp  default CURRENT_TIMESTAMP null,
    updated_at datetime   default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP
);