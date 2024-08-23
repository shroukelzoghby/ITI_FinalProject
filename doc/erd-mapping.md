# Library Database Tables

## Users

- <u>id</u>
- name
- email
- role_id << **Roles**

## Roles

- <u>id</u>
- title

## Books

- <u>id</u>
- title
- describtion
- author_id << **Authors**

## Authors

- <u>id</u>
- name


## Borrowed Books

- <u>id</u>
- user_id << **Users**
- book_id << **Books**
- returned: bool
- return_date: Date


