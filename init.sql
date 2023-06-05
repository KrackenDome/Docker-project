CREATE DATABASE students;
CREATE USER 'sail'@'%' IDENTIFIED BY 'mysecretpassword';
GRANT ALL PRIVILEGES ON students.* TO 'sail'@'%';
FLUSH PRIVILEGES;

