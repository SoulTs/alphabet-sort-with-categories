PHP Сортировка
=============================

Сортировка строк в тэге SELECT с категориями из заглавных букв строк. Использовано PHP PDO, HTML

Использование
=============================
1. Откройте файл и настроте переменные
    $host - имя MySQL хоста
    $user - имя MySQL пользователя
    $pass - пароль MySQL пользователя
    $dbname - название базы данных
    $charset - кодировка для работы с БД (очень важна, т.к. происходит работа с таблицами символов)
    $table - таблица с записями (из нее будут браться записи для сортировки)

2. После этого можете запускать файл на сервере. Все записи будту отсортированы по алфавиту и упорядочены по подкатегориям из начальной буквы строки.

Usage
=============================
1. Open file and set variables
    $host - name of MySQL host
    $user - name of MySQL user
    $pass - password of MySQL user
    $dbname - name of used database
    $charset - charset for working with DB (very important, because script work with character sets)
    $table - table with content (from this table script get data for sorting)

2. After this start file sort.php on your server. All antries will sorted by alphabet and sort by categories with first character of the string
