# 300 test api

Simple api for 300

### Done:
- `GET /api/books` - zwraca listę wszystkich książek wraz z informacjami o
autorach.
- `GET /api/books/{id}` - zwraca szczegółowe informacje o konkretnej
książce wraz z informacjami o autorach.
- `POST /api/books` - dodaje nową książkę do bazy danych.
- `PUT /api/books/{id}` - aktualizuje informacje o konkretnej książce.
- `DELETE /api/books/{id}` - usuwa konkretną książkę z bazy danych.
- `GET /api/authors` - zwraca listę wszystkich autorów wraz z informacjami o ich książkach.
- `GET /api/authors/{id}` - zwraca szczegółowe informacje o konkretnym
autorze wraz z informacjami o jego książkach.
- Zadbaj o walidację danych wejściowych oraz stronicowanie wyników.
- Umieść w kolejce `Job`, którego zadaniem będzie zapisanie tytułu ostatnio
dodanej książki w kolumnie modelu `Author`.
- Dodaj podstawowe testy jednostkowe dla `POST /api/books` oraz `DELETE
/api/books/{id}`.

### Todo:
- Wykorzystaj `Sanctum` do uwierzytelnienia `POST /api/books`
- Dodaj filtr do `GET /api/authors?search={query}`, który pozwoli na pobranie listy autorów, którzy w tytułach swoich książek zwierają ciąg znaków podany w parametrze.
- Dodaj komendę Artisana, która po uruchomieniu zapyta o imię i nazwisko a
następnie utworzy rekord dla nowego autora.


## Install

- `git clone` into folder
- run `composer install`
- run `php artisan migrate`